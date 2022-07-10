<?php

class Furniture extends ProductMain
{
  // CONSTRUCTING PROPERTIES

  function __construct($sku, $name, $price, $productType, $attribute)
  {
    $this->Sku = $sku;
    $this->Name = $name;
    $this->Price = $price;
    $this->ProductType = $productType;
    $this->Attribute = $attribute;
  }

  // SETTER

  public function setAttribute($attribute)
  {
    $this->Attribute = "Dimension: ";
    $finalStr = "";

    $listAtt = explode(',', $attribute);

    foreach ($listAtt as $att) {
      $finalStr .= trim(explode(':', $att)[1]) . "x";
    }

    $finalStr = substr_replace($finalStr, "", -2);

    $this->Attribute .= $finalStr;
  }

  // GETTER

  public function getListAttribute()
  {
    return ['height', 'length', 'width'];
  }
}
