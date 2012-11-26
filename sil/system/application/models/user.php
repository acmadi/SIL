<?php

class User extends Doctrine_Record {

    public function setTableDefinition() {
        $this->hasColumn('username', 'string', 255);
        $this->hasColumn('password', 'string', 255);
        $this->hasColumn('nama', 'string', 255);
        $this->hasColumn('deskripsi', 'string', 255);
        $this->hasColumn("lon", "string", 32);
        $this->hasColumn("lat", "string", 32);
        $this->hasColumn('file_logo', 'string', 255);
        $this->hasColumn('phone_no', 'string', 255);
        $this->hasColumn('email', 'string', 255);
        $this->hasColumn('status', 'int', 1);
        $this->hasColumn('role', 'int', 1);
    }

    public function setUp() {
        $this->setTableName('user');
        $this->actAs('Timestampable');
        $this->hasMutator('password', '_encrypt_password');

        // $this->hasMany("Report as Reports", array(
        // "local" => "id",
        // "foreign" => "user_id"
        // ));
    }

    public function getWiki() {
        if (!($wiki = Doctrine::getTable("Wiki")->find($this->id))) {
            $wiki = new Wiki();
            $wiki->id = $this->id;
        }

        return $wiki;
    }

    protected function _encrypt_password($value) {
        $salt = '#*bPlHd!@-*%';
        $this->_set('password', md5($salt . $value));
    }

}