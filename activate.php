<?php
    // Prevent running directly:
    if (!defined('PERCH_DB_PREFIX')) exit;

    // Let's go
    $sql = "
    CREATE TABLE IF NOT EXISTS `__PREFIX__jaygeorge_perch_admin_style_settings` (
      `jaygeorge_perch_admin_styleID` int(11) NOT NULL AUTO_INCREMENT,
      `jaygeorge_perch_admin_styleTitle` varchar(255) NOT NULL DEFAULT '',
      `jaygeorge_perch_admin_styleDateTime` datetime DEFAULT NULL,
      `jaygeorge_perch_admin_styleDynamicFields` text,
      PRIMARY KEY (`jaygeorge_perch_admin_styleID`)
    ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;";
    
    $sql = str_replace('__PREFIX__', PERCH_DB_PREFIX, $sql);
    
    $statements = explode(';', $sql);
    foreach($statements as $statement) {
        $statement = trim($statement);
        if ($statement!='') $this->db->execute($statement);
    }
        
    $sql = 'SHOW TABLES LIKE "'.$this->table.'"';
    $result = $this->db->get_value($sql);
    
    return $result;
