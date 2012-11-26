<?php

class Sd1_lwmplu extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("non_pertanian", "string", 32, array('default' => '0'));
        $this->hasColumn("sawah", "string", 32, array('default' => '0'));
        $this->hasColumn("lahan_kering", "string", 32, array('default' => '0'));
        $this->hasColumn("perkebunan", "string", 32, array('default' => '0'));
        $this->hasColumn("hutan", "string", 32, array('default' => '0'));
        $this->hasColumn("lainnya", "string", 32, array('default' => '0'));
        $this->hasColumn("total", "int", 10);
		 $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("sd1_lwmplu");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>