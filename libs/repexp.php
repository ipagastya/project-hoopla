<?php
session_start();
include "../config.php";

if(isset($_POST['week'])){
	$week = $_POST['week'];

	$sql = "SELECT * FROM CUSTOMER_EXPIRY WHERE Week = '$week'";

    $result = mysqli_query($conn , $sql);

	while($row = mysqli_fetch_row($result)){
		echo "	<tr>
					<td>".$row[0]."</td>
					<td>".$row[1]."</td>
					<td>".$row[2]."</td>
					<td>".$row[3]."</td>
					<td>".$row[4]."</td>
				</tr>";
	}
}
?>
