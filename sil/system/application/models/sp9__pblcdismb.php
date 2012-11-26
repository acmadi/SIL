<?php

class Sp9__pblcdismb extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jenis", "string", 32, array('default' => '0'));
        $this->hasColumn("bod", "string", 32, array('default' => '0'));
        $this->hasColumn("cod", "string", 32, array('default' => '0'));
        $this->hasColumn("tss", "string", 32, array('default' => '0'));
         $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);

	}

    public function setUp() {
        $this->setTableName("sp9__pblcdismb");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>