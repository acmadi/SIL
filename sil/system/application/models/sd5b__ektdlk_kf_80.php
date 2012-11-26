<?php

class Sd5b__ektdlk_kf_80 extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("pengamatan", "string", 32, array('default' => '0'));
        $this->hasColumn("melebihi_tidak", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
      
	}

    public function setUp() {
        $this->setTableName("Sd5b__ektdlk_kf_80");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>