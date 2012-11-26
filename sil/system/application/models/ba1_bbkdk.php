<?php

class Ba1_bbkdk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("total_area_terendam", "string", 32, array('default' => '0'));
        $this->hasColumn("mengungsi", "string", 32, array('default' => '0'));
        $this->hasColumn("meninggal", "string", 32, array('default' => '0'));
        $this->hasColumn("perkiraan_kerugian", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("ba1_bbkdk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>