<?php

class Sd9__jsfdfydddmgs extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah_spesies_diketahui", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_spesies_dilindungi", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("sd9__jsfdfydddmgs");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>