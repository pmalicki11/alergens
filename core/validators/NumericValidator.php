<?php

  class NumericValidator extends Validator {

    public function validate() {
      $fieldValue = $this->model->{$this->field};
      return (strlen($fieldValue) > 0 && !is_numeric($fieldValue)) ? false : true;
    }
  }
