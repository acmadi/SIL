<?php

class Use_Lahan extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("pemukiman", "string", 32, array('default' => '0'));
        $this->hasColumn("jasa", "string", 32, array('default' => '0'));
        $this->hasColumn("industri", "string", 32, array('default' => '0'));
        $this->hasColumn("tegalan", "string", 32, array('default' => '0'));
        $this->hasColumn("sawah_irigasi_teknis", "string", 32, array('default' => '0'));
        $this->hasColumn("sawah_tadah_hujan", "string", 32, array('default' => '0'));
        $this->hasColumn("kebun_campuran", "string", 32, array('default' => '0'));
        $this->hasColumn("perkebunan", "string", 32, array('default' => '0'));
        $this->hasColumn("hutan", "string", 32, array('default' => '0'));
        $this->hasColumn("perairan", "string", 32, array('default' => '0'));
        $this->hasColumn("tambak", "string", 32, array('default' => '0'));
        $this->hasColumn("tanah_kosong", "string", 32, array('default' => '0'));
        $this->hasColumn("semak_alang", "string", 32, array('default' => '0'));
        $this->hasColumn("lain_lain", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
    }

    public function setUp() {
        $this->setTableName("use_lahan");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>