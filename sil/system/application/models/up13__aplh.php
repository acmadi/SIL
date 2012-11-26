<?php

class Up13__aplh extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("apbd", "string", 32, array('default' => '0'));
        $this->hasColumn("apbn", "string", 32, array('default' => '0'));
       $this->hasColumn("luar_negri", "int", 10);
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);

                    
	}

    public function setUp() {
        $this->setTableName("up13__aplh");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>