<?php

class Jkbb extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah", "string", 32, array('default' => '0'));
        $this->hasColumn("baik", "string", 32, array('default' => '0'));
        $this->hasColumn("rusak_ringan", "string", 32, array('default' => '0'));
        $this->hasColumn("rusak_berat", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("jkbb");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>