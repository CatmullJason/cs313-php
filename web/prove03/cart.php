<?php
session_name("shop");
session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
   <head>
      <meta charset="UTF-8">
      <title>Cart</title>
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
      </style>
   </head>
   <body>
       <?php
       $products = array(
           array("name" => "Snowflakes", "price" => "15.00", "description" => "It's Fluffy!"),
           array("name" => "Icicle", "price" => "20.00", "description" => "Can be pointy"),
           array("name" => "Yellow Snow", "price" => "35.00", "description" => "Something not quite right about this product")
       );

       $action = (isset($_GET['action'])) ? $_GET['action'] : "";
       switch ($action) {
           case "removeitem":

               $itemid = (isset($_GET['itemid'])) ? $_GET['itemid'] : "";
               if ($itemid != "") {
                   if ($_SESSION['cart'] == "") {
                       echo "Nothing to Remove";
                   } else {
                       unset($_SESSION['cart'][$itemid]);
                       $_SESSION['cart'] = array_values($_SESSION['cart']);
                   }
               }
               break;
           case "clearcart":
               $_SESSION['cart'] = "";
               break;
       }

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
            <h1>Your Shopping Cart</h1>
            <p>Edit your cart or proceed to checkout</p>
         </div>

         <table class="table table-hover">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
                <?php
                if ($_SESSION['cart'] != '') {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $name = $value['name'];
                        $price = $value['price'];
                        $desc = $value['description'];

                        echo '<tr>';
                        echo '<td>';
                        echo $name;
                        echo '</td><td>';
                        echo $desc;
                        echo '</td><td>';
                        echo $price;
                        echo '</td><td><a href="cart.php?action=removeitem&itemid=' . $key . '" class="btn btn-danger">X</a></td>';
                    }
                }
                ?>
            </tbody>
            <tfoot>
               <tr>
                  <th></th>
                  <th style="text-align:right;">Total</th>
                  <th><?php echo "$" . $cart_total; ?></th>
                  <th></th>
               </tr>
            </tfoot>
         </table>

         <form method="post" action="index.php">
            <button type="submit" class="btn btn-primary">Continue Shopping</button>
         </form>
         <br>
         <form method="post" action="checkout.php">
            <button type="submit" class="btn btn-primary">Checkout</button>
         </form>
      </div>
      <script src="res/jquery-3.2.1.slim.min.js"></script>
      <script src="res/popper.min.js"></script>
      <script src="res/bootstrap.min.js"></script>
   </body>
</html>