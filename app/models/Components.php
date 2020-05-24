<?php

  class Components {

    private $_name;
    private $_db;
    private $_errors = [];
    private $_table;


    public function __construct($name = '') {
      $this->_name = $name;
      $this->_db = DB::getInstance();
      $this->_table = 'components';
    }


    public function exists() {
      $params = [
        'Columns' => ['name'],
        'Conditions' => ['name' => ['=', $this->_name]]
      ];
      if(count($this->_db->select($this->_table, $params)) > 0) {
        return true;
      }
      return false;
    }


    public function save() {
      if(!$this->exists()) {
        $params = ['name' => $this->_name];
        $this->_db->insert($this->_table, $params);
      }
    }


    public function delete($id) {
      $params = ['Conditions' => ['id' => $id]];
      if(true) { //id is not used in products as foreign key
        return $this->_db->delete($this->_table, $params);
      }
      return false;
    }


    public function getAll() {
      $params = ['Columns' => ['id', 'name']];
      return $this->_db->select($this->_table, $params);
    }


    public function getByNamePart($name) {
      $params = [
        'Columns' => ['id', 'name'],
        'Conditions' => ['name' => ['LIKE', $name.'%']]
      ];
      return $this->_db->select($this->_table, $params);
    }


    public function isValid() {
      if(strlen($this->_name) < 3) {
        $this->_errors += ['name' => 'Name must be at least 3 characters long'];
      }
      if(count($this->_errors) > 0) {
        return false;
      }
      return true;
    }


    public function getErrors() {
      return $this->_errors;
    }
  }
