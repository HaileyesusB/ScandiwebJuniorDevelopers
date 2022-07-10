<?php

class Book extends ProductMain
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
        $addStr = " KG";
        $removeStr = rtrim($attribute, ",");
        $this->Attribute = $removeStr;
        $this->Attribute .= $addStr;
    }

    // GETTER

    public function getListAttribute()
    {
        return ['Weight'];
    }
}
