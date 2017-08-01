<?php
include "config.php";
$age = $_POST['age'];
$cust_id = $_POST['cust_id'];
$count = 0;

//age
$sql = "SELECT * FROM INVENTORY WHERE ('$age' BETWEEN age_lower AND age_upper)";

// skill

if (isset($_POST['skill']) && $_POST['skill']) {
	$sql = $sql." AND (";
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
		elseif ($value == "imagination") {
			$sql = $sql." imagination = '1'";
		}
		elseif ($value == "practical") {
			$sql = $sql." practical = '1'";
		}
	}
	$sql = $sql.")";
}
//category
if (isset($_POST['category']) && $_POST['category']) {
	$arr = $_POST['category'];
	$sql = $sql." AND (";
	$count = 0;
	foreach ($arr as &$value) {
		if ($count >= 1 ) {
			$sql = $sql." OR";
		}else{
			$count +=  1;
		}
		$sql = $sql." category_1 = '$value' OR category_2 = '$value'";
	}
	$sql = $sql.")";
}

//customer and ascending
$sql = $sql." AND product_code NOT IN (SELECT product_code FROM TOYS_TRACKING WHERE customer_id = '$cust_id') AND status = 'available' ORDER BY toy_name ASC;";
if(($result = mysqli_query($conn, $sql)) === FALSE){
	echo 'query fail';
}else{
	while($row = mysqli_fetch_assoc($result)){
		echo "<option value='".$row['product_code']."' >".$row['toy_name']."</option>";
	}
}
?>