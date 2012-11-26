<?php

class Se3_jrtsam extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("ledeng", "string", 32, array('default' => '0'));
        $this->hasColumn("sumur", "string", 32, array('default' => '0'));
        $this->hasColumn("pompa", "string", 32, array('default' => '0'));
        $this->hasColumn("kemasan", "string", 32, array('default' => '0'));
        $this->hasColumn("lainnya", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("se3_jrtsam");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>