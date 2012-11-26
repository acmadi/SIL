<?php

class Up11__kfpklom extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama_kegiatan", "string", 32, array('default' => '0'));
        $this->hasColumn("lokasi", "string", 32, array('default' => '0'));
        $this->hasColumn("pelaksana", "string", 32, array('default' => '0'));
        		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
                
	}

    public function setUp() {
        $this->setTableName("up11__kfpklom");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>