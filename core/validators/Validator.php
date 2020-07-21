<?php

  abstract class Validator {

    public $model;
    public $field;
    public $rule;
    public $msg;
    public $isValid;

    public function __construct($model, $params) {
      $this->model = $model;
      if(array_key_exists('field', $params)) {
        $this->field = $params['field'];
      }
      if(array_key_exists('msg', $params)) {
        $this->msg = $params['msg'];
      }
      if(array_key_exists('rule', $params)) {
        $this->rule = $params['rule'];
      }
      $this->isValid = $this->validate();
    }

    abstract public function validate();
  }
