<?php

include "abstract/product.php";
include "classes/mainClass.php";
include "classes/diskClass.php";
include "classes/furnitureClass.php";
include "classes/bookClass.php";
include "validator.php";

// SANAZTIZING DATA

function sanatize($data)
{
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  return $data;
}

// DATA HANDLING

$errors = [];

if (isset($_POST["productType"]) && isset($_POST["Save"])) {

  $productType = sanatize($_POST["productType"]);
  $sku = sanatize($_POST['Sku']);
  $name = sanatize($_POST['Name']);
  $price = sanatize($_POST['Price']);

  $validation = new UserValidator($sku, $name, $price, $productType);
  $errors = $validation->validateForm();

  if (count($errors) <= 0) {

    $productData = null;
    $attribute = "";
    $availableProducts = ["DVD", "Furniture", "Book"];

    if (in_array($productType, $availableProducts)) {

      $productData = new $productType($sku, $name, $price, $productType, "");
      $lisAttributes = $productData->getListAttribute();

      foreach ($lisAttributes as $att) {
        $attribute .= isset($_POST[$att]) ? " " . $att . ": " . $_POST[$att] . ", " : "";
      }

      $productData->setAttribute(sanatize($attribute));

      $productData->addPost();

      header("location:index.php?status=success");
    }

    // VALIDATION

  } else {
    $error = "";
    foreach ($errors as $key => $val) {
      $error .= "&" . $key . "=" . $val;
    }

    header("location:addToDb.php?status=validated" . $error);
  }
}

// DELETING DATA

else if (isset($_POST['delete'])) {
  $productData = new ProductMain();
  $id = $_POST['ProductID'];
  $N = count($id);
  for ($i = 0; $i < $N; $i++) {
    $productData->delPost($id[$i]);
  }
  header("location:index.php?status=deleted");
}
