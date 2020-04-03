<?php

  class Components {

    private $_name;

    public function __construct($name = '') {
      $this->_name = $name;
    }

    public function exists() {
      return false;
    }

    public function save() {
      return print('saved ' . $this->_name);
    }

    public static function getAll() {
      return 'List of all components';
    }

  }
