<?php
//naming and starting a session
session_name("shop");
session_start();
?>

<!DOCTYPE html>
<!--Some of the JavaScript functionality for the page was researched from this a 
    post on StackOverflow. Credit goes to Kodlee Yin.
    https://stackoverflow.com/questions/8597556/simple-php-shopping-cart-without-sql -->

<html>
   <head>
      <meta charset="UTF-8">
      <title>Browse</title>
      <link rel="stylesheet" href="res/bootstrap.min.css">
      <style>
         .card-deck{
             padding-top: 45px;
             padding-bottom: 45px;
         }
         .card-block{
             padding: 15px;
         }
         .card-title{
             padding-top: 15px;
         }
         .btn{
             padding-right:15px;
         }
      </style>
   </head>
   <body>
       <?php
       //an array to identify our products
       $products = array(
           array("name" => "Snowflakes", "price" => "15.00", "description" => "It's Fluffy!"),
           array("name" => "Icicle", "price" => "20.00", "description" => "Can be pointy"),
           array("name" => "Yellow Snow", "price" => "35.00", "description" => "Something not quite right about this product")
       );

       //determine that an action button has been pressed and is set.
       $action = (isset($_POST['action'])) ? $_POST['action'] : "";

       //determine which button has been pressed and assign our products array 
       //to session variable
       switch ($action) {
           case "additem":

               //make sure item has id
               $itemid = (isset($_POST['itemid'])) ? $_POST['itemid'] : "";
               if ($itemid != "") {
                   if ($_SESSION['cart'] == "") {
                       $_SESSION['cart'] = array($products[$itemid]);
                   } else {
                       array_push($_SESSION['cart'], $products[$itemid]);
                   }
               }
               break;
           case "clearcart":
               $_SESSION['cart'] = "";
               break;
       }

       //start the cart's total at 0 (no items selected yet)
       $cart_total = 0;
       if ($_SESSION['cart'] != '') {
           foreach ($_SESSION['cart'] as $key => $value) {
               $cart_total = $cart_total + $value['price'];
               $name = $value['name'];
               $price = $value['price'];
               $desc = $value['description'];
           }
       }
       ?>


      <div class="container" style="padding-top: 15px">
         <div style="float:right; padding:15px;">
            <strong><?php echo "Cart total: $" . $cart_total; ?></strong>
         </div>
         <div class="jumbotron">
            <h1>Welcome!</h1>
            <p>Jason's Snow And Ice Store</p>
         </div>
         <div class="card-deck">
            <div class="card">
               <img class="card-img-top" src="img/snowfalling.jpg" style="height:180px;" alt="Card image cap">
               <div class="card-block">
                  <form method="post" action="index.php">
                     <input name="action" value="additem" style="display: none;">
                     <input name="itemid" value="0" style="display: none;">
                     <button type="submit" class="btn btn-primary">Add to Cart</button>
                  </form>
                  <h4 class="card-title">Snowflakes   $15.00</h4>
                  <p class="card-text">Some of the softest, ornate snow you'll find south of Saskatchewan.</p>
               </div>
            </div>
            <div class="card">
               <img class="card-img-top" src="img/icicle.jpg" style="height:180px;" alt="Card image cap">
               <div class="card-block">
                  <form method="post" action="index.php">
                     <input name="action" value="additem" style="display: none;">
                     <input name="itemid" value="1" style="display: none;">
                     <button type="submit" class="btn btn-primary">Add to Cart</button>
                  </form>
                  <h4 class="card-title">Icicles   $20.00</h4>
                  <p class="card-text">Enjoy a different form of our speciality frozen water. Nothing but premium ice here.</p>
               </div>
            </div>
            <div class="card">
               <img class="card-img-top" src="img/yellowsnow.jpg" style="height:180px;" alt="Card image cap">
               <div class="card-block">
                  <form method="post" action="index.php">
                     <input name="action" value="additem" style="display: none;">
                     <input name="itemid" value="2" style="display: none;">
                     <button type="submit" class="btn btn-primary">Add to Cart</button>
                  </form>
                  <h4 class="card-title">Yellow Snow   $35.00</h4>
                  <p class="card-text">We'll let your imagination run wild with this custom made snow.</p>
               </div>
            </div>
         </div>
         <form method="post" action="index.php">
            <input name="action" value="clearcart" style="display: none;">
            <button type="submit" class="btn btn-danger">Clear Cart</button>
         </form>
         <br>
         <form method="post" action="cart.php" class="form-inline">
            <button type="submit" class="btn btn-primary">View Cart</button>
         </form>
      </div>
      <script src="res/jquery-3.2.1.slim.min.js"></script>
      <script src="res/popper.min.js"></script>
      <script src="res/bootstrap.min.js"></script>
   </body>
</html>