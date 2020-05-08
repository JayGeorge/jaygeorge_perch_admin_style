<?php
$this->register_app('jaygeorge_perch_admin_style', 'Admin Style', 1, 'An app that styles the Perch admin', 1.0);
$this->require_version('jaygeorge_perch_admin_style', '2.8');
$this->add_setting('jaygeorge_perch_admin_style_external_font_stylesheet', 'External Font Stylesheet', 'text', false,'','This is an optional stylesheet include for loading something like Typekit or Google Fonts e.g. https://use.typekit.net/dsl0pss.css');
$this->add_create_page('jaygeorge_perch_admin_style', 'edit');

$API = new PerchAPI(1.0, 'jaygeorge_perch_admin_style');

$Perch = Perch::fetch();

/* CACHEBUST AND LOAD BASE CSS/JS ASSETS
=================================================== */

// We need to separate variables.css out so that the login.css can make use of it (which is loaded outside the app, so it can be available before the admin is loaded)
$Perch->add_css($API->app_path() . '/variables.css?v=' . filemtime(__DIR__ . '/variables.css'));
$Perch->add_css($API->app_path() . '/standard-admin.css?v=' . filemtime(__DIR__ .  '/standard-admin.css'));
$Perch->add_javascript($API->app_path() . '/standard-admin.js?v=' . filemtime(__DIR__ .  '/standard-admin.js'));

/* CACHEBUST AND LOAD CUSTOM ADMIN CSS
=================================================== */
if (file_exists(__DIR__ . "/../../plugins/ui/custom-admin.css")) {
    $Perch->add_css(PERCH_LOGINPATH .'/addons/plugins/ui/custom-admin.css?v=' . filemtime(__DIR__ . '/../../plugins/ui/custom-admin.css'));
}

$Perch->add_css($API->get('Settings')->get('jaygeorge_perch_admin_style_external_font_stylesheet')->val());

/* LOAD CSS FOR ROLE
=================================================== */
$role = $CurrentUser->roleSlug();
if (file_exists(__DIR__ . '/../../plugins/ui/custom-admin-' . $role . '.css')) {
    $Perch->add_css(PERCH_LOGINPATH .'/addons/plugins/ui/custom-admin-' . $role . '.css?v=' . filemtime(__DIR__ . '/../../plugins/ui/custom-admin-' . $role . '.css'));
}

/* GROUP LOAD THE FAVICON
=================================================== */

if (file_exists(__DIR__ . "/../../plugins/ui/favicon.ico")) {
    $Perch->add_head_content('<link rel="shortcut icon" href="' . PERCH_LOGINPATH.'/addons/plugins/ui/favicon.ico?v=' . filemtime(__DIR__ . '/../../plugins/ui/favicon.ico') . '">');
}

