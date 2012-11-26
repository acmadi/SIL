<?php

class Sd5a__ektlkaea_25 extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("besaran", "string", 32, array('default' => '0'));
        $this->hasColumn("melebihi_tidak", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
      
	}

    public function setUp() {
        $this->setTableName("sd5a__ektlkaea_25");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>