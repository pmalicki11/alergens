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
      if(isset($_POST['name']) && strlen($_POST['name']) > 0) {
        $this->_model = new Components($_POST['name']);
        $this->_model->save();
        header('Location: '. PROOT . 'components/index');
      }
      $this->_view->render('components/add');
    }


    public function deleteAction($id) {
      if($this->_model->delete($id)) {
        header('Location: '. PROOT . 'components/index');
      }
    }
  }
