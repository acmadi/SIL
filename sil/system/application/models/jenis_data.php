<?php

class Jenis_Data extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("nama", "string", 255);
        $this->hasColumn("satuan", "string", 255);
        $this->hasColumn("kategori", "string", 255);
        $this->hasColumn("nama_tabel", "string", 255);
	}

    public function setUp() {
        $this->setTableName("jenis_data");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>