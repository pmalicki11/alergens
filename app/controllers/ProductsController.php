<?php

  class ProductsController {

    public function __construct() {
      $this->_view = new View();
      $this->_view->setLayout('default');
    }

    public function indexAction() {
      $this->_view->render('products/index');
    }

    public function addAction() {
      $this->_view->render('products/add');
    }
  }
