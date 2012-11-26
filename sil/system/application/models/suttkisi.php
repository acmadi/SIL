<?php

class Suttkisi extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("unit_usaha", "string", 32, array('default' => '0'));
        $this->hasColumn("tenaga_kerja", "string", 32, array('default' => '0'));
        $this->hasColumn("nilai_produksi", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("suttkisi");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>