<?php

class De1_lwjplp extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("luas", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_penduduk", "string", 32, array('default' => '0'));
        $this->hasColumn("pertumbuhan_penduduk", "string", 32, array('default' => '0'));
        $this->hasColumn("kepadatan_penduduk", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("De1_lwjplp");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>