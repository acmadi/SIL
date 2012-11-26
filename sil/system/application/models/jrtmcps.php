<?php

class Jrtmcps extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah", "string", 32, array('default' => '0'));
        $this->hasColumn("angkut", "string", 32, array('default' => '0'));
        $this->hasColumn("timbun", "string", 32, array('default' => '0'));
        $this->hasColumn("bakar", "string", 32, array('default' => '0'));
        $this->hasColumn("sungai", "string", 32, array('default' => '0'));
        $this->hasColumn("lainnya", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("jrtmcps");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>