<?php
	include "../config.php";
  
	$query = "SELECT DL.delivery_id, DL.delivery_date, C.cust_name, C.address
			FROM DELIVERY_LIST AS DL, CUSTOMER AS C
			WHERE YEARWEEK(NOW()) = YEARWEEK(DL.delivery_date)
				AND DL.cust_id = C.cust_id
			ORDER BY DL.delivery_date ASC";
				
	$result = mysqli_query($conn, $query);                          

	if(!$result) {
	    print("Couldn't execute delivery report 1 query");
	    die(mysqli_connect_error());
	}

	$output = [];

	while($row = mysqli_fetch_row($result)) {
		$outputsub = [];
		$deliveryid = $row[0];
		$date = $row[1];
		$name = $row[2];
		$address = $row[3];
		$resultArr = [];
		
		$querySub = "SELECT I.toy_name
				FROM DELIVERY_TOYS AS DT, INVENTORY AS I
				WHERE DT.delivery_id = '$deliveryid'
					AND DT.product_code = I.product_code";
		
		$resultSub = mysqli_query($conn, $querySub);
		
		if(!$resultSub) {
		    print("Couldn't execute delivery report 2 query");
		    die(mysqli_connect_error());
		}
		
		$outputsub[] = $name;
		$outputsub[] = $address;
		while($rowSub = mysqli_fetch_row($resultSub)) {
			$resultArr[] = $rowSub[0];
		}
		$outputsub[] = implode (", ", $resultArr);
		$outputsub[] = $date;
		$output[] = $outputsub;
	}

	$num_fields = mysqli_num_fields($result);
	$headers = array("Name", "Address", "Toys", "Delivery Date");
	$type = array("Type", "Delivery Report");
	$date = array("Date", "".date("Y-m-d"));
	$name = "delivery_report_".date("Y-m-d");

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
	    foreach ($output as $row) {
			fputcsv($fp, array_values($row));
	    }
	    die;
	}
	
?>
