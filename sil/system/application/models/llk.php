<?php

class Sd5_llk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("Luas", "string", 32, array('default' => '0'));
		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("sd5_llk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>