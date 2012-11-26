<?php

class Up12__phbtrdplh extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jenis_produk", "string", 32, array('default' => '0'));
        $this->hasColumn("nomor", "string", 32, array('default' => '0'));
        $this->hasColumn("tahun", "string", 32, array('default' => '0'));
        $this->hasColumn("tentang", "string", 32, array('default' => '0'));
         		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
                
	}

    public function setUp() {
        $this->setTableName("up12__phbtrdplh");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>