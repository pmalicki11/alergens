<?php

  class ComponentsController {


    public function __construct() {
      $this->_view = new View();
    }

    public function indexAction() { 
      $this->_view->components = Components::getAll();
      $this->_view->render('components/index');
    }

    public function addAction() {
      if(isset($_POST['name']) && strlen($_POST['name']) > 0) {
        $component = new Components($_POST['name']);
        if(!$component->exists()) {
          $component->save();
        }
      }
      $this->_view->render('components/add');
    }
  }
