<?php

class Sp16__pymimlb3 extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama", "string", 32, array('default' => '0'));
        $this->hasColumn("jenis_izin", "string", 32, array('default' => '0'));
        $this->hasColumn("no_izin", "string", 32, array('default' => '0'));
                $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
             
	}

    public function setUp() {
        $this->setTableName("sp16__pymimlb3");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>