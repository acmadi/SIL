<?php

class Se4_llsmfphpph extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("satu_kali", "string", 32, array('default' => '0'));
        $this->hasColumn("dua_kali", "string", 32, array('default' => '0'));
        $this->hasColumn("tiga_kali", "string", 32, array('default' => '0'));
        $this->hasColumn("ppp", "string", 32, array('default' => '0'));
        $this->hasColumn("luas_tanam", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("se4_llsmfphpph");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>