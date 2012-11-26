<?php

class Ds6__pusjalhdjamhmgui_jalh extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("u15", "string", 32, array('default' => '0'));
        $this->hasColumn("u20", "string", 32, array('default' => '0'));
        $this->hasColumn("u25", "string", 32, array('default' => '0'));
        $this->hasColumn("u30", "string", 32, array('default' => '0'));
        $this->hasColumn("u30", "string", 32, array('default' => '0'));
        $this->hasColumn("u30", "string", 32, array('default' => '0'));
        $this->hasColumn("u40", "string", 32, array('default' => '0'));
        $this->hasColumn("u45", "string", 32, array('default' => '0'));
           $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
      
       
	}

    public function setUp() {
        $this->setTableName("ds6__pusjalhdjamhmgui_jalh");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>