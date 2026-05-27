<?php
/**
 * WP-CLI eval-file: configure Yoast + set all meta descriptions
 * Run: wp --path=... --allow-root eval-file seo_setup.php
 */

// ── Yoast org config ─────────────────────────────────────────
$wpseo = get_option('wpseo', []);
$wpseo['company_name']         = 'Zeneesha';
$wpseo['company_or_person']    = 'company';
$wpseo['environment_type']     = 'production';
$wpseo['site_type']            = 'company';
$wpseo['indexing_first_time']  = false;
$wpseo['indexables_indexing_completed'] = true;
update_option('wpseo', $wpseo);
echo "Yoast org config: OK\n";

$wpseo_social = get_option('wpseo_social', []);
$wpseo_social['linkedin_url']       = 'https://www.linkedin.com/company/zeneesha/';
$wpseo_social['og_frontpage_title'] = 'Zeneesha | Workday Experts — Implementation, AMS & Optimisation';
$wpseo_social['og_frontpage_desc']  = 'Independent Workday practice helping UK and EMEA organisations implement, support and maximise their Workday ROI. Book a free Health Check.';
$wpseo_social['opengraph']          = true;
$wpseo_social['twitter']            = true;
update_option('wpseo_social', $wpseo_social);
echo "Yoast social: OK\n";

$wpseo_titles = get_option('wpseo_titles', []);
$wpseo_titles['title-home-wpseo']    = 'Zeneesha | Workday Experts — Implementation, AMS & Optimisation | UK & EMEA';
$wpseo_titles['metadesc-home-wpseo'] = 'Independent Workday practice. Post-go-live support, AMS, and AI-led optimisation for UK and EMEA organisations. Book a free Health Check.';
update_option('wpseo_titles', $wpseo_titles);
echo "Yoast titles: OK\n";

// ── Per-page Yoast meta ───────────────────────────────────────
$pages = [
    // [post_id, seo_title, meta_desc, focus_kw]
    [10, 'Zeneesha | Workday Experts — Implementation, AMS & Optimisation | UK',
         'Independent Workday practice helping UK and EMEA organisations implement, support and maximise their Workday ROI. Book a free 60-minute Health Check.',
         'Workday consulting UK'],
    [11, 'Workday Implementation Services | Zeneesha — UK & EMEA',
         'Expert Workday HCM and Finance implementation. On-schedule go-lives, clean data migrations, and teams that are genuinely ready from day one. UK and EMEA delivery.',
         'Workday implementation UK'],
    [12, 'Workday AMS and Support | Zeneesha — Managed Application Services',
         'Dedicated Workday AMS retainer. Issues resolved in hours, bi-annual release management, and a named team in your corner every time something breaks.',
         'Workday AMS support'],
    [13, 'Maximise Workday ROI | Zeneesha — Optimisation and Value Recovery',
         'Most organisations use 60 to 70 percent of Workday. Zeneesha closes the gap: automation, reporting, and configuration that mirrors how your business works today.',
         'Workday optimisation'],
    [14, 'About Zeneesha | Independent Workday Practice — London, UK',
         'Zeneesha is a Workday Sales and Services Partner founded by practitioners. Meet our leadership team and discover how we partner with UK and EMEA clients.',
         'about Zeneesha Workday'],
    [15, 'Contact Zeneesha | Book a Free Workday Health Check',
         'Get in touch with Zeneesha. Book a complimentary 60-minute Workday Health Check — no cost, no obligation. We reply within one working day.',
         'contact Zeneesha Workday'],
    [42, 'Careers at Zeneesha | Workday Consultant Jobs UK',
         'Join a specialist Workday practice where your expertise goes directly into client outcomes. View open roles or send your CV for future opportunities.',
         'Workday consultant jobs UK'],
    [43, 'Workday Resources and Guides | Zeneesha Insights Hub',
         'Practical Workday guides, case studies, and insights for organisations running Workday HCM and Finance. From implementation to AI-led optimisation.',
         'Workday resources guides'],
    [44, 'Partner with Zeneesha | Referral, Technology and Delivery Partnerships',
         'Three partnership models for organisations committed to Workday excellence. Referral, technology integration, and delivery partnerships.',
         'Workday partnership programme'],
    [45, 'Workday HCM in the UK | Implementation and Support | Zeneesha',
         'Everything you need to know about Workday HCM in the UK — implementation, AMS support, compliance, and maximising ROI from your Workday investment.',
         'Workday HCM UK'],
    [46, 'What is Workday AMS Support? | Managed Services Guide | Zeneesha',
         'Workday AMS keeps your system running after go-live. Learn what AMS covers, how it works, and how to choose the right provider.',
         'Workday AMS support'],
    [47, 'Workday Data Migration Guide | Best Practices | Zeneesha',
         'A complete guide to Workday data migration — planning, cleansing, validation, and go-live readiness. Avoid the most common mistakes with expert advice.',
         'Workday data migration'],
    [48, 'Workday for Mid-Market Companies | Guide and Best Practices | Zeneesha',
         'How mid-market organisations can successfully implement and run Workday. Practical guidance on sizing, approach, and getting value without enterprise budgets.',
         'Workday mid-market'],
    [49, 'Workday Finance and Payroll Training | Best Practices | Zeneesha',
         'Workday Finance and Payroll training for administrators, power users, and end users. Reduce adoption risk and maximise system confidence from day one.',
         'Workday finance training'],
    [50, 'Workday AI and Machine Learning | What It Means for Your Organisation',
         'Workday AI capabilities explained — Skills Cloud, People Analytics, Extend, and ML features. What your organisation needs to benefit now.',
         'Workday AI machine learning'],
];

foreach ($pages as [$pid, $title, $desc, $kw]) {
    update_post_meta($pid, '_yoast_wpseo_title',    $title);
    update_post_meta($pid, '_yoast_wpseo_metadesc', $desc);
    update_post_meta($pid, '_yoast_wpseo_focuskw',  $kw);
    echo "  [page {$pid}] {$kw}\n";
}

// ── Flush ─────────────────────────────────────────────────────
flush_rewrite_rules(true);
wp_cache_flush();
echo "\nAll done. Yoast configured, meta set for " . count($pages) . " pages.\n";
