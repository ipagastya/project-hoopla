<?php
require("config.php");

//insert table delivery_list
$cust_id = $_GET['cust_id'];
$address = $_POST['address'];
$city_id = $_POST['cityID'];
$province_id = $_POST['provinceID'];
$mobile_phone = $_POST['mobile'];
$home_phone = $_POST['home'];
$delivery_date = $_POST['deliv-date'];
$pickup_date = $_POST['pick-date'];
$actual_delivery_charge = $_POST['deliv-charge'];
$actual_delivery_charge = str_replace(",", "", $actual_delivery_charge);
$actual_pickup_charge = $_POST['pick-charge'];
$actual_pickup_charge = str_replace(",", "", $actual_pickup_charge);
$payment_note = $_POST['pay-note'];
$note = $_POST['note'];
$baby_age = $_POST['age'];
$box_name = $_POST['box-name'];
$sql_deliv = "INSERT INTO DELIVERY_LIST (cust_id, address, city_id, province_id, mobile_phone, home_phone, delivery_date, pickup_date, actual_delivery_charge, actual_pickup_charge, payment_note, note, baby_age, box_name
) VALUES ('$cust_id', '$address', '$city_id', '$province_id', '$mobile_phone', '$home_phone', '$delivery_date', '$pickup_date', '$actual_delivery_charge', '$actual_pickup_charge', '$payment_note', '$note', '$baby_age', '$box_name');";
if (($result = mysqli_query($conn, $sql_deliv)) ===  FALSE) {
	echo "query to insert delivery fail";
}


$arr = $_POST['select-toy'];

//insert table Invent_card
$today = date("Y-m-d");
$sql = "SELECT * FROM INVENTORY_ACTIVITY WHERE activity_name = 'Rented';";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$activity_name = $row['activity_name'];
$activity_id = $row['activity_id'];
foreach ($arr as &$value) {
	$sql_card = "INSERT INTO INVENTORY_CARD (product_code, date, activity_id, Status) VALUES ('$value', '$today', '$activity_id', '$activity_name');";
	if (($result = mysqli_query($conn, $sql_card)) ===  FALSE) {
		echo "query to insert invent_card fail";
	}
}

//insert table delivery_toys
$sql = "SELECT delivery_id FROM DELIVERY_LIST ORDER BY delivery_id DESC";
if (mysqli_num_rows(mysqli_query($conn, $sql)) == 0) {
	$id = 'no delivery yet, please confirm your data';
}else{
	$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	$id = $result['delivery_id'];
}
foreach ($arr as &$value) {
	$sql_deliv_toy = "INSERT INTO DELIVERY_TOYS (delivery_id, product_code) VALUES ('$id', '$value');";
	if (($result = mysqli_query($conn, $sql_deliv_toy)) ===  FALSE) {
		echo "query to insert delivery toy fail";
	}
}

//insert table toys_tracking
foreach ($arr as &$value) {
	$sql_track = "INSERT INTO TOYS_TRACKING (customer_id, product_code) VALUES ('$cust_id', '$value');";
	if (($result = mysqli_query($conn, $sql_track)) ===  FALSE) {
		echo "query to insert tracking fail";
	}
}

// update table inventory
foreach ($arr as &$value) {
	$sql_inventory = "UPDATE INVENTORY SET status='Rented' WHERE product_code='$value';";
	if (($result = mysqli_query($conn, $sql_inventory)) ===  FALSE) {
		echo "query to update inventory fail";
	}
}
header( "refresh:1;url=subscription_list.php" );
?>
<h1>Please Wait, we updating the info to database......</h1>