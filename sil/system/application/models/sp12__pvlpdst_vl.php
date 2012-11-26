<?php

class Sp12__pvlpdst_vl extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("angkutan_umum", "string", 32, array('default' => '0'));
        $this->hasColumn("sungai", "string", 32, array('default' => '0'));
        $this->hasColumn("laut", "string", 32, array('default' => '0'));
        $this->hasColumn("udara", "string", 32, array('default' => '0'));
           $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
            
	}

    public function setUp() {
        $this->setTableName("sp12__pvlpdst_vl");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>