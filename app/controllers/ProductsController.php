<?php

  class ProductsController {

    private $_view;
    private $_model;


    public function __construct() {
      $this->_view = new View();
      $this->_model = new Products();
    }


    public function indexAction() {
      $this->_view->products = $this->_model->getAll();
      $this->_view->render('products/index');
    }


    public function addAction() {
      if(isset($_POST['name'])) {
        $this->_view->errors = [];
        $this->_model = new Products();
        $this->_model->getFromPost($_POST);
        if(!$this->_model->exists()) {
          if($this->_model->isValid()) {
            $this->_model->save();
            header('Location: ' . PROOT . 'products/index'); die();
          } else {
            $this->_view->errors = $this->_model->getErrors();
          }
        } else {
          $this->_view->errors = ["Product already exists"];
        }
      }
      $this->_view->render('products/add');
    }


    public function deleteAction($id) {
      if($this->_model->delete($id)) {
        header('Location: '. PROOT . 'products/index');
      }
    }
  }
