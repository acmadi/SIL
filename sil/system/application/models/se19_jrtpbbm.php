<?php

class Se19_jrtpbbm extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah_rt", "string", 32, array('default' => '0'));
        $this->hasColumn("lpg", "string", 32, array('default' => '0'));
        $this->hasColumn("minyak_tanah", "string", 32, array('default' => '0'));
        $this->hasColumn("briket", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("se19_jrtpbbm");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>