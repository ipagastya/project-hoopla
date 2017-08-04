<?php
session_start();
include "../config.php";

if(isset($_POST['week'])){
	$dayfloor = $_POST['week'] * 7;
	$dayceil = ($_POST['week'] + 1) * 7;

	$sql = "SELECT * FROM CUSTOMER_EXPIRY 
				WHERE Week = '$customer'";

	$result = mysqli_query($conn ,$sql);
	$row = mysqli_fetch_row($result);
	$city_id = $row[0];

	$sql = "SELECT price
	FROM SHIPPING_COST
	WHERE regional_id = '$city_id';";

	$result = mysqli_query($conn ,$sql);
	$row = mysqli_fetch_row($result);
	$price = $row[0] - $promo;
	if ($price < 0) {
		$price = 0;
	}
	echo number_format($price, 2);
}
?>
