<?php

  class Products extends Model {

    private $_name;
    private $_producer;
    private $_portion;
    private $_energy;
    private $_fat;
    private $_carbohydrates;
    private $_protein;

    public function __construct($name = '', $producer = '', $portion = '', $energy = '', $fat = '', $carbohydrates = '', $protein = '') {
      parent::__construct('products');
      $this->_name = $name;
      $this->_producer = $producer;
      $this->_portion = $portion;
      $this->_energy = $energy;
      $this->_fat = $fat;
      $this->_carbohydrates = $carbohydrates;
      $this->_protein = $protein;
    }


    public function getFromPost($post) {
      $this->_name = $post['name'];
      $this->_producer = $post['producer'];
      $this->_portion = str_replace(',', '.', $post['portion']);
      $this->_energy = str_replace(',', '.', $post['energy']);
      $this->_fat = str_replace(',', '.', $post['fat']);
      $this->_carbohydrates = str_replace(',', '.', $post['carbohydrates']);
      $this->_protein = str_replace(',', '.', $post['protein']);
    }


    public function exists() {
      $params = [
        'Columns' => ['name'],
        'Conditions' => [
          'name' => ['=', $this->_name],
          'producer' => ['=', $this->_producer]
        ]
      ];

      if (count($this->_db->select($this->_table, $params)) > 0) {
        return true;
      }
      return false;
    }


    public function save() {
      $params = [
        'name' => $this->_name,
        'producer' => $this->_producer,
        'portion' => $this->_portion,
        'energy' => $this->_energy,
        'fat' => $this->_fat,
        'carbohydrates' => $this->_carbohydrates,
        'protein' => $this->_protein
      ];
      if(!$this->exists()) {
        $this->_db->insert($this->_table, $params);
      }
    }


    public function delete($id) {
      $params = ['Conditions' => ['id' => $id]];
      return $this->_db->delete($this->_table, $params);
    }


    public function isValid() {
      if(strlen($this->_name) < 2) {
        $this->_errors += ['name' =>'Name must be at least 2 characters long'];
      }
      if(strlen($this->_portion) > 0 && !is_numeric($this->_portion)) {
        $this->_errors += ['portion' => 'Portion value must be numeric'];
      }
      if(strlen($this->_energy) > 0 && !is_numeric($this->_energy)) {
        $this->_errors += ['energy' => 'Energy value must be numeric'];
      }
      if(strlen($this->_fat) > 0 && !is_numeric($this->_fat)) {
        $this->_errors += ['fat' => 'Fat value must be numeric'];
      }
      if(strlen($this->_carbohydrates) > 0 && !is_numeric($this->_carbohydrates)) {
        $this->_errors += ['carbohydrates' => 'Carbohydrates value must be numeric'];
      }
      if(strlen($this->_protein) > 0 && !is_numeric($this->_protein)) {
        $this->_errors += ['protein' => 'Protein value must be numeric'];
      }

      if(count($this->_errors) > 0) {
        return false;
      }
      return true;
    }
  }
