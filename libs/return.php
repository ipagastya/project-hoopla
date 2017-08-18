<?php 
if (!isset($_GET['deliv_id'])) {
	header('Location: ../subscription_list.php?page=1');
}else{
	require_once('../config.php');
	$deliv_id = $_GET['deliv_id'];
	$subs_id = $_GET['subs_id'];
	$sql = "SELECT * FROM DELIVERY_TOYS WHERE delivery_id = '$deliv_id'";
	$result = mysqli_query($conn, $sql);
	
	$today = date("Y-m-d");

	while($row = mysqli_fetch_assoc($result)){
		$prod_code = $row['product_code'];
		$sql_inventory = "UPDATE INVENTORY SET status='Available', return_date='$today' WHERE product_code='$prod_code'";
		if (($res = mysqli_query($conn, $sql_inventory)) ===  FALSE) {
			echo "query to update inventory fail";
		}

		// insert table Inventory_card
		$sql_activity = "SELECT * FROM INVENTORY_ACTIVITY WHERE activity_name = 'Returned';";
		$row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql_activity));
		$activity_name = $row2['activity_name'];
		$activity_id = $row2['activity_id'];
		$sql_card = "INSERT INTO INVENTORY_CARD (product_code, date, activity_id, Status) VALUES ('$prod_code', '$today', '$activity_id', 'Active');";
		if (($result_activity = mysqli_query($conn, $sql_card)) ===  FALSE) {
			echo "query to insert invent_card fail";
		}

		// verifying other delivery toys those were not verified yet
		$sql_verify = "UPDATE DELIVERY_TOYS SET verification = '1' WHERE product_code = '$prod_code' AND verification='0' ORDER BY delivery_id ASC LIMIT 1";
		if (($result_activity = mysqli_query($conn, $sql_verify)) ===  FALSE) {
			echo "query to verify fail";
		}

	}
}
$sql = "UPDATE DELIVERY_LIST SET status='returned' WHERE delivery_id='$deliv_id'";
if (($res = mysqli_query($conn, $sql)) ===  FALSE) {
	echo "query to update delivery list fail";
}

header( "refresh:1;url=../subscription?page=1&subs_id=$subs_id" );
?>