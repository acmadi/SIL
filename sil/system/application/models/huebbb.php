<?php

class Huebbb extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah_bme", "string", 32, array('default' => '0'));
        $this->hasColumn("persentase_bme", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_non_bme", "string", 32, array('default' => '0'));
        $this->hasColumn("persentase_non_bme", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("huebbb");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>