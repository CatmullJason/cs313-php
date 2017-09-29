<?php
$street1 = htmlspecialchars($_POST['street1']);
$street2 = htmlspecialchars($_POST['street2']);
$city = htmlspecialchars($_POST['city']);
$state = $_POST["state"];
$zip = htmlspecialchars($_POST['zip']);
?>

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



       session_name("shop");
       session_start();

       $action = (isset($_POST['action'])) ? $_POST['action'] : "";
       switch ($action) {
           case "removeitem":
               $itemid = (isset($_POST['itemid'])) ? $_POST['itemid'] : "";
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
         <div class="jumbotron">
            <h1>Confirmation</h1>
            <h3>Thank you for your order!</h3>
         </div>

         <table class="table">
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
         <div class="container-fluid" align="center" style="max-width: 300px; border-style: solid; border-radius: 10px">
            <h2>Sending Order To:</h2><br>
            <strong><?php echo $street1 . "<br>" . $street2 . "<br>" . $city . "<br>" . $state . $zip ?></strong>
         </div>
      </div>
      <script src="res/jquery-3.2.1.slim.min.js"></script>
      <script src="res/popper.min.js"></script>
      <script src="res/bootstrap.min.js"></script>
   </body>
</html>
