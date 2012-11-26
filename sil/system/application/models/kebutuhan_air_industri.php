<?php

class Kebutuhan_Air_Industri extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah_perusahaan", "string", 32, array('default' => '0'));
        $this->hasColumn("kebutuhan_air_industri", "string", 32, array('default' => '0'));
        $this->hasColumn("pertanian", "string", 32, array('default' => '0'));
        $this->hasColumn("kebutuhan_air_niaga", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10, array('default' => '0'));
        $this->hasColumn("data_tahun", "int", 10, array('default' => '0'));
	}

    public function setUp() {
        $this->setTableName("kebutuhan_air_industri");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>