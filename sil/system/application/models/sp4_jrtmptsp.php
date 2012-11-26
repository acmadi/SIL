<?php

class Sp4_jrtmptsp extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah_rt", "string", 32, array('default' => '0'));
        $this->hasColumn("timbunan_sampah", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("sp4_jrtmptsp");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>