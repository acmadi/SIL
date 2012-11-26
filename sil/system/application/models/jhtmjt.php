<?php

class Jhtmjt extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("sapi_perah", "string", 32, array('default' => '0'));
        $this->hasColumn("sapi_potong", "string", 32, array('default' => '0'));
        $this->hasColumn("kerbau", "string", 32, array('default' => '0'));
        $this->hasColumn("kuda", "string", 32, array('default' => '0'));
        $this->hasColumn("kambing", "string", 32, array('default' => '0'));
        $this->hasColumn("domba", "string", 32, array('default' => '0'));
        $this->hasColumn("babi", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("jhtmjt");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>