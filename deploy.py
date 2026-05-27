#!/usr/bin/env python3
"""
iKawn WP ZEN — Deploy Script
Uploads theme files via SFTP. Page/ACF setup runs only on first deploy.
Re-running is safe — pages are NOT recreated if they already exist.

PROTECTED FILES — never overwritten on partial deploys:
  front-page.php          (Homepage — in client review)
  templates/page-service.php   (Service pages — in client review)
  templates/page-ams-support.php (AMS page — in client review)
Pass --full to override protection and deploy everything.
"""

import paramiko
import os
import sys

# Files protected from accidental overwrite during partial deploys
PROTECTED = {
    'front-page.php',
    'templates/page-service.php',
    'templates/page-ams-support.php',
}
FULL_DEPLOY = '--full' in sys.argv

# ── Config ──────────────────────────────────────────────
HOST     = '62.72.28.13'
PORT     = 65002
USER     = 'u552605462'
PASSWD   = 'Eris@2026'

WP_PATH  = '/home/u552605462/domains/erisagent.com/public_html/zeneesha'
THEME_REMOTE = WP_PATH + '/wp-content/themes/zeneesha'
LOCAL_THEME  = '/sessions/admiring-nifty-hamilton/mnt/outputs/theme'

# ── Connect ──────────────────────────────────────────────
print('Connecting to server…')
ssh = paramiko.SSHClient()
ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
ssh.connect(HOST, port=PORT, username=USER, password=PASSWD, timeout=30)
print('SSH connected.')

sftp = ssh.open_sftp()

def ensure_dir(remote_path):
    parts = remote_path.split('/')
    current = ''
    for part in parts:
        if not part:
            current = '/'
            continue
        current = current.rstrip('/') + '/' + part
        try:
            sftp.stat(current)
        except FileNotFoundError:
            sftp.mkdir(current)

def upload_tree(local_dir, remote_dir, base_dir=None):
    ensure_dir(remote_dir)
    if base_dir is None:
        base_dir = local_dir
    for item in sorted(os.listdir(local_dir)):
        local_path  = os.path.join(local_dir, item)
        remote_path = remote_dir.rstrip('/') + '/' + item
        if os.path.isdir(local_path):
            upload_tree(local_path, remote_path, base_dir)
        else:
            # Build relative path for protection check
            rel = os.path.relpath(local_path, base_dir)
            if not FULL_DEPLOY and rel in PROTECTED:
                print(f'  ⚡ PROTECTED (skipped): {rel}  — use --full to override')
                continue
            print(f'  ↑  {remote_path}')
            sftp.put(local_path, remote_path)

# ── Upload Theme ─────────────────────────────────────────
mode = 'FULL' if FULL_DEPLOY else 'SAFE (protected files skipped)'
print(f'\nUploading theme to {THEME_REMOTE}… [{mode}]')
upload_tree(LOCAL_THEME, THEME_REMOTE, LOCAL_THEME)
print('Upload complete.')

# ── SEO / AEO files ──────────────────────────────────────
DOMAIN_ROOT = '/home/u552605462/domains/erisagent.com/public_html'
SEO_LOCAL   = os.path.dirname(LOCAL_THEME)   # outputs/ directory
seo_uploads = [
    (os.path.join(SEO_LOCAL, 'robots.txt'),    DOMAIN_ROOT + '/robots.txt'),
    (os.path.join(SEO_LOCAL, 'llms.txt'),      WP_PATH + '/llms.txt'),
    (os.path.join(SEO_LOCAL, 'llms-full.txt'), WP_PATH + '/llms-full.txt'),
]
print('\nUploading SEO/AEO files...')
for local_path, remote_path in seo_uploads:
    if os.path.exists(local_path):
        sftp.put(local_path, remote_path)
        print(f'  ↑  {remote_path}')
    else:
        print(f'  ✗ not found locally: {local_path}')

sftp.close()

# ── WP-CLI Helpers ───────────────────────────────────────
WP = f'wp --path={WP_PATH} --allow-root'

def run(cmd, label=''):
    print(f'\n$ {cmd}')
    stdin, stdout, stderr = ssh.exec_command(cmd)
    out = stdout.read().decode().strip()
    err = stderr.read().decode().strip()
    if out: print(f'  → {out}')
    if err: print(f'  ! {err}', file=sys.stderr)
    return out

def page_exists(slug):
    result = run(f'{WP} post list --post_type=page --name={slug} --fields=ID --format=ids')
    return result.strip() != ''

# Activate theme
run(f'{WP} theme activate zeneesha', 'activate theme')

# ── Only create pages if they don't exist yet ────────────
if not page_exists('home'):
    home_id = run(f'{WP} post create --post_type=page --post_title="Home" --post_status=publish --post_name=home --porcelain').strip()
    print(f'  Home page ID: {home_id}')
    run(f'{WP} option update show_on_front page')
    run(f'{WP} option update page_on_front {home_id}')
else:
    print('  Home page already exists — skipping.')
    home_id = run(f'{WP} post list --post_type=page --name=home --fields=ID --format=ids').strip()
    run(f'{WP} option update page_on_front {home_id}')

if not page_exists('implementation'):
    impl_id = run(f'{WP} post create --post_type=page --post_title="Implementation" --post_status=publish --post_name=implementation --porcelain').strip()
    run(f'{WP} post meta add {impl_id} _wp_page_template "templates/page-service.php"')
    run(f'{WP} post meta add {impl_id} svc_eyebrow "Start right"')
    run(f'{WP} post meta add {impl_id} svc_tagline "Build the right foundation from day one."')
    run(f'''{WP} post meta add {impl_id} svc_description "A Workday implementation is not just a technology project. It is a decision that shapes how your organisation works for years. Zeneesha ensures every configuration choice is intentional, every data migration is clean, and every team member arrives at go-live genuinely ready to use the system."''')
    run(f'{WP} post meta add {impl_id} svc_color "#1E3A8A"')
    run(f'''{WP} post meta add {impl_id} svc_outcomes "Go live on schedule, with zero surprises in month one
Configuration that reflects your actual processes, not the defaults
A team that is confident from day one, not learning on the job"''')
    run(f'''{WP} post meta add {impl_id} svc_deliverables "Requirements discovery and process mapping
Workday HCM, Finance, or Adaptive Planning configuration
Data migration planning, cleansing, and validation
Integration design and build (Workday Studio / EIB)
Testing strategy: unit, parallel, UAT
Change management and end-user training
Go-live support and hypercare"''')
    run(f'{WP} post meta add {impl_id} svc_cs_metric "3 weeks early"')
    run(f'{WP} post meta add {impl_id} svc_cs_client "Professional Services Firm"')
    run(f'''{WP} post meta add {impl_id} svc_cs_result "3-week go-live acceleration with zero post-launch defects. Full automation of month-end close from day one."''')
else:
    print('  Implementation page already exists — skipping.')

if not page_exists('ams-support'):
    ams_id = run(f'{WP} post create --post_type=page --post_title="AMS & Support" --post_status=publish --post_name=ams-support --porcelain').strip()
    run(f'{WP} post meta add {ams_id} _wp_page_template "templates/page-service.php"')
    run(f'{WP} post meta add {ams_id} svc_eyebrow "Stay stable"')
    run(f'{WP} post meta add {ams_id} svc_tagline "Your Workday, always working. We keep it that way."')
    run(f'''{WP} post meta add {ams_id} svc_description "After go-live, the velocity of change does not slow down, it accelerates. Business needs evolve, Workday releases introduce new complexity, and your internal team cannot be Workday specialists on top of everything else. Zeneesha absorbs that pressure, resolving issues fast and managing change systematically."''')
    run(f'{WP} post meta add {ams_id} svc_color "#3B9EDB"')
    run(f'''{WP} post meta add {ams_id} svc_outcomes "Issues resolved in hours, not weeks, your SLA guaranteed
Workday releases managed end-to-end with no disruption to your team
A specialist team in your corner every time something breaks"''')
    run(f'''{WP} post meta add {ams_id} svc_deliverables "Dedicated Workday AMS retainer (flexible capacity)
Incident management and break-fix resolution
Change request pipeline management
Bi-annual Workday release management
Integration monitoring and incident response
Reporting enhancement and maintenance
Monthly service review and roadmap sessions"''')
    run(f'{WP} post meta add {ams_id} svc_cs_metric "700% faster"')
    run(f'{WP} post meta add {ams_id} svc_cs_client "AQA Education"')
    run(f'''{WP} post meta add {ams_id} svc_cs_result "Sprint velocity increased from 2 to 16 tickets per sprint. Backlog cleared within 90 days. 95% platform adoption achieved."''')
else:
    print('  AMS & Support page already exists — skipping.')

if not page_exists('maximise'):
    max_id = run(f'{WP} post create --post_type=page --post_title="Maximise" --post_status=publish --post_name=maximise --porcelain').strip()
    run(f'{WP} post meta add {max_id} _wp_page_template "templates/page-service.php"')
    run(f'{WP} post meta add {max_id} svc_eyebrow "Grow value"')
    run(f'{WP} post meta add {max_id} svc_tagline "Turn your Workday from operational to exceptional."')
    run(f'''{WP} post meta add {max_id} svc_description "Most organisations are using 60 to 70% of what Workday can do. The remaining 30 to 40% is where the real ROI lives: automated workflows, accurate real-time reporting, and configuration that actually mirrors how the business works today. Zeneesha systematically closes that gap."''')
    run(f'{WP} post meta add {max_id} svc_color "#F57C1F"')
    run(f'''{WP} post meta add {max_id} svc_outcomes "Manual processes automated so your team focuses on decisions, not data entry
Reports leadership can trust, available in seconds not days
Workday configuration that reflects how your business actually runs today"''')
    run(f'''{WP} post meta add {max_id} svc_deliverables "Workday health assessment and optimisation roadmap
Business process and workflow redesign
Reporting and analytics build-out (Workday Prism, BIRT, Composite)
Automation of manual processes (calculated fields, business rules)
Configuration review and rationalisation
Adoption analysis and re-engagement programme
Security role review and access remediation"''')
    run(f'{WP} post meta add {max_id} svc_cs_metric "40% less admin"')
    run(f'{WP} post meta add {max_id} svc_cs_client "Global Manufacturing Group"')
    run(f'''{WP} post meta add {max_id} svc_cs_result "40% reduction in HR admin overhead. Integrations rationalised from 12 to 4. Unified HCM across 5 countries."''')
else:
    print('  Maximise page already exists — skipping.')

if not page_exists('about'):
    about_id = run(f'{WP} post create --post_type=page --post_title="About" --post_status=publish --post_name=about --porcelain').strip()
    run(f'{WP} post meta add {about_id} _wp_page_template "templates/page-about.php"')
else:
    print('  About page already exists — skipping.')

if not page_exists('contact'):
    contact_id = run(f'{WP} post create --post_type=page --post_title="Contact" --post_status=publish --post_name=contact --porcelain').strip()
    run(f'{WP} post meta add {contact_id} _wp_page_template "templates/page-contact.php"')
else:
    print('  Contact page already exists — skipping.')

if not page_exists('careers'):
    careers_id = run(f'{WP} post create --post_type=page --post_title="Careers" --post_status=publish --post_name=careers --porcelain').strip()
    run(f'{WP} post meta add {careers_id} _wp_page_template "templates/page-careers.php"')
else:
    print('  Careers page already exists — skipping.')

if not page_exists('resources'):
    res_id = run(f'{WP} post create --post_type=page --post_title="Resources" --post_status=publish --post_name=resources --porcelain').strip()
    run(f'{WP} post meta add {res_id} _wp_page_template "templates/page-resources.php"')
else:
    print('  Resources page already exists — skipping.')

if not page_exists('partnership'):
    partner_id = run(f'{WP} post create --post_type=page --post_title="Partnership" --post_status=publish --post_name=partnership --porcelain').strip()
    run(f'{WP} post meta add {partner_id} _wp_page_template "templates/page-partnership.php"')
else:
    print('  Partnership page already exists — skipping.')

# ── Topic pages (AEO) ─────────────────────────────────────────
topic_pages = [
    ('workday-hcm-uk',          'Workday HCM in the UK',          '#1E3A8A', 'implementation'),
    ('workday-ams',             'What is Workday AMS Support?',    '#3B9EDB', 'ams-support'),
    ('workday-data-migration',  'Workday Data Migration Guide',    '#F57C1F', 'implementation'),
    ('workday-mid-market',      'Workday for Mid-Market',          '#E8472C', 'ams-support'),
    ('workday-finance-training','Workday Finance & Payroll Training','#1E3A8A','maximise'),
    ('workday-ai',              'Workday AI & Machine Learning',   '#F57C1F', 'maximise'),
]

for slug, title, color, related_svc in topic_pages:
    if not page_exists(slug):
        t_id = run(f'{WP} post create --post_type=page --post_title="{title}" --post_status=publish --post_name={slug} --porcelain').strip()
        run(f'{WP} post meta add {t_id} _wp_page_template "templates/page-topic.php"')
        run(f'{WP} post meta add {t_id} topic_eyebrow "Workday"')
        run(f'{WP} post meta add {t_id} topic_headline "{title}"')
        run(f'{WP} post meta add {t_id} topic_color "{color}"')
        run(f'{WP} post meta add {t_id} topic_related_svc "{related_svc}"')
        print(f'  Topic page created: {title} (ID {t_id})')
    else:
        print(f'  Topic page already exists — skipping: {slug}')

# Assign AMS & Support page to new rich template (idempotent)
ams_page_id = run(f'{WP} post list --post_type=page --name=ams-support --fields=ID --format=ids').strip()
if ams_page_id:
    run(f'{WP} post meta update {ams_page_id} _wp_page_template "templates/page-ams-support.php"')
    print(f'  AMS template assigned to page ID {ams_page_id}')

# ── Install Yoast SEO if not already present ──────────────────
yoast_status = run(f'{WP} plugin status wordpress-seo 2>/dev/null || echo "not-installed"')
if 'not-installed' in yoast_status or 'not installed' in yoast_status.lower() or 'Error' in yoast_status:
    print('\nInstalling Yoast SEO…')
    run(f'{WP} plugin install wordpress-seo --activate')
else:
    run(f'{WP} plugin activate wordpress-seo')
    print('  Yoast SEO is present — activated.')

# Flush rewrite rules + cache
run(f'{WP} rewrite flush --hard')
run(f'{WP} cache flush')

print('\n✓ Deploy complete. Site: https://erisagent.com/zeneesha/')
ssh.close()
