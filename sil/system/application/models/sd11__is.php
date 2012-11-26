<?php

class Sd11__is extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama_sungai", "string", 32, array('default' => '0'));
        $this->hasColumn("panajang", "string", 32, array('default' => '0'));
        $this->hasColumn("lebar_permukaan", "string", 32, array('default' => '0'));
        $this->hasColumn("lebar_dasar", "string", 32, array('default' => '0'));
        $this->hasColumn("kedalaman", "string", 32, array('default' => '0'));
        $this->hasColumn("debit_maks", "string", 32, array('default' => '0'));
        $this->hasColumn("debit_min", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
		
	}

    public function setUp() {
        $this->setTableName("sd11__is");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>