<?php

class ProductMain extends Main
{
    // SETTERS 

    public function setId($id)
    {
        $this->Id = $id;
    }

    public function setSku($Sku)
    {
        $this->Sku = $Sku;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    public function setType($productType)
    {
        $this->productType = $productType;
    }

    public function setAttribute($attribute)
    {
        $this->Attribute = $attribute;
    }

    // GETTERS

    public function getId()
    {
        return $this->Id;
    }

    public function getSku()
    {
        return $this->Sku;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function getType()
    {
        return $this->productType;
    }

    public function getAttribute()
    {
        return $this->Attribute;
    }

    public function getListAttribute()
    {
    }

    // **** CRUD OPERATIONS ****

    public function addPost()
    {
        $sql = "INSERT INTO products(Sku, Name, Price, ProductType, Attribute) VALUES ('" . $this->Sku . "','" . $this->Name . "','" . $this->Price . "','" . $this->ProductType . "','" . $this->Attribute . "')";
        echo "Inserted";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    // GET FUNCTION

    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $productList = [];
        $count = 0;

        while ($result = $stmt->fetch()) {
            $product = new ProductMain();
            $product->setId($result['id']);
            $product->setSku($result['Sku']);
            $product->setName($result['Name']);
            $product->setPrice($result['Price']);
            $product->setAttribute($result['Attribute']);
            $productList[$count] = $product;
            $count += 1;
        };

        return $productList;
    }

    // DELETE FUNCTION

    public function delPost($id)
    {
        $sql = "DELETE FROM products WHERE id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
