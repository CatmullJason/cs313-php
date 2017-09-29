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
      <div class="container" style="padding-top: 15px">
         <div class="jumbotron">
            <h1>Checkout</h1>
            <p>Please fill in all fields</p>
         </div>

         <form method="post" action="confirmation.php">
            <div class="form-group"> <!-- Street 1 -->
               <label for="street1_id" class="control-label">Street Address 1</label>
               <input type="text" class="form-control" id="street1_id" name="street1" placeholder="Street address, P.O. box" required="true">
            </div>					

            <div class="form-group"> <!-- Street 2 -->
               <label for="street2_id" class="control-label">Street Address 2</label>
               <input type="text" class="form-control" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
            </div>	

            <div class="form-group"> <!-- City-->
               <label for="city_id" class="control-label">City</label>
               <input type="text" class="form-control" id="city_id" name="city" placeholder="Boise" required="true">
            </div>									

            <div class="form-group"> <!-- State Button -->
               <label for="state_id" class="control-label">State</label>
               <select class="form-control" id="state_id" required="true" name="state">
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District Of Columbia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
               </select>					
            </div>

            <div class="form-group"> <!-- Zip Code-->
               <label for="zip_id" class="control-label">Zip Code</label>
               <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####" required="true">
            </div>		
            <button type="submit" class="btn btn-primary">Confirm Purchase</button>
         </form>
         <br>
         <form method="post" action="cart.php">
            <input name="action" value="clearcart" style="display: none;">
            <button type="submit" class="btn btn-danger">Go Back to Cart</button>
         </form>
      </div>
      <script src="res/jquery-3.2.1.slim.min.js"></script>
      <script src="res/popper.min.js"></script>
      <script src="res/bootstrap.min.js"></script>
   </body>
</html>
