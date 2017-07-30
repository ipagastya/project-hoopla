<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	require('header.php');
	include "config.php";
	
	$query = "SELECT * FROM CUSTOMER";
	$result = $db->query($query);
	if (!$result) die('Couldn\'t fetch records');
	$headers = $result->fetch_fields();
	foreach($headers as $header) {
	    $head[] = $header->name;
	}
	$fp = fopen('php://output', 'w');

	if ($fp && $result) {
	    header('Content-Type: text/csv');
	    header('Content-Disposition: attachment; filename="export.csv"');
	    header('Pragma: no-cache');
	    header('Expires: 0');
	    fputcsv($fp, array_values($head)); 
	    while ($row = $result->fetch_array(MYSQLI_NUM)) {
		fputcsv($fp, array_values($row));
	    }
	}
?>

<?php
	 require('footer.php');
	 die;
?>
