<?php

class Sd17__kah_ph extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jan", "string", 32, array('default' => '0'));
        $this->hasColumn("feb", "string", 32, array('default' => '0'));
        $this->hasColumn("mar", "string", 32, array('default' => '0'));
        $this->hasColumn("apr", "string", 32, array('default' => '0'));
        $this->hasColumn("mei", "string", 32, array('default' => '0'));
        $this->hasColumn("jun", "string", 32, array('default' => '0'));
        $this->hasColumn("jul", "string", 32, array('default' => '0'));
        $this->hasColumn("agu", "string", 32, array('default' => '0'));
        $this->hasColumn("sept", "string", 32, array('default' => '0'));
        $this->hasColumn("okt", "string", 32, array('default' => '0'));
        $this->hasColumn("nov", "string", 32, array('default' => '0'));
        $this->hasColumn("des", "string", 32, array('default' => '0'));
           $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("sd17__kah_ph");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>