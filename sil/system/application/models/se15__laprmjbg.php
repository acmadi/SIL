<?php

class Se15__laprmjbg extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jenis", "string", 32, array('default' => '0'));
        $this->hasColumn("luas", "string", 32, array('default' => '0'));
        $this->hasColumn("produksi", "string", 32, array('default' => '0'));
             $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);

       
	}

    public function setUp() {
        $this->setTableName("se15__laprmjbg");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>