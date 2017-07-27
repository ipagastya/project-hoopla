<?php
include "config.php";
$arr = $_POST['category'];
$age = $_POST['age'];
$cust_id = $_POST['cust_id'];
$count = 0;

//age
$sql = "SELECT * FROM INVENTORY WHERE ('$age' BETWEEN age_lower AND age_upper) AND (";

// skill

if (isset($_POST['skill']) && $_POST['skill']) {
	$arr_skill = $_POST['skill'];
	foreach ($arr_skill as &$value) {
		if ($count >= 1 ) {
			$sql = $sql." OR";
		}else{
			$count +=  1;
		}
		if ($value == "fine_motor") {
			$sql = $sql." fine_motor = '1'";
		}
		elseif ($value == "linguistic") {
			$sql = $sql." linguistic = '1'";
		}
		elseif ($value == "cognitive") {
			$sql = $sql." cognitive = '1'";
		}
		elseif ($value == "social_emotional") {
			$sql = $sql." social_emotional = '1'";
		}
	}
	$sql = $sql.") AND (";
}
//category
$count = 0;
foreach ($arr as &$value) {
	if ($count >= 1 ) {
		$sql = $sql." OR";
	}else{
		$count +=  1;
	}
	$sql = $sql." category_1 = '$value' OR category_2 = '$value'";
}

//customer and ascending
$sql = $sql.") AND NOT EXISTS (SELECT * FROM TOYS_TRACKING WHERE customer_id = '$cust_id') AND status = 'available' ORDER BY toy_name ASC;";
echo "<option value='".$sql."' >".$sql."</option>";
if(($result = mysqli_query($conn, $sql)) === FALSE){
	echo 'query fail';
}else{
	while($row = mysqli_fetch_assoc($result)){
		echo "<option value='".$row['product_code']."' >".$row['toy_name']."</option>";
	}
}
?>