<?php
   session_start();
   include "config.php";
   
      if(isset($_POST['province'])){
         $province = $_POST['province'];

         $sql = "SELECT C.city_id, C.city_name
               FROM CITY AS C
               WHERE C.province_id = $province";

         $result = mysqli_query($conn , $sql);

      	echo "<option value=''>Changed</option>";
	      while($row = mysqli_fetch_row($result)){
	         echo "<option value='".$row[0]."' >".$row[1]."</option>";
	      }
      }
?>
