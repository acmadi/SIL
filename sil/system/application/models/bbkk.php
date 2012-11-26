<?php

class Bbkk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("total_area", "string", 32, array('default' => '0'));
        $this->hasColumn("korban_mengungsi", "string", 32, array('default' => '0'));
        $this->hasColumn("korban_meninggal", "string", 32, array('default' => '0'));
        $this->hasColumn("perkiraan_kerugian", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("bbkk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>