<?php

class Sd20_ldkpl extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("luas", "string", 32, array('default' => '0'));
        $this->hasColumn("pak", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("sd20_ldkpl");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>