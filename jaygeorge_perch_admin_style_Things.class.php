<?php

class jaygeorge_perch_admin_style_Things extends PerchAPI_Factory
{
    protected $table     = 'jaygeorge_perch_admin_style_settings';
	protected $pk        = 'jaygeorge_perch_admin_styleID';
	protected $singular_classname = 'jaygeorge_perch_admin_style_Thing';
	
	protected $default_sort_column = 'jaygeorge_perch_admin_styleDateTime';
	
	public $static_fields   = array('jaygeorge_perch_admin_styleID', 'jaygeorge_perch_admin_styleTitle', 'jaygeorge_perch_admin_styleDateTime', 'jaygeorge_perch_admin_styleDynamicFields');	
	
}