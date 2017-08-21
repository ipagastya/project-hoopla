<?php 
require_once("../config.php");
if (isset($_GET['deliv_id'])) {
	$deliv_id = $_GET['deliv_id'];
	
	// Getting data delivery toys
	$sql_getToys = "SELECT * FROM DELIVERY_TOYS WHERE delivery_id = '$deliv_id'";
	$result_getToys = mysqli_query($conn, $sql_getToys);
	if ($result_getToys === FALSE) {
		echo "Getting data from delivery toys error<br>";
	}

	// Insert inventory card
	$today = date("Y-m-d");
	$sql = "SELECT * FROM INVENTORY_ACTIVITY WHERE activity_name = 'Returned';";
	$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	$activity_name = $row['activity_name'];
	$activity_id = $row['activity_id'];

	if(isset($_SESSION['adminID'])){
		$adminID = $_SESSION['adminID'];
	}
	else{
		$adminID = 1;
	}
	while ($row = mysqli_fetch_assoc($result_getToys)) {
		$product_code = $row['product_code'];
		$sql_updateCard = "INSERT INTO INVENTORY_CARD (product_code, date, activity_id, Status) VALUES ('$product_code', '$today', '$activity_id', '$activity_name')";
		if (mysqli_query($conn, $sql_updateCard) === FALSE) {
			echo "Inserting to Inventory Card Error<br>";
		}
		if($row['verification'] == 1){
			$product_code = $row['product_code'];
			$sql_updateInventory = "UPDATE INVENTORY SET status='Available', last_modified=now(), modified_by='$adminID' WHERE product_code='$product_code'";
			if(mysqli_query($conn, $sql_updateInventory) === FALSE){
				echo "Update Inventory Error<br>";
			}
		}
		
	}

	// Delete from delivery_list table
	$sql_deliv = "DELETE FROM DELIVERY_LIST WHERE delivery_id = '$deliv_id'";
	if (mysqli_query($conn, $sql_deliv) === FALSE) {
		echo "Deleting from delivery list error<br>";
	}

	// Delete from toys tracking
	$sql_track = "DELETE FROM TOYS_TRACKING WHERE delivery_id = '$deliv_id'";
	if (mysqli_query($conn, $sql_track) === FALSE) {
		echo "Deleting from toys tracking error<br>";
	}

	
	// delete delivery toys
	$sql_deleteDelivToys = "DELETE FROM DELIVERY_TOYS WHERE delivery_id = '$deliv_id'";
	if (mysqli_query($conn, $sql_deleteDelivToys) === FALSE) {
		echo "Delete from delivery toys error<br>";
	}
	$subs_id = $_GET['subs_id'];
	echo "<h1>Please wait, Deleting.....</h1>";
	header( "refresh:1;url=../subscription?page=1&subs_id=$subs_id" );
}else{
	header( "refresh:1;url=../subscription_list?page=1" );
}


?>