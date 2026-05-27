import paramiko, sys

HOST = '62.72.28.13'; PORT = 65002
USER = 'u552605462'; PASSWD = 'Eris@2026'
WP_PATH = '/home/u552605462/domains/erisagent.com/public_html/zeneesha'
WP = f'wp --path={WP_PATH} --allow-root'

ssh = paramiko.SSHClient()
ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
ssh.connect(HOST, port=PORT, username=USER, password=PASSWD, timeout=30)

def run(cmd):
    stdin, stdout, stderr = ssh.exec_command(cmd, timeout=20)
    out = stdout.read().decode().strip()
    return out

def yoast(pid, title, desc, kw):
    run(f'{WP} post meta update {pid} _yoast_wpseo_title "{title}"')
    run(f'{WP} post meta update {pid} _yoast_wpseo_metadesc "{desc}"')
    run(f'{WP} post meta update {pid} _yoast_wpseo_focuskw "{kw}"')
    print(f'  OK {pid}: {kw}')

pages = [
    (10, 'Zeneesha | Workday Experts — Implementation, AMS & Optimisation | UK',
         'Independent Workday practice helping UK and EMEA organisations implement, support and maximise their Workday ROI. Book a free 60-minute Health Check.',
         'Workday consulting UK'),
    (11, 'Workday Implementation Services | Zeneesha — UK & EMEA',
         'Expert Workday HCM and Finance implementation. On-schedule go-lives, clean data migrations, and teams that are genuinely ready from day one.',
         'Workday implementation UK'),
    (12, 'Workday AMS and Support | Zeneesha — Managed Application Services',
         'Dedicated Workday AMS retainer. Issues resolved in hours, bi-annual release management, and a named team in your corner every time something breaks.',
         'Workday AMS support'),
    (13, 'Maximise Workday ROI | Zeneesha — Optimisation and Value Recovery',
         'Most organisations use 60 to 70 percent of Workday. Zeneesha closes the gap with automation, reporting, and configuration that mirrors how your business works.',
         'Workday optimisation'),
    (14, 'About Zeneesha | Independent Workday Practice — London UK',
         'Zeneesha is a Workday Sales and Services Partner. Meet our leadership team and learn how we partner with clients across the UK and EMEA.',
         'about Zeneesha Workday'),
    (15, 'Contact Zeneesha | Book a Free Workday Health Check',
         'Book a complimentary 60-minute Workday Health Check. No cost, no obligation. We reply within one working day.',
         'contact Zeneesha Workday'),
    (42, 'Careers at Zeneesha | Workday Consultant Jobs UK',
         'Join a specialist Workday practice. View open roles or send your CV for future opportunities across HCM, Finance, and integration.',
         'Workday consultant jobs UK'),
    (43, 'Workday Resources and Guides | Zeneesha Insights Hub',
         'Practical Workday guides, case studies, and insights. From implementation to AMS support and AI-led optimisation.',
         'Workday resources guides'),
    (44, 'Partner with Zeneesha | Referral Technology and Delivery Partnerships',
         'Three partnership models for organisations committed to Workday excellence. Referral, technology integration, and delivery partnerships.',
         'Workday partnership'),
    (45, 'Workday HCM in the UK | Implementation and Support | Zeneesha',
         'Everything you need to know about Workday HCM in the UK. Implementation, AMS support, compliance, and maximising ROI from your Workday investment.',
         'Workday HCM UK'),
    (46, 'What is Workday AMS Support | Managed Services Guide | Zeneesha',
         'Workday AMS keeps your system running after go-live. Learn what AMS covers, how it works, and how to choose the right provider.',
         'Workday AMS support'),
    (47, 'Workday Data Migration Guide | Best Practices | Zeneesha',
         'A complete guide to Workday data migration. Planning, cleansing, validation, and go-live readiness. Avoid common mistakes with expert advice.',
         'Workday data migration'),
    (48, 'Workday for Mid-Market Companies | Guide and Best Practices | Zeneesha',
         'How mid-market organisations can successfully implement and run Workday. Practical guidance on sizing, approach, and getting value.',
         'Workday mid-market'),
    (49, 'Workday Finance and Payroll Training | Best Practices | Zeneesha',
         'Workday Finance and Payroll training for administrators, power users, and end users. Reduce adoption risk and maximise system confidence.',
         'Workday finance training'),
    (50, 'Workday AI and Machine Learning | What It Means for Your Organisation',
         'Workday AI capabilities explained. Skills Cloud, People Analytics, Extend, and ML features. What your organisation needs to be ready to benefit.',
         'Workday AI'),
]

for args in pages:
    yoast(*args)

run(f'{WP} option patch update wpseo indexing_first_time false')
run(f'{WP} option patch update wpseo indexables_indexing_completed true')
run(f'{WP} rewrite flush --hard')
run(f'{WP} cache flush')
print('Done.')
ssh.close()
