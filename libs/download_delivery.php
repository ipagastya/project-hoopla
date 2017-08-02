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

		/*echo "<tr>
			<td>$name</td>
			<td>$address</td>
			<td>";*/
		
		//$flag = TRUE;
		while($rowSub = mysqli_fetch_row($resultSub)) {
		/*	if($flag) {
				echo $rowSub[0];
				$flag = FALSE;
			} else {
				echo ", ".$rowSub[0]."";
			}*/
			$outputsub[] = implode(", ", $rowSub);
		}
		$outputsub[] $date;
		echo "</td><td>$date</td></tr>";

		$output[] = $outputsub;
	}




	/*$query = 'SELECT * FROM INVENTORY_AVAILABLE';
	$result = mysqli_query($conn, $query);                          
	if(!$result) {
		print("Couldn't execute query");
		die(mysqli_connect_error());
	}*/
 
	$num_fields = mysqli_num_fields($result);
	$headers = array("Name", "Address", "Toys", "Delivery Date");
	/*for ($i = 0; $i < $num_fields; $i++) {
	    $headers[] = mysqli_fetch_field_direct($result, $i)->name;
	}*/
	$fp = fopen('php://output', 'w');
	if ($fp && $result) {
	    header('Content-Type: text/csv');
	    header('Content-Disposition: attachment; filename="report.csv"');
	    header('Pragma: no-cache');
	    header('Expires: 0');
	    fputcsv($fp, $headers);
	    /*while ($row = $result->fetch_array(MYSQLI_NUM)) {
			fputcsv($fp, array_values($row));
	    }*/
	    while ($output as $row) {
			fputcsv($fp, array_values($row));
	    }
	    die;
	}
	
?>
