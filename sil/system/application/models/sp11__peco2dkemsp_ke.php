<?php

class Sp11__peco2dkemsp_ke extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("transportasi", "string", 32, array('default' => '0'));
        $this->hasColumn("industri", "string", 32, array('default' => '0'));
        $this->hasColumn("rt", "string", 32, array('default' => '0'));
           $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
         
	}

    public function setUp() {
        $this->setTableName("sp11__peco2dkemsp_ke");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>