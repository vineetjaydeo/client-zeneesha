<?php
/**
 * Front page.
 *
 * The homepage markup lives in templates/page-home-v3.php, which stays
 * registered as the selectable "Homepage V3" page template (see the
 * theme_page_templates filter in functions.php) and is still bound to the
 * `home-v3` page by deploy_v3.py. Including it here keeps one canonical copy
 * of the markup rather than two that drift apart.
 *
 * functions.php adds the .page-template-page-home-v3 body class on the front
 * page so the CSS scoped to that template applies here too.
 */
include get_template_directory() . '/templates/page-home-v3.php';
