<?php

class Pegmdp extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("jumlah_ternak", "string", 32, array('default' => '0'));
        $this->hasColumn("jumlah_unggas", "string", 32, array('default' => '0'));
        $this->hasColumn("emisi_ternak", "string", 32, array('default' => '0'));
        $this->hasColumn("emisi_unggas", "string", 32, array('default' => '0'));
        $this->hasColumn("total", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("pegmdp");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>