<?php

class se6__ppb_mjt extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("karet", "string", 32, array('default' => '0'));
        $this->hasColumn("kelapa", "string", 32, array('default' => '0'));
        $this->hasColumn("kelapa_Sawit", "string", 32, array('default' => '0'));
        $this->hasColumn("kopi", "string", 32, array('default' => '0'));
        $this->hasColumn("coklat", "string", 32, array('default' => '0'));
        $this->hasColumn("teh", "string", 32, array('default' => '0'));
        $this->hasColumn("cengkeh", "string", 32, array('default' => '0'));
        $this->hasColumn("tebu", "string", 32, array('default' => '0'));
        $this->hasColumn("tembakau", "string", 32, array('default' => '0'));
        $this->hasColumn("kapas", "string", 32, array('default' => '0'));
        $this->hasColumn("jarak", "string", 32, array('default' => '0'));
        $this->hasColumn("kapuk", "string", 32, array('default' => '0'));
        $this->hasColumn("kina", "string", 32, array('default' => '0'));
        $this->hasColumn("jambu_mete", "string", 32, array('default' => '0'));
        $this->hasColumn("pala", "string", 32, array('default' => '0'));
        $this->hasColumn("kayu_manis", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
       
	}

    public function setUp() {
        $this->setTableName("se6__ppb_mjt");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>