<?php

class Up15__jsfbl extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama_istansi", "string", 32, array('default' => '0'));
        $this->hasColumn("nama_jabatan", "string", 32, array('default' => '0'));
       $this->hasColumn("staf_lai_laki", "string", 32, array('default' => '0'));
       $this->hasColumn("staf_perempuan", "string", 32, array('default' => '0'));
         		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("up15__jsfbl");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>