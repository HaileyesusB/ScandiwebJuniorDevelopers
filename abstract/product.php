<?php

include "classes/dataBaseClass.php";

abstract class Main extends Dbh
{
    // ABSTRACT SETTERS AND GETTERS

    protected $Id, $Sku, $Name, $Price, $ProductType, $Attribute;

    abstract function setId($Id);

    abstract function setSku($Sku);

    abstract function setName($Name);

    abstract function setPrice($Price);

    abstract function setType($productType);

    abstract function setAttribute($Attribute);

    abstract function getId();

    abstract function getSku();

    abstract function getName();

    abstract function getPrice();

    abstract function getType();

    abstract function getAttribute();

    abstract function getListAttribute();
}
