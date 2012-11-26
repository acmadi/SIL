<?php

class Jpp extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah_desa", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_penduduk", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_rt", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("jpp");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>