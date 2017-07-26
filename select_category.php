<?php
include "config.php";
$arr = $_POST['category'];
$age = $_POST['age'];
$count = 0;
$sql = "SELECT * FROM INVENTORY WHERE ($age BETWEEN age_lower AND age_upper) AND (";
foreach ($arr as &$value) {
	if ($count >= 1 ) {
		$sql = $sql." OR";
	}else{
		$count +=  1;
	}
	$sql = $sql." category_1 = '$value' OR category_2 = '$value'";
}
$sql = $sql.") ORDER BY toy_name ASC;";
if(($result = mysqli_query($conn, $sql)) === FALSE){
	echo 'query fail';
}else{
	while($row = mysqli_fetch_assoc($result)){
		echo "<option value='".$row['inventory_id']."' >".$row['toy_name']."</option>";
	}
}
?>