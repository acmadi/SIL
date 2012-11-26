<?php

class Up1_rrkp extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("luas_rcn", "string", 32, array('default' => '0'));
        $this->hasColumn("pohon_rcn", "string", 32, array('default' => '0'));
        $this->hasColumn("luas_rls", "string", 32, array('default' => '0'));
        $this->hasColumn("pohon_rls", "string", 32, array('default' => '0'));
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
	}

    public function setUp() {
        $this->setTableName("up1_rrkp");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>