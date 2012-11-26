<?php

class Sd19_ltdktk extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("luas_tutupan", "string", 32, array('default' => '0'));
        $this->hasColumn("sangat_baik", "string", 32, array('default' => '0'));
        $this->hasColumn("baik", "string", 32, array('default' => '0'));
        $this->hasColumn("sedang", "string", 32, array('default' => '0'));
        $this->hasColumn("rusak", "string", 32, array('default' => '0'));
		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("sd19_ltdktk");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>