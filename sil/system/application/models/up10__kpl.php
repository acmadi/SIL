<?php

class Up10__kpl extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama", "string", 32, array('default' => '0'));
        $this->hasColumn("penyelenggara", "string", 32, array('default' => '0'));
        $this->hasColumn("peserta", "string", 32, array('default' => '0'));
        $this->hasColumn("waktu", "string", 32, array('default' => '0'));
       		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
                 
	}

    public function setUp() {
        $this->setTableName("up10__kpl");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>