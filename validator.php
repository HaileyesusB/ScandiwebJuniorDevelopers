<?php

class UserValidator
{
  // INITIALISING PROPERTIES

  private $Sku, $Name, $Price, $ProductType;
  private $errors = [];

  // CONSTRUCTING PROPERTIES

  public function __construct($sku, $name, $price, $productType)
  {
    $this->Sku = $sku;
    $this->Name = $name;
    $this->Price = $price;
    $this->ProductType = $productType;
  }

  // RETURNING ERRORS 

  public function validateForm()
  {
    $this->validateSKU();
    $this->validateName();
    $this->validatePrice();
    $this->validateProductType();
    return $this->errors;
  }

  // VALIDATING SKU

  private function validateSKU()
  {
    $val = $this->Sku;
    if (empty($val)) {
      $this->addError('Sku', 'Please, submit required data');
    } else {
      if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $val)) {
        $this->addError('Sku', 'Please, provide the data of indicated type');
      }
    }
  }

  // VALIDATING NAME

  private function validateName()
  {
    $val = $this->Name;
    if (empty($val)) {
      $this->addError('Name', 'Please, submit required data');
    } else {
      if (!preg_match('/^[a-zA-Z -]*$/', $val)) {
        $this->addError('Name', 'Please, provide the data of indicated type');
      }
    }
  }

  // VALIDATING PRICE

  private function validatePrice()
  {
    $val = $this->Price;

    if (empty($val)) {
      $this->addError('Price', 'Please, submit required data');
    } else {
      if (!preg_match('/^[0-9]*$/', $val)) {
        $this->addError('Price', 'Please, provide the data of indicated type');
      }
    }
  }

  // VALIDATING PRODUCTYPE

  public function validateProductType()
  {
    $val = $this->ProductType;
    if (empty($val)) {
      $this->addError('ProductType', 'Please, submit required data');
    } else {
      if (!preg_match('/^[a-zA-Z -]*$/', $val)) {
        $this->addError('ProductType', 'Please, provide the data of indicated type');
      }
    }
  }

  // ADDING ERRORS

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
