<?php
include "config.php";
$age = $_POST['age'];
$cust_id = $_POST['cust_id'];
$count = 0;

if(isset($_POST['date']) && $_POST['date']){
$table = "DELIVERY_LIST AS DL RIGHT OUTER JOIN DELIVERY_TOYS AS DT ON DT.delivery_id = DL.delivery_id RIGHT OUTER JOIN INVENTORY AS I ON I.product_code = DT.product_code";
$date = $_POST['date'];
$before_date = strtotime('-2 day', strtotime($date));
$before_date = date('Y-m-d', $before_date);
$tambahanDate = "OR (DL.pickup_date <= '$before_date')";
}else{
$table = "INVENTORY AS I";
$tambahanDate = "";
}
//age
$sql = "SELECT * FROM $table WHERE ('$age' BETWEEN age_lower AND age_upper)";

// skill
if (isset($_POST['location'])) {
	$location = $_POST['location'];
}else{
	$location = "jabodetabek";
}


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
$sql = $sql." AND toy_name NOT IN (SELECT toy_name FROM TOYS_TRACKING AS T JOIN INVENTORY AS J ON T.product_code = J.product_code WHERE customer_id = '$cust_id') AND (I.status = 'available' $tambahanDate) AND location = '$location' GROUP BY toy_name ORDER BY I.status ASC, toy_name ASC;";

if(($result = mysqli_query($conn, $sql)) === FALSE){
	echo 'query fail';
}else{
	while($row = mysqli_fetch_assoc($result)){
		$text = "";
		if($row['status'] != 'Available'){
			$text = "data-subtext='(Not Returned Yet)' ";
		} 
		echo "<option value='".$row['product_code']."' $text.>".$row['toy_name']."</option>";
	}
}

?>