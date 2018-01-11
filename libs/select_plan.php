<?php
session_start();

if(isset($_POST['plan']) && isset($_POST['promo'])){
   include "../config.php";
   $plan = $_POST['plan'];
   $promo = $_POST['promo'];
   $deliv = $_POST['deliv'];
   $deliv_promo = $_POST['delivPromo'];
   $sql = "SELECT price
   FROM SUBSCRIPTION_TYPE
   WHERE month = $plan";

   $result = mysqli_query($conn ,$sql);
   $row = mysqli_fetch_row($result);
   $price = $row[0];
   
   $deliv = $deliv - $deliv_promo;
   $total = ($price + $deliv * 2)* $plan - $promo;
   $monthly = $price + $deliv * 2;
   $response = array('price' => number_format("$price", 2), "total" => number_format("$total", 2), "monthly" => number_format("$monthly", 2), 'deliv_promo' => number_format("$deliv_promo", 2));
   echo json_encode($response);
}

if (isset($_POST['subPrice'])) {
   $plan = $_POST['time'];
   $price = $_POST['subPrice'];
   $promo = $_POST['promo'];
   $deliv = $_POST['deliv'];
   $deliv_promo = $_POST['delivPromo'];

   $deliv = $deliv - $deliv_promo;
   $total = ($price + $deliv * 2)* $plan - $promo;
   $monthly = $price + $deliv * 2;
   $response = array('price' => number_format("$price", 2), "total" => number_format("$total", 2), "monthly" => number_format("$monthly", 2), 'deliv_promo' => number_format("$deliv_promo", 2));
   echo json_encode($response);
}
?>
