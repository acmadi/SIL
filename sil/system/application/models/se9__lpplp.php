<?php

class Se9__lpplp extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("pemukiman", "string", 32, array('default' => '0'));
        $this->hasColumn("industri", "string", 32, array('default' => '0'));
        $this->hasColumn("tanah_kering", "string", 32, array('default' => '0'));
        $this->hasColumn("perkebunan", "string", 32, array('default' => '0'));
        $this->hasColumn("semak_belukar", "string", 32, array('default' => '0'));
        $this->hasColumn("tanah_kosong", "string", 32, array('default' => '0'));
        $this->hasColumn("perairan_kolam", "string", 32, array('default' => '0'));
        $this->hasColumn("lainnya", "string", 32, array('default' => '0'));
             $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);

       
	}

    public function setUp() {
        $this->setTableName("se9__lpplp");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>