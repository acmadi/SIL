<?php

class Wiki extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn('wiki', 'text', 512);
    }

    public function setUp() {
        $this->setTableName('wiki');
    }

    public function getUser() {
        return Doctrine::getTable("User")->find($this->id);
    }

}