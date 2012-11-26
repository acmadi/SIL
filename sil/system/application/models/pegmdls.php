<?php

class Pegmdls extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("luas_lahan", "string", 32, array('default' => '0'));
        $this->hasColumn("emisi", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("pegmdls");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>