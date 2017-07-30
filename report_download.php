<?php
	require('header.php');
	include "config.php";
  
	$result = mysqli_query($conn, 'SELECT * FROM INVENTORY_AVAILABLE');
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$fp = fopen('report.csv', 'w');

	foreach ($row as $val) {
	    fputcsv($fp, $val);
	}
	fclose($fp);
?>

<?php
	 require('footer.php');
?>
