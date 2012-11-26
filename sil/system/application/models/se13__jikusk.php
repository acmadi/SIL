<?php

class Se13__jikusk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama", "string", 32, array('default' => '0'));
        $this->hasColumn("jenis", "string", 32, array('default' => '0'));
        $this->hasColumn("terpasang", "string", 32, array('default' => '0'));
        $this->hasColumn("senyatanya", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
     
       
	}

    public function setUp() {
        $this->setTableName("se13__jikusk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>