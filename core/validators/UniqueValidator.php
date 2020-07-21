<?php

  class UniqueValidator extends Validator {

    public function validate() {
      $fieldValue = $this->model->{$this->field};
      $components = $this->model->find([$this->field => ['=', $fieldValue]]);
      return (count($components) > 0) ? false : true;
    }
  }
