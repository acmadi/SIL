<?php

class Volume_Pemakaian_Air_Permukaan extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("pdam", "string", 32, array('default' => '0'));
        $this->hasColumn("industri", "string", 32, array('default' => '0'));
        $this->hasColumn("non_pdam", "string", 32, array('default' => '0'));
        $this->hasColumn("pertanian", "string", 32, array('default' => '0'));
        $this->hasColumn("niaga", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("volume_pemakaian_air_permukaan");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>