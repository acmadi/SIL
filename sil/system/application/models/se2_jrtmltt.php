<?php

class Se2_jrtmltt extends Doctrine_Record {

    public function setTableDefinition() {
          $this->hasColumn("mewah", "string", 32, array('default' => '0'));
          $this->hasColumn("menengah", "string", 32, array('default' => '0'));
		   $this->hasColumn("sederhana", "string", 32, array('default' => '0'));
          $this->hasColumn("kumuh", "string", 32, array('default' => '0'));
          $this->hasColumn("bantaran_sungai", "string", 32, array('default' => '0'));
          $this->hasColumn("pasang_surut", "string", 32, array('default' => '0'));
          $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);

	}

    public function setUp() {
        $this->setTableName("se2_jrtmltt");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>