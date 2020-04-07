<?php

  class Components {

    private $_name;
    private $_db;


    public function __construct($name = '') {
      $this->_name = $name;
      $this->_db = DB::getInstance();
    }


    public function exists() {
      $params = [
        'Columns' => ['name'],
        'Conditions' => ['name' => $this->_name]
      ];
      if (count($this->_db->select('Components', $params)) > 0) {
        return true;
      }
      return false;
    }


    public function save() {
      $params = ['name' => $this->_name];
      if(!$this->exists()) {
        $this->_db->insert('Components', $params);
      }
    }


    public function delete($id) {
      $params = ['Conditions' => ['id' => $id]];
      if(true) { //id is not used in products as foreign key
        return $this->_db->delete('Components', $params);
      }
      return false;
    }


    public function getAll() {
      $params = ['Columns' => ['id', 'name']];
      return $this->_db->select('Components', $params);
    }

  }
