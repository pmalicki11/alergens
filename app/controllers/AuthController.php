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
      $this->_view->render('auth/register');
    }
  }
