<?php

class Ds7__jkmkudjk_lk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("u_1", "string", 32, array('default' => '0'));
        $this->hasColumn("u1", "string", 32, array('default' => '0'));
        $this->hasColumn("u5", "string", 32, array('default' => '0'));
        $this->hasColumn("u15", "string", 32, array('default' => '0'));
        $this->hasColumn("u44", "string", 32, array('default' => '0'));
      
       
	}

    public function setUp() {
        $this->setTableName("ds7__jkmkudjk_lk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>