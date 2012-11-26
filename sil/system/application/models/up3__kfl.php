<?php

class Up3__kfl extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama", "string", 32, array('default' => '0'));
        $this->hasColumn("lokais", "string", 32, array('default' => '0'));
        $this->hasColumn("instansi_penanggung_jawab", "string", 32, array('default' => '0'));
  		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("up3__kfl");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>