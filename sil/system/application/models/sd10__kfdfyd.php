<?php

class Sd10__kfdfyd extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("golongan", "string", 32, array('default' => '0'));
        $this->hasColumn("nama_spesies", "string", 32, array('default' => '0'));
        $this->hasColumn("status", "string", 32, array('default' => '0'));
	}

    public function setUp() {
        $this->setTableName("sd10__kfdfyd");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>