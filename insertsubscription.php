<?php
require_once("config.php");
$customer = $_POST['customerName'];
$status = $_POST['status'];
$plan = $_POST['plan'];
$day = $plan * 28;
$toypermonth = $_POST['toypermonth'];
$date = $_POST['first-deliv'];
$date_calculation = strtotime($date."+".$day." day");
$final_date = date("Y-m-d", $date_calculation);
$sub_price = $_POST['sub-price'];
$sub_promo = $_POST['sub-promo'];
$deliv_price = $_POST['deliv-price'];
$deliv_promo = $_POST['deliv-promo'];
$deposit = $_POST['deposit'];
$pay_term = $_POST['pay-term'];
$refund_date = $_POST['refund-date'];
$deposit_status = $_POST['deposit-status'];

$result = mysqli_query($conn, "SELECT `cust_id` FROM `CUSTOMER` WHERE `cust_name` = $customer LIMIT 1");

$row = mysql_fetch_row($result);
$read = $row[0];

mysqli_query($conn, "INSERT INTO SUBSCRIPTION (cust_id, status, subs_plan, num_ofToys, first_deliv, final_pickup, subs_price, subs_promo, deliv_price, deliv_promo, deposit, payment_terms, deposit_refund, deposit_status) VALUES ($read, $status, $plan, $toypermonth, $date, $final_date, $sub_price, $sub_promo, $deliv_price, $deliv_promo, $deposit, $pay_term, $refund_date. $deposit_status);")
?>