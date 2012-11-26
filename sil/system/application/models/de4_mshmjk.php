<?php

class De4_mshmjk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("ld", "string", 32, array('default' => '0'));
        $this->hasColumn("pd", "string", 32, array('default' => '0'));
        $this->hasColumn("lp", "string", 32, array('default' => '0'));
        $this->hasColumn("pp", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("de4_mshmjk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>