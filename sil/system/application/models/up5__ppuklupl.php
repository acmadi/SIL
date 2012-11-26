<?php

class Up5__ppuklupl extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("waktu", "string", 32, array('default' => '0'));
        $this->hasColumn("nama_perusahaan", "string", 32, array('default' => '0'));
        $this->hasColumn("ukl", "string", 32, array('default' => '0'));
        $this->hasColumn("upl", "string", 32, array('default' => '0'));
    		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
            
	}

    public function setUp() {
        $this->setTableName("up5__ppuklupl");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>