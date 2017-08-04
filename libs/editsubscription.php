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
$sub_promo = str_replace(",", "", $sub_promo);
$deposit = $_POST['deposit'];
$deposit = str_replace(",", "", $deposit);
$pay_term = $_POST['pay-term'];
$refund_date = $_POST['refund-date'];
$deposit_status = $_POST['deposit-status'];
$subs_id = $_GET['subs_id'];
echo mysqli_error($conn);
$sql = "UPDATE SUBSCRIPTION SET status='$status', subs_plan='$plan', num_ofToys='$toypermonth', first_deliv='$date', final_pickup='$final_date', subs_price='$sub_price', subs_promo='$sub_promo', deliv_price='$deliv_price', deliv_promo='$deliv_promo', deposit='$deposit', payment_terms='$pay_term', deposit_refund='$refund_date', deposit_status='$deposit_status' WHERE subs_id='$subs_id'";
$result = mysqli_query($conn, $sql);
if($result === false){
	die("Query Fail");
}
header( "refresh:1;url=../subscription_list?page=1" );
?>
<h1>Please Wait, we updating the info to database......</h1>