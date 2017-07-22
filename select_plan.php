<?php
   session_start();
   include "config.php";
   
      if(isset($_POST['plan']) && isset($_POST['promo'])){
         $plan = $_POST['plan'];
	 $promo = $_POST['promo'];
         $sql = "SELECT price
               FROM SUBSCRIPTION_TYPE
               WHERE id = $plan";
         $result = mysqli_query($conn , $sql);
	       $row = mysqli_fetch_row($result);
	       //echo "Rp $row[0]";
	      echo "Rp $promo";
      }
?>
