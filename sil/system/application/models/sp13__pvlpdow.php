<?php

class Sp13__pvlpdow extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama", "string", 32, array('default' => '0'));
        $this->hasColumn("luas", "string", 32, array('default' => '0'));
        $this->hasColumn("volume_limbah", "string", 32, array('default' => '0'));
           $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
            
	}

    public function setUp() {
        $this->setTableName("sp13__pvlpdow");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>