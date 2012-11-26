<?php

class Sd6__plkhmp extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("kebakran_hutan", "string", 32, array('default' => '0'));
        $this->hasColumn("ladang_berpindah", "string", 32, array('default' => '0'));
	   $this->hasColumn("penebangan_liar", "string", 32, array('default' => '0'));
	   $this->hasColumn("perambahan_hutan", "string", 32, array('default' => '0'));
	   $this->hasColumn("lainnya", "string", 32, array('default' => '0'));
	    $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("sd6__plkhmp");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>