<?php

  class Components extends Model {

    public $name;

    public function __construct($name = '') {
      parent::__construct('components');
      $this->name = $name;
    }

    public function getFromPost() {
      if(isset($_POST['name'])) {
        $this->name = $_POST['name'];
        return true;
      }
      return false;
    }


    public function find($conditions) {
      $params = [
        'Columns' => ['name'],
        'Conditions' => $conditions
      ];
      return $this->_db->select($this->_table, $params);
    }


    public function save() {
      $this->validate();
      if($this->_isValid) {
        $params = ['name' => $this->name];
        $this->_db->insert($this->_table, $params);
        return true;
      }
      return false;
    }


    public function delete($id) {
      $params = ['Conditions' => ['id' => $id]];
      if(true) { //id is not used in products as foreign key
        return $this->_db->delete($this->_table, $params);
      }
      return false;
    }


    public function getByNamePart($name) {
      $params = [
        'Columns' => ['id', 'name'],
        'Conditions' => ['name' => ['LIKE', $name.'%']]
      ];
      return $this->_db->select($this->_table, $params);
    }


    public function validate() {
      $this->runValidation(new MinValidator($this, ['field' => 'name', 'msg' => 'Name must be at least 3 characters long.', 'rule' => 3]));
      $this->runValidation(new UniqueValidator($this, ['field' => 'name', 'msg' => 'Component already exists.']));
    }


    public function runValidation($validator) {
      if(!$validator->isValid) {
        $this->_isValid = false;
        $this->_errors[$validator->field] = $validator->msg;
      }
    }

  }
