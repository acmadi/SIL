<?php

class Se18__kbbmusimjbb extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama_indsutri", "string", 32, array('default' => '0'));
        $this->hasColumn("lpg", "string", 32, array('default' => '0'));
        $this->hasColumn("minyak_bakar", "string", 32, array('default' => '0'));
        $this->hasColumn("minyak_diesel", "string", 32, array('default' => '0'));
        $this->hasColumn("solar", "string", 32, array('default' => '0'));
        $this->hasColumn("minyak_tanah", "string", 32, array('default' => '0'));
        $this->hasColumn("gas", "string", 32, array('default' => '0'));
        $this->hasColumn("batubara", "string", 32, array('default' => '0'));
        $this->hasColumn("biomassa", "string", 32, array('default' => '0'));
         $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
     
       
	}

    public function setUp() {
        $this->setTableName("se18__kbbmusimjbb");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>