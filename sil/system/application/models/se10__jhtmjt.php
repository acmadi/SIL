<?php

class Se10__jhtmjt extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jenis_penggunaan", "string", 32, array('default' => '0'));
        $this->hasColumn("luas", "string", 32, array('default' => '0'));
     
       
	}

    public function setUp() {
        $this->setTableName("se10__jhtmjt");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>