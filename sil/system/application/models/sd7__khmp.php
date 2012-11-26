<?php

class Sd7__khmp extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("pemukiman", "string", 32, array('default' => '0'));
        $this->hasColumn("pertanian", "string", 32, array('default' => '0'));
        $this->hasColumn("perkebunan", "string", 32, array('default' => '0'));
        $this->hasColumn("industri", "string", 32, array('default' => '0'));
        $this->hasColumn("pertambangan", "string", 32, array('default' => '0'));
        $this->hasColumn("lainnya", "string", 32, array('default' => '0'));
		 $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("sd7__khmp");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>