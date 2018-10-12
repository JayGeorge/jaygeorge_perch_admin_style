<?php
    # include the API
    include('../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'jaygeorge_perch_admin_style');

    # include your class files
    include('jaygeorge_perch_admin_style_Things.class.php');
    include('jaygeorge_perch_admin_style_Thing.class.php');
    
    # Grab an instance of the Lang class for translations
    $Lang = $API->get('Lang');

    # Set the page title
    $Perch->page_title = $Lang->get('Admin Style app');


    # Do anything you want to do before output is started
    include('modes/list.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('modes/list.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
