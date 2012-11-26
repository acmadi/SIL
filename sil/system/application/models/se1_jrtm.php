<?php

class Se1_jrtm extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah_rt", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_rt_miskin", "string", 32, array('default' => '0'));
        $this->hasColumn("persentase", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("se1_jrtm");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>