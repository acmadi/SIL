<?php

class Sp14__pblcdlpdh extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama", "string", 32, array('default' => '0'));
        $this->hasColumn("kelas", "string", 32, array('default' => '0'));
        $this->hasColumn("limbah_padat", "string", 32, array('default' => '0'));
        $this->hasColumn("bod", "string", 32, array('default' => '0'));
        $this->hasColumn("cod", "string", 32, array('default' => '0'));
             $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
          
	}

    public function setUp() {
        $this->setTableName("sp14__pblcdlpdh");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>