<?php
	include "../config.php";
  
	$query = 'SELECT * FROM INVENTORY_AVAILABLE';
	$result = mysqli_query($conn, $query);                          
	if(!$result) {
		print("Couldn't execute query");
		die(mysqli_connect_error());
	}
 
	$num_fields = mysqli_num_fields($result);
	$headers = array();
	for ($i = 0; $i < $num_fields; $i++) {
	    $headers[] = mysqli_fetch_field_direct($result, $i)->name;
	}
	$fp = fopen('php://output', 'w');
	if ($fp && $result) {
	    header('Content-Type: text/csv');
	    header('Content-Disposition: attachment; filename="report.csv"');
	    header('Pragma: no-cache');
	    header('Expires: 0');
	    fputcsv($fp, $headers);
	    while ($row = $result->fetch_array(MYSQLI_NUM)) {
			fputcsv($fp, array_values($row));
	    }
	    die;
	}
	
?>
