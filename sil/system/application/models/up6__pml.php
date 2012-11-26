<?php

class Up6__pml extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("masalah", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_pengaduan", "string", 32, array('default' => '0'));
      		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
               
	}

    public function setUp() {
        $this->setTableName("up6__pml");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>