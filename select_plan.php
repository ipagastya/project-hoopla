<?php
   session_start();
   include "config.php";
   
      if(isset($_POST['plan'])){
         $plan = $_POST['plan'];
         $sql = "SELECT price
               FROM SUBSCRIPTION_TYPE
               WHERE id = $plan";
         $result = mysqli_query($conn , $sql);
	       $row = mysqli_fetch_row($result);
	       echo ".$row[0].";
      }
?>
