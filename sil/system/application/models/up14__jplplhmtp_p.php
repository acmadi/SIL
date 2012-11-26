<?php

class Up14__jplplhmtp_p extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("doktor", "string", 32, array('default' => '0'));
        $this->hasColumn("master", "string", 32, array('default' => '0'));
       $this->hasColumn("sarjana", "string", 32, array('default' => '0'));
       $this->hasColumn("diploma", "string", 32, array('default' => '0'));
       $this->hasColumn("slta", "string", 32, array('default' => '0'));
           $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
                    
	}

    public function setUp() {
        $this->setTableName("up14__jplplhmtp_p");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>