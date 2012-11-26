<?php

class Ds8__jpuydp extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jenis", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_penderita", "string", 32, array('default' => '0'));
        $this->hasColumn("persentase_penderita", "string", 32, array('default' => '0'));
           $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
   
       
	}

    public function setUp() {
        $this->setTableName("ds8__jpuydp");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>