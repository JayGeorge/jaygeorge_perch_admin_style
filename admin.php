<?php
    $this->register_app('jaygeorge_perch_admin_style', 'Admin Style', 1, 'An app that styles the Perch admin', 1.0);
    $this->require_version('jaygeorge_perch_admin_style', '2.8');
    $this->add_setting('jaygeorge_perch_admin_style_external_font_stylesheet', 'External Font Stylesheet', 'text', false,'','This is an optional stylesheet include for loading something like Typekit or Google Fonts e.g. https://use.typekit.net/dsl0pss.css');
    $this->add_create_page('jaygeorge_perch_admin_style', 'edit');

    $API = new PerchAPI(1.0, 'jaygeorge_perch_admin_style');

    $Perch = Perch::fetch();

    /* GROUP CACHEBREAKING
    =================================================== */
    // Make sure files aren't cached
    $variables_version = '/variables.css?v=' . filemtime($_SERVER['DOCUMENT_ROOT'] . $API->app_path() . '/variables.css');
    $standard_admin_version = '/standard-admin.css?v=' . filemtime($_SERVER['DOCUMENT_ROOT'] . $API->app_path() . '/standard-admin.css');
    // Use the sitepath if it's defined
    if (defined('PERCH_SITEPATH')) {
        $custom_admin_version = PERCH_SITEPATH . 'perch/addons/plugins/ui/custom-admin.css?v=' . filemtime($_SERVER['DOCUMENT_ROOT'] . '/perch/addons/plugins/ui/custom-admin.css');
    } else {
        $custom_admin_version = '/perch/addons/plugins/ui/custom-admin.css?v=' . filemtime($_SERVER['DOCUMENT_ROOT'] . '/perch/addons/plugins/ui/custom-admin.css');
    }

    // We need to separate variables.css out so that the login.css can make use of it (which is loaded outside the app, so it can be available before the admin is loaded)
    $Perch->add_css($API->app_path() . $variables_version);
    $Perch->add_css($API->app_path() . $standard_admin_version);

    /* GROUP LOAD CUSTOM ADMIN CSS
    =================================================== */
    // Use the sitepath if it's defined
    if (defined('PERCH_SITEPATH')) {
        if (file_exists("{$_SERVER['DOCUMENT_ROOT']}" . PERCH_SITEPATH . "perch/addons/plugins/ui/custom-admin.css")) {
            $Perch->add_css($custom_admin_version);
        }
    } else {
        // Otherwise assume its the document root
        if (file_exists("{$_SERVER['DOCUMENT_ROOT']}/perch/addons/plugins/ui/custom-admin.css")) {
            $Perch->add_css($custom_admin_version);
        }
    }
    $Perch->add_css($API->get('Settings')->get('jaygeorge_perch_admin_style_external_font_stylesheet')->val());

    /* GROUP LOAD THE FAVICON
    =================================================== */
    // Use the sitepath if it's defined
    if (defined('PERCH_SITEPATH')) {
        $favicon_version = '<link rel="shortcut icon" href="' . PERCH_SITEPATH . 'perch/addons/plugins/ui/favicon.ico?v=' . filemtime($_SERVER['DOCUMENT_ROOT'] . '/perch/addons/plugins/ui/favicon.ico') . '">';
        if (file_exists("{$_SERVER['DOCUMENT_ROOT']}" . PERCH_SITEPATH . "perch/addons/plugins/ui/favicon.ico")) {
            $Perch->add_head_content($favicon_version);
        }
    } else {
        // Otherwise assume its the document root
        $favicon_version = '<link rel="shortcut icon" href="/perch/addons/plugins/ui/favicon.ico?v=' . filemtime($_SERVER['DOCUMENT_ROOT'] . '/perch/addons/plugins/ui/favicon.ico') . '">';
        if (file_exists("{$_SERVER['DOCUMENT_ROOT']}/perch/addons/plugins/ui/favicon.ico")) {
            $Perch->add_head_content($favicon_version);
        }
    }
