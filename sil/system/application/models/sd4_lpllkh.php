<?php

class Sd4_lpllkh extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("ksa_kpa", "string", 32, array('default' => '0'));
        $this->hasColumn("hl", "string", 32, array('default' => '0'));
        $this->hasColumn("hpt", "string", 32, array('default' => '0'));
        $this->hasColumn("hp", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_ht", "string", 32, array('default' => '0'));
        $this->hasColumn("hpk", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_kh", "string", 32, array('default' => '0'));
        $this->hasColumn("apl", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);

       
	}

    public function setUp() {
        $this->setTableName("sd4_lpllkh");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>