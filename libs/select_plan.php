<?php
session_start();
include "../config.php";

if(isset($_POST['plan']) && isset($_POST['promo'])){
   $plan = $_POST['plan'];
   $promo = $_POST['promo'];

   $sql = "SELECT price
   FROM SUBSCRIPTION_TYPE
   WHERE month = $plan";

   $result = mysqli_query($conn ,$sql);
   $row = mysqli_fetch_row($result);
   $price = $row[0] - $promo;
   echo number_format("$price", 2);
}
?>
