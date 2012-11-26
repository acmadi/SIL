<?php

class Ba4_bkhlldk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("luas_terbakar", "string", 32, array('default' => '0'));
        $this->hasColumn("perkiraan_kerugian", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("ba4_bkhlldk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>