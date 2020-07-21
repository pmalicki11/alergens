<?php

  class ComponentsController {

    private $_view;
    private $_model;


    public function __construct() {
      $this->_view = new View();
      $this->_model = new Components();
    }


    public function indexAction() {
      $this->_view->components = $this->_model->getAll();
      $this->_view->render('components/index');
    }


    public function addAction() {
      $this->_model = new Components();
      $this->_view->errors = [];
      if($this->_model->getFromPost()) {
        if($this->_model->save()){
          header('Location: ' . PROOT . 'components/index');
          die();
        }
      }
      $this->_view->errors = $this->_model->getErrors();
      $this->_view->render('components/add');
    }


    public function deleteAction($id) {
      if($this->_model->delete($id)) {
        header('Location: ' . PROOT . 'components/index'); die();
      }
    }
  }
