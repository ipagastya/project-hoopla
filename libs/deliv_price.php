<?php
session_start();
include "../config.php";

if(isset($_POST['customer']) && isset($_POST['promo'])){
   $customer = $_POST['customer'];
   $promo = $_POST['promo'];

   $sql = "SELECT city_id
   FROM CUSTOMER
   WHERE cust_id = '$customer'";

   $result = mysqli_query($conn ,$sql);
   $row = mysqli_fetch_row($result);
   $city_id = $row[0];

   $sql = "SELECT price
   FROM SHIPPING_COST
   WHERE regional_id = '$city_id';";

   $result = mysqli_query($conn ,$sql);
   $row = mysqli_fetch_row($result);
   $price = $row[0] - $promo;
   echo number_format($price, 2);
}
?>
