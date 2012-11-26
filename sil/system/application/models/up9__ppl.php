<?php

class Up9__ppl extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama", "string", 32, array('default' => '0'));
        $this->hasColumn("nama_penghargaan", "string", 32, array('default' => '0'));
        $this->hasColumn("pemberi_penghargaan", "string", 32, array('default' => '0'));
       		$this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);

	}

    public function setUp() {
        $this->setTableName("up9__ppl");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>