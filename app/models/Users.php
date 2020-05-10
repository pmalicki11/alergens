<?php

  class Users {

    private $_username;
    private $_email;
    private $_password;
    private $_repassword;
    private $_db;
    private $_errors = [];
    private $_table;


    public function __construct($username = '', $email = '', $password = '', $repassword = '') {
      $this->_username = $username;
      $this->_email = $email;
      $this->_password = $password;
      $this->_repassword = $repassword;
      $this->_db = DB::getInstance();
      $this->_table = 'users';
    }


    public function getFromPost($post) {
      $this->_username = $post['username'];
      $this->_email = $post['email'];
      $this->_password = $post['password'];
      $this->_repassword = $post['repassword'];
    }


    public function save() {
      $params = [
        'username' => $this->_username,
        'email' => $this->_email,
        'password' => $this->_password,
        'active' => '1',
        'acl' => '1',
      ];

      $this->_db->insert($this->_table, $params);
    }


    public function isValid() {
      $params = ['Columns' => ['username'], 'Conditions' => ['username' => $this->_username]];
      if(count($this->_db->select($this->_table, $params)) > 0) {
        $this->_errors += ['username' => 'Username ' . $this->_username .' is already registered'];
      }

      $params = ['Columns' => ['email'], 'Conditions' => ['email' => $this->_email]];
      if(count($this->_db->select($this->_table, $params)) > 0) {
        $this->_errors += ['email' => 'Email ' . $this->_email . ' is already registered'];
      }

      if(strlen($this->_username) < 3) {
        $this->_errors += ['username' => 'Username must be at least 3 characters long'];
      }

      if(strlen($this->_email) == 0) {
        $this->_errors += ['email' => 'Email is required'];
      }

      if(!filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
        $this->_errors += ['email' => 'Invalid email'];
      }

      if(strlen($this->_password) < 6) {
        $this->_errors += ['password' => 'Password must be at least 6 characters long'];
      }

      if($this->_password != $this->_repassword) {
        $this->_errors += ['repassword' => 'Passwords do not match'];
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
