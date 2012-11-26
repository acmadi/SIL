<?php

class Sd3__lkhlbrtrwdtl_lk extends Doctrine_Record {

    public function setTableDefinition() {
	
        $this->hasColumn("kawasan_hutan_lindung", "string", 32, array('default' => '0'));
        $this->hasColumn("kawasan_bergambut", "string", 32, array('default' => '0'));
        $this->hasColumn("kawasan_resapan_air", "string", 32, array('default' => '0'));
        $this->hasColumn("sempadan_pantai", "string", 32, array('default' => '0'));
        $this->hasColumn("sempadan_sungai", "string", 32, array('default' => '0'));
        $this->hasColumn("kawasan_sekitar_danau_waduk", "string", 32, array('default' => '0'));
        $this->hasColumn("ruang_terbuka_hijau", "string", 32, array('default' => '0'));
        $this->hasColumn("kawasan_suaka_alam", "string", 32, array('default' => '0'));
        $this->hasColumn("kawasan_suaka_laut", "string", 32, array('default' => '0'));
        $this->hasColumn("suaka", "string", 32, array('default' => '0'));
        $this->hasColumn("cagar", "string", 32, array('default' => '0'));
        $this->hasColumn("kawasasan_pantai", "string", 32, array('default' => '0'));
        $this->hasColumn("taman_nasional", "string", 32, array('default' => '0'));
        $this->hasColumn("taman_hutan", "string", 32, array('default' => '0'));
        $this->hasColumn("taman_wisata", "string", 32, array('default' => '0'));
        $this->hasColumn("kawasan_cagar_budaya", "string", 32, array('default' => '0'));
        $this->hasColumn("rawan_tanah_longsor", "string", 32, array('default' => '0'));
        $this->hasColumn("rawan_gelombang_pasang", "string", 32, array('default' => '0'));
        $this->hasColumn("rawan_banjir", "string", 32, array('default' => '0'));
        $this->hasColumn("keunikan_batuan", "string", 32, array('default' => '0'));
        $this->hasColumn("keunikan_bentang_alam", "string", 32, array('default' => '0'));
        $this->hasColumn("keunikan_proses_geologi", "string", 32, array('default' => '0'));
        $this->hasColumn("rawan_letusan", "string", 32, array('default' => '0'));
        $this->hasColumn("rawan_gempa", "string", 32, array('default' => '0'));
        $this->hasColumn("rawan_gerakan_tanah", "string", 32, array('default' => '0'));
        $this->hasColumn("zona_patah_aktif", "string", 32, array('default' => '0'));
        $this->hasColumn("rawan_tsunami", "string", 32, array('default' => '0'));
        $this->hasColumn("rawan_abrasi", "string", 32, array('default' => '0'));
        $this->hasColumn("rawan_gas_beracun", "string", 32, array('default' => '0'));
        $this->hasColumn("imbuhan_airtanah", "string", 32, array('default' => '0'));
        $this->hasColumn("imbuhan_mataair", "string", 32, array('default' => '0'));
        $this->hasColumn("cagar_biosfer", "string", 32, array('default' => '0'));
        $this->hasColumn("ramsar", "string", 32, array('default' => '0'));
        $this->hasColumn("taman_buru", "string", 32, array('default' => '0'));
        $this->hasColumn("plasma_nutfah", "string", 32, array('default' => '0'));
        $this->hasColumn("pengungsian_satwa", "string", 32, array('default' => '0'));
        $this->hasColumn("terumbu", "string", 32, array('default' => '0'));
        $this->hasColumn("koridor", "string", 32, array('default' => '0'));
         $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
      
	}

    public function setUp() {
        $this->setTableName("sd3__lkhlbrtrwdtl_lk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>
