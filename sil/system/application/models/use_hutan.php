<?php

class Use_Hutan extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("cagar_alam", "string", 32, array('default' => '0'));
        $this->hasColumn("suaka_margasatwa", "string", 32, array('default' => '0'));
        $this->hasColumn("taman_wisata", "string", 32, array('default' => '0'));
        $this->hasColumn("taman_buru", "string", 32, array('default' => '0'));
        $this->hasColumn("taman_nasional", "string", 32, array('default' => '0'));
        $this->hasColumn("taman_hutan_raya", "string", 32, array('default' => '0'));
        $this->hasColumn("hutan_lindung", "string", 32, array('default' => '0'));
        $this->hasColumn("hutan_produksi", "string", 32, array('default' => '0'));
        $this->hasColumn("hutan_produksi_terbatas", "string", 32, array('default' => '0'));
        $this->hasColumn("hutan_kota", "string", 32, array('default' => '0'));
        $this->hasColumn("hutan_tanaman_industri", "string", 32, array('default' => '0'));
        $this->hasColumn("lain_lain", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10, array('default' => '0'));
        $this->hasColumn("data_tahun", "int", 10, array('default' => '0'));
	}

    public function setUp() {
        $this->setTableName("use_hutan");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>