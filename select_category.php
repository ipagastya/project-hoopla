<?php
include "config.php";
$arr = $_POST['category'];
$count = 0;
$sql = "SELECT * FROM INVENTORY WHERE";
foreach ($arr as &$value) {
	if ($count >= 1 ) {
		$sql = $sql." OR";
	}else{
		$count +=  1;
	}
	$sql = $sql." category_1 = '$value' OR category_2 = '$value'";
}

if(($result = mysqli_query($conn, $sql)) === FALSE){
	echo 'query fail';
}else{
	while($row = mysqli_fetch_assoc($result)){
		echo "string";
		echo "<option value='".$row['inventory_id']."' >".$row['toy_name']."</option>";
	}
}
?>