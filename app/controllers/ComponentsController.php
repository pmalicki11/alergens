<?php

  class ComponentsController {

    public function __construct() {
      $this->_view = new View();
    }

    public function indexAction() {
      $this->_view->render('components/index');
    }

    public function addAction() {
      $this->_view->render('components/add');
    }
  }
