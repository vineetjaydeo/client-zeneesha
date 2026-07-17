#!/usr/bin/env python3
"""
Deploy a versioned Zeneesha replica at /zeneesha-v3 or /zeneesha-v4.

This script does not overwrite the existing /zeneesha WordPress files.
It copies /zeneesha to the requested mount only when the target folder is
missing, uploads the local theme, and points the copy at its versioned URL.

Required environment:
  ZENEESHA_SSH_PASSWORD

Optional environment:
  ZENEESHA_SSH_HOST, ZENEESHA_SSH_PORT, ZENEESHA_SSH_USER, ZENEESHA_PUBLIC_HTML
"""

import os
import shlex
import sys
from datetime import datetime, timezone

import paramiko

HOST = os.getenv("ZENEESHA_SSH_HOST", "62.72.28.13")
PORT = int(os.getenv("ZENEESHA_SSH_PORT", "65002"))
USER = os.getenv("ZENEESHA_SSH_USER", "u552605462")
PASSWD = os.getenv("ZENEESHA_SSH_PASSWORD")

if not PASSWD:
    raise SystemExit("Set ZENEESHA_SSH_PASSWORD before deploying.")

PUBLIC_HTML = os.getenv("ZENEESHA_PUBLIC_HTML", f"/home/{USER}/domains/erisagent.com/public_html")
WP_PATH = PUBLIC_HTML + "/zeneesha"
MOUNT = os.getenv("ZENEESHA_MOUNT", "zeneesha-v3").strip("/")
if MOUNT not in {"zeneesha-v3", "zeneesha-v4"}:
    raise SystemExit("ZENEESHA_MOUNT must be zeneesha-v3 or zeneesha-v4.")
SITE_URL = f"https://erisagent.com/{MOUNT}"
WP_V3_PATH = PUBLIC_HTML + "/" + MOUNT
THEME_V3_REMOTE = WP_V3_PATH + "/wp-content/themes/zeneesha"
LOCAL_THEME = os.path.join(os.path.dirname(os.path.abspath(__file__)), "theme")
WPV3 = f"wp --path={shlex.quote(WP_V3_PATH)} --allow-root"


def connect():
    ssh = paramiko.SSHClient()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    ssh.connect(
        HOST,
        port=PORT,
        username=USER,
        password=PASSWD,
        timeout=30,
        look_for_keys=False,
        allow_agent=False,
    )
    return ssh


def run(ssh, cmd):
    print(f"\n$ {cmd}")
    stdin, stdout, stderr = ssh.exec_command(cmd)
    out = stdout.read().decode().strip()
    err = stderr.read().decode().strip()
    code = stdout.channel.recv_exit_status()
    if out:
        print(f"  -> {out}")
    if err:
        print(f"  ! {err}", file=sys.stderr)
    if code:
        raise RuntimeError(f"Command failed ({code}): {cmd}")
    return out


def ensure_dir(sftp, remote_path):
    current = ""
    for part in remote_path.split("/"):
        if not part:
            current = "/"
            continue
        current = current.rstrip("/") + "/" + part
        try:
            sftp.stat(current)
        except FileNotFoundError:
            sftp.mkdir(current)


def upload_tree(sftp, local_dir, remote_dir):
    ensure_dir(sftp, remote_dir)
    for item in sorted(os.listdir(local_dir)):
        local_path = os.path.join(local_dir, item)
        remote_path = remote_dir.rstrip("/") + "/" + item
        if os.path.isdir(local_path):
            upload_tree(sftp, local_path, remote_path)
        else:
            print(f"  upload {remote_path}")
            sftp.put(local_path, remote_path)


def page_id(ssh, slug):
    return run(ssh, f"{WPV3} post list --post_type=page --name={shlex.quote(slug)} --fields=ID --format=ids").strip()


def ensure_page(ssh, slug, title, template, meta=None):
    existing = page_id(ssh, slug)
    if existing:
        pid = existing
        print(f"  Page exists: {slug} ({pid})")
    else:
        pid = run(
            ssh,
            f"{WPV3} post create --post_type=page --post_status=publish "
            f"--post_name={shlex.quote(slug)} --post_title={shlex.quote(title)} --porcelain",
        ).strip()
        print(f"  Page created: {slug} ({pid})")
    run(ssh, f"{WPV3} post update {pid} --post_title={shlex.quote(title)} --post_name={shlex.quote(slug)}")
    run(ssh, f"{WPV3} post meta update {pid} _wp_page_template {shlex.quote(template)}")
    for key, value in (meta or {}).items():
        run(ssh, f"{WPV3} post meta update {pid} {shlex.quote(key)} {shlex.quote(value)}")
    return pid


def write_v3_htaccess(ssh):
    run(
        ssh,
        f"cat > {shlex.quote(WP_V3_PATH + '/.htaccess')} <<'EOF'\n"
        "# BEGIN WordPress\n"
        "<IfModule mod_rewrite.c>\n"
        "RewriteEngine On\n"
        f"RewriteBase /{MOUNT}/\n"
        "RewriteRule ^index\\.php$ - [L]\n"
        "RewriteCond %{REQUEST_FILENAME} !-f\n"
        "RewriteCond %{REQUEST_FILENAME} !-d\n"
        f"RewriteRule . /{MOUNT}/index.php [L]\n"
        "</IfModule>\n"
        "# END WordPress\n"
        "EOF"
    )


def main():
    print(f"Connecting to {USER}@{HOST}:{PORT}...")
    ssh = connect()
    sftp = ssh.open_sftp()
    try:
        run(ssh, f"test -d {shlex.quote(WP_PATH)}")
        target_existed = run(
            ssh,
            f"if [ -d {shlex.quote(WP_V3_PATH)} ]; then printf yes; else printf no; fi",
        ) == "yes"
        if target_existed:
            stamp = datetime.now(timezone.utc).strftime("%Y%m%d-%H%M%S")
            backup = f"{PUBLIC_HTML}/.codex-backups/{MOUNT}-theme-{stamp}"
            run(
                ssh,
                f"mkdir -p {shlex.quote(os.path.dirname(backup))} && "
                f"cp -a {shlex.quote(THEME_V3_REMOTE)} {shlex.quote(backup)}",
            )
            print(f"\nBackup: {backup}")
        run(ssh, f"if [ ! -d {shlex.quote(WP_V3_PATH)} ]; then cp -a {shlex.quote(WP_PATH)} {shlex.quote(WP_V3_PATH)}; fi")
        run(
            ssh,
            "python3 - <<'PY'\n"
            "from pathlib import Path\n"
            f"p = Path({WP_V3_PATH!r}) / 'wp-config.php'\n"
            "s = p.read_text()\n"
            "markers = ['/* Zeneesha V3 preview URL overrides */', '/* Zeneesha V4 preview URL overrides */']\n"
            f"marker = '/* Zeneesha {MOUNT[-2:].upper()} preview URL overrides */'\n"
            f"block = marker + \"\\n\" + \"define('WP_HOME', '{SITE_URL}');\\n\" + \"define('WP_SITEURL', '{SITE_URL}');\\n\"\n"
            "existing = next((m for m in markers if m in s), None)\n"
            "if existing:\n"
            "    start = s.index(existing)\n"
            "    end = s.index(\"/* That's all, stop editing! Happy publishing. */\", start)\n"
            "    s = s[:start] + block + \"\\n\" + s[end:]\n"
            "else:\n"
            "    s = s.replace(\"/* That's all, stop editing! Happy publishing. */\", block + \"\\n/* That's all, stop editing! Happy publishing. */\")\n"
            "p.write_text(s)\n"
            "PY"
        )

        print(f"\nUploading local theme to {THEME_V3_REMOTE}...")
        upload_tree(sftp, LOCAL_THEME, THEME_V3_REMOTE)

        for relative in (
            "functions.php",
            "templates/page-ams-support.php",
            "templates/page-service.php",
            "templates/page-about.php",
            "templates/page-contact.php",
            "templates/page-resources.php",
            "templates/page-partnership.php",
            "templates/page-careers.php",
            "templates/page-topic.php",
            "templates/topic-content.php",
            "templates/partials/form-cta.php",
        ):
            run(ssh, f"php -l {shlex.quote(THEME_V3_REMOTE + '/' + relative)}")

        ensure_page(ssh, "home-v3", "Home V3", "templates/page-home-v3.php")
        ensure_page(ssh, "deployment", "Deployment", "templates/page-service.php", {
            "svc_page_title": "Workday Deployment Services",
            "svc_eyebrow": "Workday Deployment Services",
            "svc_color": "#1E3A8A",
        })
        ensure_page(ssh, "ams-support", "AMS & Support", "templates/page-ams-support.php", {
            "svc_eyebrow": "Workday AMS & Support",
        })
        ensure_page(ssh, "maximise", "Maximise", "templates/page-service.php")
        ensure_page(ssh, "advisory", "Advisory", "templates/page-service.php", {
            "svc_page_title": "Workday Advisory Services",
            "svc_eyebrow": "Workday Advisory Services",
            "svc_color": "#E8472C",
        })
        ensure_page(ssh, "ai-enablement", "AI Enablement", "templates/page-service.php", {
            "svc_page_title": "Workday AI Enablement",
            "svc_eyebrow": "Workday AI Enablement",
            "svc_color": "#1E3A8A",
        })
        ensure_page(ssh, "about", "About", "templates/page-about.php")
        ensure_page(ssh, "contact", "Contact", "templates/page-contact.php")
        ensure_page(ssh, "resources", "Resources", "templates/page-resources.php")
        ensure_page(ssh, "partnership", "Partnership", "templates/page-partnership.php")
        ensure_page(ssh, "careers", "Careers", "templates/page-careers.php")

        managed_topics = [
            ("workday-ams", "Workday AMS & Continuous Improvement"),
            ("workday-data-migration", "Secure Workday Data Migration"),
            ("workday-mid-market", "Workday Support for Mid-Market Organisations"),
            ("workday-release-management-r1-r2", "Workday Release Management (R1 & R2)"),
            ("post-go-live-deployment", "Post-Go-Live Deployment"),
            ("workday-ai", "The Future of Workday with AI"),
        ]
        for slug, title in managed_topics:
            pid = ensure_page(ssh, slug, title, "templates/page-topic.php")
            # Remove stale Yoast records copied from older preview mounts.
            for meta_key in (
                "_yoast_wpseo_title",
                "_yoast_wpseo_metadesc",
                "_yoast_wpseo_canonical",
                "_yoast_wpseo_focuskw",
            ):
                run(ssh, f"{WPV3} post meta delete {pid} {shlex.quote(meta_key)} || true")

        run(ssh, f"{WPV3} rewrite flush --hard")
        run(ssh, f"{WPV3} cache flush")
        write_v3_htaccess(ssh)
        print(f"\nDeploy complete: {SITE_URL}/")
    finally:
        sftp.close()
        ssh.close()


if __name__ == "__main__":
    main()
