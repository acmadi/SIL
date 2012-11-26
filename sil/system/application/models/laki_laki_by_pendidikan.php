<?php

class Laki_Laki_By_Pendidikan extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("diploma", "string", 32, array('default' => '0'));
        $this->hasColumn("universitas", "string", 32, array('default' => '0'));
        $this->hasColumn("lain_lain", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("laki_laki_by_pendidikan");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>