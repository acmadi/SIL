<?php

class Sp10__pbedisk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jenis", "string", 32, array('default' => '0'));
        $this->hasColumn("co2", "string", 32, array('default' => '0'));
        $this->hasColumn("no2", "string", 32, array('default' => '0'));
        $this->hasColumn("so2", "string", 32, array('default' => '0'));
           $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
         
	}

    public function setUp() {
        $this->setTableName("sp10__pbedisk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>