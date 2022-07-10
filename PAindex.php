<?php
require_once "templates/header.php";
include "post.process.php";
?>

<form id="product_form" action="post.process.php" method="POST">
  <div class="row my-5">
    <div class="col-md-6 text-left">
      <h3>PRODUCT ADD</h3>
    </div>
    <div class="col-md-6 text-right">
      <a href="index.php" name="Cancel" class="btn btn-secondary">
        CANCEL
      </a>
      <button type="submit" value="insert" name="Save" class="btn btn-primary">
        SAVE
      </Button>
    </div>
  </div>
  <hr style="width:100%">
  </br>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">SKU</label>
    <div class="col-sm-3">
      <input name="Sku" type="varchar" class="form-control" id="sku">
      <span class="error"><?php echo $_GET['Sku'] ?? '' ?></span>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-3">
      <input name="Name" type="text" class="form-control" id="name">
      <span class="error"><?php echo $_GET['Name'] ?? '' ?></span>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Price ($)</label>
    <div class="col-sm-3">
      <input name="Price" type="number" class="form-control" id="price">
      <span class="error"><?php echo $_GET['Price'] ?? '' ?></span>
    </div>
  </div>
  <div class="dropdown">
    <label class="col-sm-2 col-form-label"><strong>Type Switcher</strong></label>
    <select class="dropdown-toggle" type="button" id="productType" name="productType" onchange="getCall(this.value);">
      <option value="">Select</option>
      <option value="DVD">DVD-Disc</option>
      <option value="Furniture">Furniture</option>
      <option value="Book">Book</option><br>
    </select><br><br>
    <span class="error"><?php echo $_GET['ProductType'] ?? '' ?></span>
  </div><br>
  <div id="DVD" class="controls" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Size (MB)</label>
      <div class="col-sm-2">
        <input name="Size" type="number" class="form-control" id="size"><br>
        <strong><?php echo "Please, provide size" ?></strong>
      </div>
    </div>
  </div>
  <div for="Dimensions" name="dimensions" id="Furniture" class="controls" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Height (CM)</label>
      <div class="col-sm-2">
        <input name="height" type="number" class="form-control" id="height">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Width (CM)</label>
      <div class="col-sm-2">
        <input name="width" type="number" class="form-control" id="width">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Length (CM)</label>
      <div class="col-sm-2">
        <input name="length" type="number" class="form-control" id="length"><br>
        <strong><?php echo "Please, provide dimensions" ?></strong>
      </div><br>
    </div>
  </div>
  <div id="Book" class="controls" style="display: none;">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Weight (CM)</label>
      <div class="col-sm-2">
        <input name="Weight" type="number" class="form-control" id="weight"><br>
        <strong><?php echo "Please, provide weight" ?></strong>
      </div><br>
    </div>
  </div>
</form></br>

<?php
require_once "templates/footer.php"
?>