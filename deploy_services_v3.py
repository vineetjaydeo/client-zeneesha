#!/usr/bin/env python3
"""Deploy the approved Zeneesha V3 service and utility-page surface."""

import os
import posixpath
import shlex
import sys

import paramiko

HOST = os.getenv("ZENEESHA_SSH_HOST", "62.72.28.13")
PORT = int(os.getenv("ZENEESHA_SSH_PORT", "65002"))
USER = os.getenv("ZENEESHA_SSH_USER", "u552605462")
PASSWORD = os.getenv("ZENEESHA_SSH_PASSWORD")
PUBLIC_HTML = os.getenv("ZENEESHA_PUBLIC_HTML", f"/home/{USER}/domains/erisagent.com/public_html")
WP_PATH = f"{PUBLIC_HTML}/zeneesha-v3"
THEME_PATH = f"{WP_PATH}/wp-content/themes/zeneesha"
LOCAL_THEME = os.path.join(os.path.dirname(os.path.abspath(__file__)), "theme")
WP = f"wp --path={shlex.quote(WP_PATH)} --allow-root"

FILES = [
    "templates/page-service.php",
    "templates/page-ams-support.php",
    "templates/page-about.php",
    "templates/page-contact.php",
    "templates/page-resources.php",
    "templates/page-partnership.php",
    "templates/page-careers.php",
    "assets/css/main.css",
    "assets/js/main.js",
    "assets/img/workday-laptop.png",
    "assets/img/workday-laptop-hover.png",
    "assets/img/about-zeneesha.jpg",
    "assets/img/leadership/rajesh-kumar.jpg",
    "assets/img/leadership/ranjan-singh.jpg",
    "assets/img/leadership/keshav-kolla.jpg",
    "assets/img/resources/workday-ams-partner.png",
    "assets/img/resources/data-migration.png",
    "assets/img/resources/workday-ams-ai.png",
    "assets/img/partners/quadient.jpg",
    "assets/img/partners/datamatics.jpg",
    "assets/img/partners/system-c.jpg",
    "assets/img/partners/market-cloud.jpg",
    "assets/img/partners/baringa.jpg",
    "assets/img/partners/kion.jpg",
    "assets/img/partners/awa.jpg",
    "assets/img/partners/ukri.jpg",
    "assets/img/logos/aqa.svg",
    "assets/img/logos/warner.svg",
    "assets/img/logos/kion.png",
    "assets/img/logos/quadient.png",
    "assets/img/logos/slaughter.png",
    "functions.php",
]

PAGES = [
    ("deployment", "Deployment", "templates/page-service.php"),
    ("ams-support", "AMS & Support", "templates/page-ams-support.php"),
    ("maximise", "Maximise", "templates/page-service.php"),
    ("advisory", "Advisory", "templates/page-service.php"),
    ("ai-enablement", "AI Enablement", "templates/page-service.php"),
    ("about", "About", "templates/page-about.php"),
    ("contact", "Contact", "templates/page-contact.php"),
    ("resources", "Resources", "templates/page-resources.php"),
    ("partnership", "Partnership", "templates/page-partnership.php"),
    ("careers", "Careers", "templates/page-careers.php"),
]


def run(ssh, command):
    print(f"$ {command}")
    _, stdout, stderr = ssh.exec_command(command)
    output = stdout.read().decode().strip()
    error = stderr.read().decode().strip()
    code = stdout.channel.recv_exit_status()
    if output:
        print(output)
    if error:
        print(error, file=sys.stderr)
    if code:
        raise RuntimeError(f"Command failed ({code}): {command}")
    return output


def ensure_remote_dir(sftp, path):
    current = "/"
    for part in path.strip("/").split("/"):
        current = posixpath.join(current, part)
        try:
            sftp.stat(current)
        except FileNotFoundError:
            sftp.mkdir(current)


def ensure_page(ssh, slug, title, template):
    page_id = run(
        ssh,
        f"{WP} post list --post_type=page --name={shlex.quote(slug)} --fields=ID --format=ids",
    ).strip()
    if not page_id:
        page_id = run(
            ssh,
            f"{WP} post create --post_type=page --post_status=publish "
            f"--post_name={shlex.quote(slug)} --post_title={shlex.quote(title)} --porcelain",
        ).strip()
    run(ssh, f"{WP} post meta update {page_id} _wp_page_template {shlex.quote(template)}")


def main():
    if not PASSWORD:
        raise SystemExit("Set ZENEESHA_SSH_PASSWORD before deploying.")

    ssh = paramiko.SSHClient()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    ssh.connect(
        HOST,
        port=PORT,
        username=USER,
        password=PASSWORD,
        timeout=30,
        look_for_keys=False,
        allow_agent=False,
    )
    sftp = ssh.open_sftp()

    try:
        run(ssh, f"test -d {shlex.quote(THEME_PATH)}")
        stamp = run(ssh, "date +%Y%m%d-%H%M%S")
        backup = f"{WP_PATH}/.codex-backups/v3-pages-{stamp}"
        run(ssh, f"mkdir -p {shlex.quote(backup)}")

        for relative in FILES:
            remote = posixpath.join(THEME_PATH, relative)
            backup_file = posixpath.join(backup, relative)
            run(
                ssh,
                f"if [ -f {shlex.quote(remote)} ]; then mkdir -p {shlex.quote(posixpath.dirname(backup_file))}; cp -p {shlex.quote(remote)} {shlex.quote(backup_file)}; fi",
            )

        print(f"Backup: {backup}")
        for relative in FILES:
            local = os.path.join(LOCAL_THEME, relative)
            remote = posixpath.join(THEME_PATH, relative)
            ensure_remote_dir(sftp, posixpath.dirname(remote))
            print(f"upload {relative}")
            sftp.put(local, remote)

        for template in (
            "templates/page-service.php",
            "templates/page-ams-support.php",
            "templates/page-about.php",
            "templates/page-contact.php",
            "templates/page-resources.php",
            "templates/page-partnership.php",
            "templates/page-careers.php",
        ):
            run(ssh, f"php -l {shlex.quote(posixpath.join(THEME_PATH, template))}")
        run(ssh, f"php -l {shlex.quote(posixpath.join(THEME_PATH, 'functions.php'))}")

        for page in PAGES:
            ensure_page(ssh, *page)

        run(ssh, f"{WP} rewrite flush --hard")
        run(ssh, f"{WP} cache flush")
        print("Deployment complete.")
    finally:
        sftp.close()
        ssh.close()


if __name__ == "__main__":
    main()
