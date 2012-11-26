<?php

class Ektdlkaea extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("tebal_tanah", "string", 32, array('default' => '0'));
		$this->hasColumn("ambang_krisi_erosi", "string", 32, array('default' => '0'));
		$this->hasColumn("besaran_erosi", "string", 32, array('default' => '0'));
		$this->hasColumn("melebihi_tidak", "string", 32, array('default' => '0'));
		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("ektdlkaea");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>