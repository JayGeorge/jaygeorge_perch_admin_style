<?php
    $this->register_app('jaygeorge_admin_css', 'Admin Style', 1, 'An app that styles the Perch admin', 1.0);
    $this->require_version('jaygeorge_admin_css', '2.8');
    $this->add_setting('jaygeorge_admin_css_external_font_stylesheet', 'External Font Stylesheet', 'text', false,'','This is an optional stylesheet include for loading something like Typekit or Google Fonts e.g. https://use.typekit.net/dsl0pss.css');
    $this->add_create_page('jaygeorge_admin_css', 'edit');

    $API = new PerchAPI(1.0, 'jaygeorge_admin_css');

    function get_external_font_stylesheet() { 
        $API = new PerchAPI(1.0, 'jaygeorge_admin_css');
        $external_font_stylesheet = $API->get('Settings')->get('jaygeorge_admin_css_external_font_stylesheet')->val();
        return $external_font_stylesheet;
    }

    $Perch = Perch::fetch();
    // We need to separate variables.css out so that the login.css can make use of it (which is loaded outside the app, so it can be available before the admin is loaded)
    $Perch->add_css($API->app_path() . '/variables.css');
    $Perch->add_css($API->app_path() . '/standard-admin.css');
    $Perch->add_css('/perch/addons/plugins/ui/custom-admin.css');
    $Perch->add_css(get_external_font_stylesheet());
    $Perch->add_head_content('<link rel="shortcut icon" href="/perch/addons/plugins/ui/favicon.ico">');