<?php

class De2_Laki_Laki_By_Umur extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("usia_0_14", "string", 32, array('default' => '0'));
        $this->hasColumn("usia_15_19", "string", 32, array('default' => '0'));
        $this->hasColumn("usia_40_54", "string", 32, array('default' => '0'));
        $this->hasColumn("usia_55_64", "string", 32, array('default' => '0'));
        $this->hasColumn("usia_65", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("de2_laki_laki_by_umur");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>