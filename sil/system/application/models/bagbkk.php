<?php

class Bagbkk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("korban_meninggal", "string", 32, array('default' => '0'));
        $this->hasColumn("perkiraan_kerugian", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("bagbkk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>