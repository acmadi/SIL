<?php

class Jrtmftbab extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah", "string", 32, array('default' => '0'));
        $this->hasColumn("sendiri", "string", 32, array('default' => '0'));
        $this->hasColumn("bersama", "string", 32, array('default' => '0'));
        $this->hasColumn("umum", "string", 32, array('default' => '0'));
        $this->hasColumn("tidak_ada", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("jrtmftbab");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>