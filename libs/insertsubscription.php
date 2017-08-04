<?php
require("../config.php");
$customer = $_POST['customerName'];
$status = $_POST['status'];
$plan = $_POST['plan'];
$day = $plan * 28;
$toypermonth = $_POST['toypermonth'];
$date = $_POST['first-deliv'];
$date_calculation = strtotime($date."+".$day." day");
$final_date = date("Y-m-d", $date_calculation);
$sub_price = $_POST['sub-price'];
$sub_price = str_replace(",", "", $sub_price);
$sub_promo = $_POST['sub-promo'];
$sub_promo = str_replace(",", "", $sub_promo);
$deliv_price = $_POST['deliv-price'];
$deliv_price = str_replace(",", "", $deliv_price);
$deliv_promo = $_POST['deliv-promo'];
$deliv_promo = str_replace(",", "", $deliv_promo);
$deposit = $_POST['deposit'];
$deposit = str_replace(",", "", $deposit);
$pay_term = $_POST['pay-term'];
$refund_date = $_POST['refund-date'];
$deposit_status = $_POST['deposit-status'];
echo mysqli_error($conn);
$sql = "INSERT INTO SUBSCRIPTION (cust_id, status, subs_plan, num_ofToys, first_deliv, final_pickup, subs_price, subs_promo, deliv_price, deliv_promo, deposit, payment_terms, deposit_refund, deposit_status) VALUES ('$customer', '$status', '$plan', '$toypermonth', '$date', '$final_date', '$sub_price', '$sub_promo', '$deliv_price', '$deliv_promo', '$deposit', '$pay_term', '$refund_date', '$deposit_status');";
$result = mysqli_query($conn, $sql);
if($result === false){
	die("Query Fail");
	
}else{
	header( "refresh:1;url=subscription_list?page=1" );
}
?>
<h1>Please Wait, we updating the info to database......</h1>