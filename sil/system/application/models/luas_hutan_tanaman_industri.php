<?php

class Luas_Hutan_Tanaman_Industri extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("luas", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("luas_hutan_tanaman_industri");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>