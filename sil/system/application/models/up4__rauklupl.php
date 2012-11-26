<?php

class Up4__rauklupl extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jenis_dokumen", "string", 32, array('default' => '0'));
        $this->hasColumn("kegiatan", "string", 32, array('default' => '0'));
        $this->hasColumn("pemrakarsa", "string", 32, array('default' => '0'));
  		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("up4__rauklupl");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>