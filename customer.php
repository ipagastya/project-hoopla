<?php 
	require('header.php');
?>
<div class="jumbotron create">
	<br><br>
	<center><h2 class="leckerli">Create Customer</h2></center>
</div>
<div class="container">
		<form class="form-horizontal" method="post" action="./customer.php">
			<div class="form-group">
				<label class="control-label col-sm-2" for="customerID">Customer's Name :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="customerID" name="customerID" placeholder="Customer's Name" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="babyID">Baby's Name :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="babyID" name="babyID" placeholder="Baby's Name" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="dobID">Baby's Date of Birth :</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="dobID" name="dobID" placeholder="YYYY-MM-DD" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="numberID">Home Number / Mobile Number (WA) :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="homeNumberID" name="homeNumberID" placeholder="Home Number" required>
				</div>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="mobileNumberID" name="mobileNumberID" placeholder="Mobile Number" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="lineID">Line ID :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="lineID" name="lineID" placeholder="Line ID">
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email :</label>
				<div class="col-sm-5">
					<input type="email" class="form-control" id="emailID" name="emailID" placeholder="Email" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="address">Address :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="addressID" name="addressID" placeholder="Address" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="province">Province :</label>
				<div class="col-sm-5">	
					<select class="form-control selectpicker show-tick" data-live-search="true" id="provinceID" name="provinceID" required>
						<option value='' >Select Province</option>
						<?php
                            	include "config.php";
					            $query = "SELECT * FROM PROVINCE WHERE province_name LIKE '%DKI JAKARTA%'";
						        $result = mysqli_query($conn, $query);
						        $row = mysqli_fetch_row($result);
					            echo "<option value='".$row[0]."' >".$row[1]."</option>";
				            
					            $query2 = "SELECT * FROM PROVINCE WHERE province_name LIKE '%JAWA BARAT%'";
						        $result2 = mysqli_query($conn, $query2);
						        $row = mysqli_fetch_row($result2);
					            echo "<option value='".$row[0]."' >".$row[1]."</option>";
								
								$query3 = "SELECT * FROM PROVINCE WHERE province_name LIKE '%BANTEN%'";
						        $result3 = mysqli_query($conn, $query3);
						        $row = mysqli_fetch_row($result3);
					            echo "<option value='".$row[0]."' >".$row[1]."</option>";
								
								$query4 = "SELECT * FROM PROVINCE WHERE province_name LIKE '%BALI%'";
						        $result4 = mysqli_query($conn, $query4);
						        $row = mysqli_fetch_row($result4);
					            echo "<option value='".$row[0]."' >".$row[1]."</option>";
								
								$query5 = "SELECT * FROM PROVINCE WHERE province_name !='DKI JAKARTA' && province_name != 'JAWA BARAT' &&
											province_name != 'BANTEN' && province_name != 'BALI' ORDER BY province_name ASC";
						        $result5 = mysqli_query($conn, $query5);
						        while($row = mysqli_fetch_row($result5)){
					                echo
					                "<option value='".$row[0]."' >".$row[1]."</option>" ;
					            }
				            ?>
					</select>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="city">City :</label>
				<div class="col-sm-5">	
					<select class="form-control selectpicker show-tick" data-live-search="true" id="cityID" name="cityID" required>
						<option value=''>Select City</option>
					</select>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="zip">ZIP :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="zipID" name="zipID" placeholder="ZIP Code" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="favorite">Favorite/Least Favorite Toys :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="favoriteID" name="favoriteID" placeholder="Favorite" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="milestone">Milestones to be developed :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="milestoneID" name="milestoneID" placeholder="Milestones" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<button name="submit" class="addbutton" type="submit"><span class="
					glyphicon glyphicon-ok"></span> Submit</button>
				</div>	
				<div class="col-sm-4"></div>
			</div>
		</form>
	</div>
        <?php
        include "config.php"; 
			
        if(isset($_POST["submit"]))
		{
        		$customerID = $_POST["customerID"];
        		$babyID = $_POST["babyID"];
        		$dobID = $_POST["dobID"];
				$homeNumberID = $_POST["homeNumberID"];
				$mobileNumberID = $_POST["mobileNumberID"];
				$lineID = $_POST["lineID"];
				$emailID = $_POST["emailID"];
				$addressID = $_POST["addressID"];
				$cityID = $_POST["cityID"];
				$provinceID = $_POST["provinceID"];
				$zipID = $_POST["zipID"];
				$favoriteID = $_POST["favoriteID"];
				$milestoneID = $_POST["milestoneID"];

               	$query = "INSERT INTO CUSTOMER(cust_name,baby_name,baby_dob,phone_home,phone_mobile,line_id,email,address,city_id,province_id,zip_code,favorite_toys,milestones) 
						VALUES('$customerID','$babyID','$dobID','$homeNumberID','$mobileNumberID','$lineID','$emailID','$addressID','$cityID','$provinceID','$zipID','$favoriteID','$milestoneID')";
						
               	if($result = mysqli_query($conn, $query)){
					print "<script>alert('Customer Telah Berhasil Didaftarkan');
					window.location.href='customer_list?page=1';
					</script>";
               	}
				else{
					print "<script>alert('error');</script>";
				}
        }
        ?>
		<script src="libs/jquery/dist/jquery.min.js"></script>
								<script>
									 $("#provinceID").change(function(){
									    	$("#cityID").empty();
									    	var currentProvince = $(this).find(':selected').val();
									    	$.ajax({
												type: "POST",
												url: "select_city.php",
												data: {province: currentProvince},
												success: function(response){
													$("#cityID").html(response).selectpicker('refresh');
												}
											});
									    });
								</script>
<?php
	require('footer.php');
?>
