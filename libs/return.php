<?php 
if (!isset($_GET['deliv_id'])) {
	header('Location: susbscription_list');
}else{
	require_once('../config.php');
	$deliv_id = $_GET['deliv_id'];
	$subs_id = $_GET['subs_id'];
	$sql = "SELECT * FROM DELIVERY_TOYS WHERE delivery_id = '$deliv_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$prod_code = $row['product_code'];

	while($row){
		$sql_inventory = "UPDATE INVENTORY SET status='Available' WHERE product_code='$prod_code'";
		if (($res = mysqli_query($conn, $sql_inventory)) ===  FALSE) {
			echo "query to update inventory fail";
		}
	}
	header( "refresh:1;url=../subscription?page=1&subs_id=$subs_id" );
}
?>