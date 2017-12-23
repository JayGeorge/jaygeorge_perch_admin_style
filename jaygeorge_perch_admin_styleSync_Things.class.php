<?php

class jaygeorge_perch_admin_styleSync_Things extends PerchAPI_Factory
{
    protected $table     = 'jaygeorge_perch_admin_style_settings';
	protected $pk        = 'admincssID';
	protected $singular_classname = 'jaygeorge_perch_admin_styleSync_Thing';
	
	protected $default_sort_column = 'algoliaDateTime';
	
	public $static_fields   = array('admincssID', 'admincssTitle', 'algoliaDateTime', 'algoliaDynamicFields');	
	
}