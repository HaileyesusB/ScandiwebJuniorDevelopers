<?php
require_once "templates/header.php";
include "classes/main.php";
include "classes/productMain.php";
?>

<form id="product_form" action="post.php" method="POST">
     <div class="row my-5">
          <div class="col-md-6 text-left">
               <h1>Product List</h1>
          </div>
          <div class="col-md-6 text-right">
               <a href="addToDb.php" class="btn btn-secondary">
                    ADD
               </a>
               <button type="submit" name="delete" class="btn btn-danger">
                    MASS DELETE
               </Button>
          </div>
     </div>
     <hr style="width:100%">
     <div class="row">
          <?php
          $posts = new ProductMain();
          foreach ($posts->getAllProducts() as $post) {
               echo '<div class="col-md-3 mt-4">';
               echo '<div class="card">';
               echo '<div class="card-body">';
               echo '<input class=".delete-checkbox" type="checkbox" name="ProductID[]" value="' . $post->getId() . '" />';
               echo "<p id = 'sku' class='text-center' class='card-text'>" . $post->getSku() . "</p>";
               echo "<p id = 'name' class='text-center' class='card-text'>" . $post->getName() . "</p>";
               echo "<p id = 'price' class='text-center' class='card-text'>" . $post->getPrice() . " $</p>";
               echo "<p id = 'attribute' class='text-center' class='card-text'>" . $post->getAttribute() . "</p>";
               echo "</div>";
               echo "</div>";
               echo "</div>";
          }
          ?>
     </div><br><br>
</form>

<?php
require_once "templates/footer.php"
?>