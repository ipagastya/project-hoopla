<?php 
	$dbname = "d5dcefcv0ln2i4";
    $password = "9b0007b4ed14c3509009142393834b9e57d10f2fdce2ca36e4d65adfd9f66134";
    $host = "ec2-23-23-244-83.compute-1.amazonaws.com";
    $user = "wrfabrrtjgdwro";

    $connection = pg_connect ("host=$host dbname=$dbname user=$user password=$password");
    if(!$connection) {
      echo 'Error connecting to database';
       }
       $querySET = "SET SEARCH_PATH TO HOOPIN";
       pg_query($connection, $querySET);
?>
	
