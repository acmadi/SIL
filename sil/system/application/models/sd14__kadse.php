<?php

class Sd14__kadse extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("parameter", "string", 32, array('default' => '0'));
        $this->hasColumn("satuan", "string", 32, array('default' => '0'));
        $this->hasColumn("l1", "string", 32, array('default' => '0'));
        $this->hasColumn("l2", "string", 32, array('default' => '0'));
        $this->hasColumn("l3", "string", 32, array('default' => '0'));
        $this->hasColumn("l4", "string", 32, array('default' => '0'));
        $this->hasColumn("l5", "string", 32, array('default' => '0'));
       
	}

    public function setUp() {
        $this->setTableName("sd14__kadse");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>