<?php

class Sp5__pvlpdlcdrs extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama", "string", 32, array('default' => '0'));
        $this->hasColumn("kelas", "string", 32, array('default' => '0'));
        $this->hasColumn("volume_padat", "string", 32, array('default' => '0'));
        $this->hasColumn("volume_cair", "string", 32, array('default' => '0'));
        $this->hasColumn("volume_b3_padat", "string", 32, array('default' => '0'));
        $this->hasColumn("volume_b3_cair", "string", 32, array('default' => '0'));
         $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
       
	}

    public function setUp() {
        $this->setTableName("sp5__pvlpdlcdrs");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>