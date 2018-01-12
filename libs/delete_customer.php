<?php 
require_once("../config.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// Delete from customer_list table
	$sql_delete = "DELETE FROM CUSTOMER WHERE cust_id = '$id'";
	if (mysqli_query($conn, $sql_delete) === FALSE) {
		echo "Deleting from customer list error<br>";
	}

	if ($result= mysqli_query($conn, $sql_delete)) {
	print "<script>alert('Customer has been deleted');
					window.location.href='../customer_list?page=1';
					</script>";
	}
}
?>