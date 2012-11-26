<?php

class Test_table extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("kolom_satu", "string", 32, array('default' => '0'));
       $this->hasColumn("kolom_dua", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("test_table");
		
       
    }
}

?>
