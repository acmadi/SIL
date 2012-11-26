<?php

class Huetmb extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("hc", "string", 32, array('default' => '0'));
        $this->hasColumn("co_hc", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("huetmb");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>