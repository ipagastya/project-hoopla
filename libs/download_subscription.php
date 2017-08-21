<?php
	include "../config.php";
  
	$query = "SELECT CP.*, CR.New AS NewRec, CR.Extension AS ExtRec FROM CUSTOMER_REPORT AS CP, CUSTOMER_RECURRING AS CR WHERE CR.month = CP.month AND CR.year = CP.year";
	$result = mysqli_query($conn, $query);                          
	if(!$result) {
		print("Couldn't execute query");
		die(mysqli_connect_error());
	}
 
	$num_fields = mysqli_num_fields($result);
	$headers = [];
	for ($i = 0; $i < $num_fields; $i++) {
	    $headers[] = mysqli_fetch_field_direct($result, $i)->name;
	}
	$type = array("Type", "Subscription Report");
	$date = array("Date", "".date("Y-m-d"));
	$name = "subscription_report_".date("Y-m-d");

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
