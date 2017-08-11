<?php
	include "../config.php";
  
	$datestart = '';
	$dateend = '';

	if(isset($_POST['date-start']) && $_POST['date-start']){
		$datestart = $_POST['date-start'];
	} else {
		die;
	}
	if (isset($_POST['date-end']) && $_POST['date-end']) {
		$dateend = $_POST['date-end'];
	} else {
		die;
	}

	$query = "SELECT DL.delivery_id, DL.pickup_date, C.cust_name, C.address, C.phone_home, C.phone_mobile, CI.city_name, P.province_name, DL.box_name
				FROM DELIVERY_LIST AS DL, CUSTOMER AS C, CITY AS CI, PROVINCE AS P
				WHERE DL.pickup_date >= DATE('$datestart')
					AND DL.pickup_date <= DATE('$dateend')
					AND DL.cust_id = C.cust_id 
					AND C.province_id = P.province_id 
					AND C.city_id = CI.city_id
				ORDER BY DL.pickup_date ASC";
				
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
		$home= $row[4];
		$mobile = $row[5];
		$city = $row[6];
		$province = $row[7];
		$boxname = $row[8];

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
		$outputsub[] = $city;
		$outputsub[] = $province;
		$outputsub[] = "'".$home."'";
		$outputsub[] = "'".$mobile."'";
		$outputsub[] = $boxname;
		while($rowSub = mysqli_fetch_row($resultSub)) {
			$resultArr[] = $rowSub[0];
		}
		$outputsub[] = implode (", ", $resultArr);
		$outputsub[] = $date;
		$output[] = $outputsub;
	}

	$num_fields = mysqli_num_fields($result);
	$headers = array("Name", "Address", "City", "Province", "Home Phone", "Mobile Phone", "Box Name", "Toys", "Pick Up Date");
	$type = array("Type", "Pick Up Report");
	$date = array("Date", $datestart." to ".$dateend);
	$name = "pickup_report_".$datestart."to".$dateend;

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
