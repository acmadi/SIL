<?php

class Jpldkjsmtp extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah_penduduk", "string", 32, array('default' => '0'));
        $this->hasColumn("luas", "string", 32, array('default' => '0'));
        $this->hasColumn("kepadatan_penduduk", "string", 32, array('default' => '0'));
        $this->hasColumn("sd", "string", 32, array('default' => '0'));
        $this->hasColumn("sltp", "string", 32, array('default' => '0'));
        $this->hasColumn("slta", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("jpldkjsmtp");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>