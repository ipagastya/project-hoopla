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
$actual_pickup_charge = $_POST['pick-charge'];
$payment_note = $_POST['pay-note'];
$note = $_POST['note'];
$baby_age = $_POST['age'];
$box_name = $_POST['box-name'];
$sql_deliv = "INSERT INTO DELIVERY_LIST (cust_id, address, city_id, province_id, mobile_phone, home_phone, delivery_date, pickup_date, actual_delivery_charge, actual_pickup_charge, payment_note, note	baby_age, box_name
) VALUES ('$cust_id', '$address', '$city_id', '$province_id', '$mobile_phone', '$home_phone', '$delivery_date', '$pickup_date', '$actual_delivery_charge', '$actual_pickup_charge', '$payment_note', '$note', '$baby_age', '$box_name');";
echo $sql_deliv."<br>";

$arr = $_POST['select-toy'];

//insert table Invent_card
$today = date("Y-m-d");
$sql = "SELECT * FROM INVENTORY_ACTIVITY WHERE activity_name = 'Rented';";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$activity_name = $row['activity_name'];
$activity_id = $row['activity_id'];
foreach ($arr as &$value) {
	$sql_card = "INSERT INTO INVENTORY_CARD (date, activity_id, Status, note) VALUES ('$today', '$activity_id', '$activity_name');";
	echo $sql_card."<br>";
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
	echo $sql_deliv_toy."<br>";
}

//insert table toys_tracking
foreach ($arr as &$value) {
	$sql_track = "INSERT INTO TOYS_TRACKING (cust_id, city_id) VALUES ('$cust_id', '$value');";
	echo $sql_track."<br>";
}

// update table inventory
foreach ($arr as &$value) {
	$sql_inventory = "UPDATE INVENTORY SET status='Rented' WHERE product_code='$value';";
	echo $sql_inventory."<br>";
}
?>