<?php

class Sd21__ldktm extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("lokasi", "string", 32, array('default' => '0'));
        $this->hasColumn("luas", "string", 32, array('default' => '0'));
        $this->hasColumn("tutupan", "string", 32, array('default' => '0'));
        $this->hasColumn("kerapatan", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
      
       
	}

    public function setUp() {
        $this->setTableName("sd21__ldktm");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>