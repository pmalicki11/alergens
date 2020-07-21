<?php

  class Products extends Model {

    public $name;
    public $producer;
    public $portion;
    public $energy;
    public $fat;
    public $carbohydrates;
    public $protein;

    public function __construct() {
      parent::__construct('products');
    }


    public function getFromPost() {
      if(!isset($_POST['name'], $_POST['producer'], $_POST['portion'], $_POST['energy'], $_POST['fat'], $_POST['carbohydrates'], $_POST['protein'])) {
        return false;
      }
      $this->name = $_POST['name'];
      $this->producer = $_POST['producer'];
      $this->portion = str_replace(',', '.', $_POST['portion']);
      $this->energy = str_replace(',', '.', $_POST['energy']);
      $this->fat = str_replace(',', '.', $_POST['fat']);
      $this->carbohydrates = str_replace(',', '.', $_POST['carbohydrates']);
      $this->protein = str_replace(',', '.', $_POST['protein']);
      return true;
    }


    public function find($conditions) {
      $params = [
        'Columns' => ['name'],
        'Conditions' => $conditions
      ];
      return $this->_db->select($this->_table, $params);
    }


    public function save() {
      $this->validate();
      if($this->_isValid) {
        $params = [
          'name' => $this->name,
          'producer' => $this->producer,
          'portion' => $this->portion,
          'energy' => $this->energy,
          'fat' => $this->fat,
          'carbohydrates' => $this->carbohydrates,
          'protein' => $this->protein
        ];
        $this->_db->insert($this->_table, $params);
        return true;
      }
      return false;
    }


    public function delete($id) {
      $params = ['Conditions' => ['id' => $id]];
      return $this->_db->delete($this->_table, $params);
    }


    public function validate() {
      $this->runValidation(new MinValidator($this, ['field' => 'name', 'msg' => 'Name must be at least 2 characters long.', 'rule' => 2]));
      $this->runValidation(new UniqueValidator($this, ['field' => 'name', 'msg' => 'Product already exists.']));
      $this->runValidation(new MinValidator($this, ['field' => 'producer', 'msg' => 'Producer must be at least 2 characters long.', 'rule' => 2]));
      $this->runValidation(new NumericValidator($this, ['field' => 'portion', 'msg' => 'Portion must be numeric.']));
      $this->runValidation(new NumericValidator($this, ['field' => 'energy', 'msg' => 'Energy must be numeric.']));
      $this->runValidation(new NumericValidator($this, ['field' => 'fat', 'msg' => 'Fat must be numeric.']));
      $this->runValidation(new NumericValidator($this, ['field' => 'carbohydrates', 'msg' => 'Carbohydrates must be numeric.']));
      $this->runValidation(new NumericValidator($this, ['field' => 'protein', 'msg' => 'Protein must be numeric.']));
    }
  }
