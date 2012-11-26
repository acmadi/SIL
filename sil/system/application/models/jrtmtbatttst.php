<?php

class Jrtmtbatttst extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah", "string", 32, array('default' => '0'));
        $this->hasColumn("persentase", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("jrtmtbatttst");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>