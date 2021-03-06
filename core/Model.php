<?php

  class Model {

    protected $_db;
    protected $_errors = [];
    protected $_isValid;
    protected $_table;

    public function __construct($table) {
      $this->_db = DB::getInstance();
      $this->_table = $table;
      $this->_isValid = true;
    }

    public function getAll() {
      $columns = $this->_db->getColumns($this->_table);
      $params = ['Columns' => $columns];
      return $this->_db->select($this->_table, $params);
    }

    public function runValidation($validator) {
      if(!$validator->isValid) {
        $this->_isValid = false;
        $this->_errors[$validator->field] = $validator->msg;
      }
    }

    public function getErrors() {
      return $this->_errors;
    }
  }
