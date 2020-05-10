<?php

  class AuthController {

    private $_view;
    private $_model;


    public function __construct() {
      $this->_view = new View();
    }


    public function loginAction() {
      $this->_view->render('auth/login');
    }


    public function registerAction() {
      if(!empty($_POST)) {
        $this->_model = new Users();
        $this->_model->getFromPost($_POST);
        $this->_view->errors = [];

        if($this->_model->isValid()) {
          $this->_model->save();
          header('Location: ' . PROOT . 'home/index'); die();
        } else {
          $this->_view->errors = $this->_model->getErrors();
        }
      }
      $this->_view->render('auth/register');
    }
  }
