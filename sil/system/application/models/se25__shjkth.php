<?php

class Se25__shjkth extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama", "string", 32, array('default' => '0'));
        $this->hasColumn("kelas", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_kamar", "string", 32, array('default' => '0'));
        $this->hasColumn("persentase_tingkat_hunian", "string", 32, array('default' => '0'));
         $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
       
	}

    public function setUp() {
        $this->setTableName("se25__shjkth");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>