<?php 
require_once("../config.php");
if (isset($_GET['deliv_id'])) {
	$deliv_id = $_GET['deliv_id'];

	// Getting data delivery toys
	$sql_getToys = "SELECT * FROM DELIVERY_TOYS WHERE delivery_id = '$deliv_id'";
	echo $sql_getToys."<br>";
	$result_getToys = mysqli_query($conn, $sql_getToys);
	if ($result_getToys === FALSE) {
		echo "Getting data from delivery toys error<br>";
	}else{
		echo "Getting data from delivery toys success<br>";
	}

	// Insert inventory card
	$today = date("Y-m-d");
	$sql = "SELECT * FROM INVENTORY_ACTIVITY WHERE activity_name = 'Returned';";
	echo $sql."<br>";
	$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	$activity_name = $row['activity_name'];
	$activity_id = $row['activity_id'];

	while ($row = mysqli_fetch_assoc($result_getToys)) {
		$product_code = $row['product_code'];
		$sql_updateCard = "INSERT INTO INVENTORY_CARD (product_code, date, activity_id, Status) VALUES ('$product_code', '$today', '$activity_id', '$activity_name')";
		echo $sql_updateCard."<br>";
		if (mysqli_query($conn, $sql_updateCard) === FALSE) {
			echo "Inserting to Inventory Card Error<br>";
		}
		if($row['verification'] == 1){
			$product_code = $row['product_code'];
			$sql_updateInventory = "UPDATE INVENTORY SET status='Available', last_modified=now() WHERE product_code='$product_code'";
			if(mysqli_query($conn, $sql_updateInventory) === FALSE){
				echo "Update Inventory Error<br>";
			}
		}
		else{
			echo "kok gitu";
		}
	}

	// Delete from delivery_list table
	$sql_deliv = "DELETE FROM DELIVERY_LIST WHERE delivery_id = '$deliv_id'";
	if (mysqli_query($conn, $sql_deliv) === FALSE) {
		echo "Deleting from delivery list error<br>";
	}else{
		echo "Deleting from delivery list Success<br>";
	}

	// Delete from toys tracking
	$sql_track = "DELETE FROM TOYS_TRACKING WHERE delivery_id = '$deliv_id'";
	if (mysqli_query($conn, $sql_track) === FALSE) {
		echo "Deleting from toys tracking error<br>";
	}else{
		echo "Deleting from toys tracking success<br>";
	}

	
	// delete delivery toys
	$sql_deleteDelivToys = "DELETE FROM DELIVERY_TOYS WHERE delivery_id = '$deliv_id'";
	if (mysqli_query($conn, $sql_deleteDelivToys) === FALSE) {
		echo "Delete from delivery toys error<br>";
	}
	$subs_id = $_GET['subs_id'];
	header( "Location=../subscription?page=1&subs_id=$subs_id" );
}else{
	header( "Location=../subscription_list?page=1" );
}


?>