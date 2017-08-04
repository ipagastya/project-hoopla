<?php
	include "../config.php";
  
	$query = 'SELECT * FROM INVENTORY_AVAILABLE';
	$result = mysqli_query($conn, $query);                          
	if(!$result) {
		print("Couldn't execute query");
		die(mysqli_connect_error());
	}
 
	$num_fields = mysqli_num_fields($result);
	$headers = array("Product Code", "Toy Name", "Availability");
	$type = array("Type", "Inventory Availability Report");
	$date = array("Date", "".date("Y-m-d"));
	$name = "inventory_report_".date("Y-m-d");

	$fp = fopen('php://output', 'w');
	if ($fp && $result) {
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename='.$name);
	    header('Pragma: no-cache');
	    header('Expires: 0');
	    fputcsv($fp, $type);
	    fputcsv($fp, $date);
	    fputcsv($fp, array());
	    fputcsv($fp, $headers);
	    while ($row = $result->fetch_array(MYSQLI_NUM)) {
			fputcsv($fp, array_values($row));
	    }
	    die;
	}
	
?>
