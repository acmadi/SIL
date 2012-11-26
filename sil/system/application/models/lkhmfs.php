<?php

class Lkhmfs extends Doctrine_Record {

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
		$this->hasColumn("hutan_produksi_konservasi", "string", 32, array('default' => '0'));
		$this->hasColumn("hutan_kota", "string", 32, array('default' => '0'));
		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("lkhmfs");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>