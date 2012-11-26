<?php

class Se20__pjmk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("j_nasional", "string", 32, array('default' => '0'));
        $this->hasColumn("j_provinsi", "string", 32, array('default' => '0'));
        $this->hasColumn("j_kabupaten", "string", 32, array('default' => '0'));
        $this->hasColumn("j_kota", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
       
	}

    public function setUp() {
        $this->setTableName("se20__pjmk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>