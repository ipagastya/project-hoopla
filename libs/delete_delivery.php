<?php 
require_once("../config.php");
if (isset($_GET['deliv_id'])) {
	$deliv_id = $_GET['deliv_id'];

	// Delete from delivery_list table
	$sql_deliv = "DELETE FROM DELIVERY_LIST WHERE delivery_id = '$deliv_id'";
	if (mysqli_query($conn, $sql_deliv) === FALSE) {
		echo "Deleting from delivery list error";
	}else{
		echo "Deleting from delivery list Success";
	}

	// Delete from toys tracking
	$sql_track = "DELETE FROM YOYS_TRACKING WHERE delivery_id = '$deliv_id'";
	if (mysqli_query($conn, $sql_track)) {
		echo "Deleting from toys tracking error";
	}else{
		echo "Deleting from toys tracking success"
	}

	// Insert inventory card
	$sql_getToys = "SELECT * FROM DELIVERY_TOYS WHERE delivery_id = '$deliv_id'";
	$result_getToys = mysqli_query($conn, $sql_getToys);
	if (result === FALSE) {
		echo "Getting data from delivery toys error";
	}else{
		echo "Getting data from delivery toys success";
	}

	$today = date("Y-m-d");
	$sql = "SELECT * FROM INVENTORY_ACTIVITY WHERE activity_name = 'Returned';";
	$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	$activity_name = $row['activity_name'];
	$activity_id = $row['activity_id'];

	while ($row = mysqli_fetch_assoc($result_getToys)) {
		$product_code = $row['product_code'];
		$sql_updateCard = "INSERT INTO INVENTORY_CARD (product_code, date, activity_id, Status) VALUES ('$product_code', '$today', '$activity_id', '$activity_name')"
		if (mysqli_query($conn, $sql_updateCard) === FALSE) {
			echo "Inserting to Inventory Card Error";
		}
	}
}else{
	header( "refresh:1;url=../subscription_list?page=1" );
}


?>