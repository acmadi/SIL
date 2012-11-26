<?php

class Lahan_Kritis extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("dalam_kawasan_hutan", "string", 32, array('default' => '0'));
        $this->hasColumn("luar_kawasan_hutan", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("lahan_kritis");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>