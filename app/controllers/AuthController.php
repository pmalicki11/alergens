<?php

  class AuthController {

    private $_view;
    private $_model;


    public function __construct() {
      $this->_view = new View();
    }


    public function loginAction() {
      if(!isset($_SESSION['user'])) {
        if(!empty($_POST)) {
          $this->_model = new Users();
          $this->_model->getFromPost($_POST);
          $this->_view->errors = [];
          if($this->_model->login()) {
            header('Location: ' . PROOT . 'home/index'); die();
          } else {
            $this->_view->errors = $this->_model->getErrors();
          }
        }
        $this->_view->render('auth/login');
      } else {
        header('Location: ' . PROOT . 'home/index'); die();
      }
    }


    public function logoutAction() {
      if(isset($_SESSION['user'])) {
        session_unset();
      }
      header('Location: ' . PROOT . 'home/index'); die();
    }


    public function registerAction() {
      if(!isset($_SESSION['user'])) {
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
      } else {
        header('Location: ' . PROOT . 'home/index'); die();
      }
    }
  }
