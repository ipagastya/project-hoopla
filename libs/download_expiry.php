<?php
	include "../config.php";
  
	$query = 'SELECT * FROM CUSTOMER_EXPIRY';
	$result = mysqli_query($conn, $query);                          
	if(!$result) {
		print("Couldn't execute query");
		die(mysqli_connect_error());
	}
 
	$num_fields = mysqli_num_fields($result);
	$headers = array("Customer Name", "Expiry Date", "Subscription Status");
	$type = array("Type", "Upcoming Expiry Report");
	$date = array("Date", "".date("Y-m-d"));
	$name = "expiry_report_".date("Y-m-d");

	$fp = fopen('php://output', 'w');
	if ($fp && $result) {
	    header('Content-Type: text/csv');
	    header('Content-Disposition: attachment; filename='.$name.'.csv');
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
