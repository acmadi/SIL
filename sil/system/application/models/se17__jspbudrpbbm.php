<?php

class Se17__jspbudrpbbm extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("lokasi", "string", 32, array('default' => '0'));
        $this->hasColumn("premium", "string", 32, array('default' => '0'));
        $this->hasColumn("pertamax", "string", 32, array('default' => '0'));
        $this->hasColumn("solar", "string", 32, array('default' => '0'));
         $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("data_tahun", "int", 10);
  
       
	}

    public function setUp() {
        $this->setTableName("se17__jspbudrpbbm");
		
        // $this->hasOne("User", array(
            // "local" => "user_id",
            // "foreign" => "id"
        // ));
    }
}

?>