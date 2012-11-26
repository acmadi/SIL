<?php

class Sd18__kal extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("parameter", "string", 32, array('default' => '0'));
        $this->hasColumn("satuan", "string", 32, array('default' => '0'));
        $this->hasColumn("baku_mutu", "string", 32, array('default' => '0'));
        $this->hasColumn("t1", "string", 32, array('default' => '0'));
        $this->hasColumn("t2", "string", 32, array('default' => '0'));
        $this->hasColumn("t3", "string", 32, array('default' => '0'));
        $this->hasColumn("t4", "string", 32, array('default' => '0'));
       
	}

    public function setUp() {
        $this->setTableName("sd18__kal");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>