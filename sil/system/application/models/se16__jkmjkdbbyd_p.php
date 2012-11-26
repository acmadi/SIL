<?php

class Se16__jkmjkdbbyd_p extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("beban", "string", 32, array('default' => '0'));
        $this->hasColumn("penumpang_pribadi", "string", 32, array('default' => '0'));
        $this->hasColumn("penumpang_umum", "string", 32, array('default' => '0'));
        $this->hasColumn("bus_besar_pribadi", "string", 32, array('default' => '0'));
        $this->hasColumn("bus_besar_umum", "string", 32, array('default' => '0'));
        $this->hasColumn("bus_kecil_pribadi", "string", 32, array('default' => '0'));
        $this->hasColumn("bus_kecil_umum", "string", 32, array('default' => '0'));
        $this->hasColumn("truk_besar", "string", 32, array('default' => '0'));
        $this->hasColumn("roda_tiga", "string", 32, array('default' => '0'));
        $this->hasColumn("roda_dua", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
     
       
	}

    public function setUp() {
        $this->setTableName("se16__jkmjkdbbyd_p");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>