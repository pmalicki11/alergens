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
      $this->_model = new Products();
      $this->_view->errors = [];
      if($this->_model->getFromPost()) {
        if($this->_model->save()) {
          header('Location: ' . PROOT . 'products/index');
          die();
        }
      }
      $this->_view->errors = $this->_model->getErrors();
      $this->_view->render('products/add');
    }


    public function deleteAction($id) {
      if($this->_model->delete($id)) {
        header('Location: '. PROOT . 'products/index');
      }
    }


    public function ajaxAction() {
      $namePart = $_REQUEST["namepart"];
      $components = new Components();
      $result = array_column($components->getByNamePart($namePart), "name");
      $jsonOut = '';
      if(count($result) > 0) {
        $jsonOut .= '[';
        foreach ($result as $value) {
          $jsonOut .= '"' . $value .'",';
        }
        $jsonOut = rtrim($jsonOut, ',');
        $jsonOut .= ']';
        echo $jsonOut;
      } else {
        echo "";
      }
      //echo implode(',', array_column($components->getByNamePart($namePart), "name"));
    }
  }
