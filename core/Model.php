<?php

  class Model {

    protected $_db;
    protected $_errors = [];
    protected $table;

    public function __construct($table) {
      $this->_db = DB::getInstance();
      $this->_table = $table;
    }

    public function getAll() {
      $columns = $this->_db->getColumns($this->_table);
      $params = ['Columns' => $columns];
      return $this->_db->select($this->_table, $params);
    }

    protected function getErrors() {
      return $this->_errors;
    }
  }
