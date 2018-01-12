<?php 
require_once("../config.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// Delete from customer_list table
	$sql_delete = "DELETE FROM CUSTOMER WHERE cust_id = '$id'";
	if (mysqli_query($conn, $sql_delete) === FALSE) {
		echo "Deleting from customer list error<br>";
	}
	echo "<h1>Please wait, Deleting.....</h1>";
	header( "refresh:1;url=../customer_list?page=1" );
}
?>