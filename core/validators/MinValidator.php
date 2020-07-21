<?php

  class MinValidator extends Validator {

    public function validate() {
      $fieldValue = $this->model->{$this->field};
      $len = strlen($fieldValue);
      return $len < $this->rule ? false : true;
    }
  }
