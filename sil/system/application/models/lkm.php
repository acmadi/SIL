<?php

class Lkm extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("luas", "string", 32, array('default' => '0'));
        $this->hasColumn("baik", "string", 32, array('default' => '0'));
        $this->hasColumn("sedang", "string", 32, array('default' => '0'));
        $this->hasColumn("rusak", "string", 32, array('default' => '0'));
        $this->hasColumn("rehabilitasi", "string", 32, array('default' => '0'));
        $this->hasColumn("berubah_fungsi", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("lkm");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>