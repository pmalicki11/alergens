<?php

  class Users {

    public $username;
    public $email;
    public $password;
    public $repassword;
    private $_acl;
    private $_db;
    private $_errors = [];
    private $_table;


    public function __construct($username = '', $email = '', $password = '', $repassword = '') {
      $this->username = $username;
      $this->email = $email;
      $this->password = $password;
      $this->repassword = $repassword;
      $this->_db = DB::getInstance();
      $this->_table = 'users';
    }


    public function getFromPost($post) {
      isset($post['username']) ? $this->username = $post['username'] : '';
      isset($post['email']) ? $this->email = $post['email'] : '';
      isset($post['password']) ? $this->password = $post['password'] : '';
      isset($post['repassword']) ? $this->repassword = $post['repassword'] : '';
    }


    public function save() {
      $params = [
        'username' => $this->username,
        'email' => $this->email,
        'password' => $this->password,
        'active' => '1',
        'acl' => 'user',
      ];

      $this->_db->insert($this->_table, $params);
    }


    public function login() {
      $params = [
        'Columns' => ['id', 'username', 'email', 'password', 'acl', 'active'],
        'Conditions' => ['username' => ['=', $this->username]]
      ];
      $user = $this->_db->select($this->_table, $params);
      if(count($user) > 0) {
        $user = $user[0];
        if($this->password == $user['password']) {
          $_SESSION[USER_SESSION] = $user['id'];
          return true;
        } else {
          $this->_errors += ['password' => 'Wrong password'];
        }
      } else {
        $this->_errors += ['username' => 'Username ' . $this->_username . ' does not exist'];
      }
      return false;
    }


    public function getById($id) {
      $params = [
        'Columns' => ['id', 'username', 'email', 'password', 'acl', 'active'],
        'Conditions' => ['id' => ['=', $id]]
      ];
      $user = $this->_db->select($this->_table, $params);
      if(count($user) > 0) {
        $user = $user[0];
        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->password = $user['password'];
        $this->_acl = $user['acl'];
      }
      return $this;
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


    public static function getCurrentUser() {
      $user = new Users();
      if(isset($_SESSION[USER_SESSION])) {
        $user->getById($_SESSION[USER_SESSION]);
      }
      return $user;
    }


    public function hasAccess($controller, $action) {
      $acls = array_merge(['guest'], explode(',', $this->_acl));
      $scope = json_decode(file_get_contents(ROOT . DS . 'config' . DS . 'acl.json'), true);
      foreach ($acls as $acl) {
        if(array_key_exists($acl, $scope)) {
          foreach($scope[$acl] as $allowedController => $allowedActions) {
            if($controller == $allowedController) {
              if(is_array($allowedActions)) {
                if(in_array($action, $allowedActions)) {
                  return true;
                }
              } else if($allowedActions == $action) {
                return true;
              }
            }
          }
        }
      }
      return false;
    }
  }
