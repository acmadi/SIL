<?php

class Report extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn("kota_id", "int", 10);
        $this->hasColumn("tahun", "string", 32);
        $this->hasColumn("notes", "string", 255);
        $this->hasColumn("lock_status", "int", 4);
    }

    public function setUp() {
        $this->setTableName("report");
    }
}

?>