<?php
    
    $HTML = $API->get('HTML');
    
    $Things = new jaygeorge_perch_admin_style_Things($API);
   
    $things = array();
	
    $things = $Things->all();


            
    // Install only if $things is false. 
    // This will run the code in activate.php so should only ever happen on first run - silently installing the app.
    if ($things == false) {
    	$Things->attempt_install();

        $message = $HTML->warning_message('There are currently no things. Why not add one?');        
    }
