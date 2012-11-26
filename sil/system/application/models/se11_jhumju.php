<?php

class Se11_jhumju extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("ayam_kampung", "string", 32, array('default' => '0'));
        $this->hasColumn("ayam_petelur", "string", 32, array('default' => '0'));
        $this->hasColumn("ayam_daging", "string", 32, array('default' => '0'));
        $this->hasColumn("itik", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("se11_jhumju");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>