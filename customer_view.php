<?php 
	require('header.php');
	$idCheck = $_GET['id'];
	include "config.php";
	$queryCheck = "SELECT * FROM CUSTOMER WHERE cust_id = $idCheck";
	$resultCheck = mysqli_query($conn, $queryCheck);                          
			if(!$resultCheck){
				print("Couldn't execute query");   
				die(mysqli_connect_error());
            }
			else
			{
				$row = mysqli_fetch_assoc($resultCheck);
				?>
				<div class="jumbotron">
					<br><br>
					<center><h2 class="leckerli">View Customer</h2></center>
				</div>
				 <div class="container">
						<form class="form-horizontal" method="post" action="./customer_view?id=<?=$_GET['id']?>">
							<div class="form-group">
								<label class="control-label col-sm-4" for="customerID">Customer's Name :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="customerID" name="customerID" placeholder="Customer's Name" required>
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="babyID">Baby's Name :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="babyID" name="babyID" placeholder="Baby's Name" required>
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="status">Baby's Gender :</label>
								<div class="col-sm-2 radio">
									<label><input type="radio" value="Male" id="babyGenderID" name="babyGenderID"<?php if($row['baby_gender'] == 'Male') echo "checked" ?>>Male</label>
								</div>
								<div class="col-sm-2 radio">
									<label><input type="radio" value="Female" id="babyGenderID" name="babyGenderID"<?php if($row['baby_gender'] == 'Female') echo "checked" ?>>Female</label>
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="dobID">Baby's Date of Birth :</label>
								<div class="col-sm-4">
									<input type="date" class="form-control" id="dobID" name="dobID" placeholder="YYYY-MM-DD" required>
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="numberID">Home Number / Mobile Number (WA) :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="homeNumberID" name="homeNumberID" placeholder="Home Number" required>
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="mobileNumberID" name="mobileNumberID" placeholder="Mobile Number" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="lineID">Line ID :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="lineID" name="lineID" placeholder="Line ID">
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="email">Email :</label>
								<div class="col-sm-4">
									<input type="email" class="form-control" id="emailID" name="emailID" placeholder="Email" required>
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="address">Address :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="addressID" name="addressID" placeholder="Address" required>
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="province">Province :</label>
								<div class="col-sm-4">	
									<select class="form-control selectpicker show-tick" data-live-search="true" id="provinceID" name="provinceID" required>
										<option value=''>Select Province</option>
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
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="city">City :</label>
								<div class="col-sm-4">	
									<select class="form-control selectpicker show-tick" data-live-search="true" id="cityID" name="cityID" required>
										<option value=''>Select City</option>
										<?php
												include "config.php";
												$query = "SELECT * FROM CITY ORDER BY city_name ASC";
												$result = mysqli_query($conn, $query);
												while($row = mysqli_fetch_row($result)){
													echo
													"<option value='".$row[0]."' >".$row[2]."</option>" ;
												}
											?>
									</select>
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="zip">ZIP :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="zipID" name="zipID" placeholder="ZIP Code" required>
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="favorite">Favorite/Least Favorite Toys :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="favoriteID" name="favoriteID" placeholder="Favorite" required>
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="milestone">Milestones to be developed :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="milestoneID" name="milestoneID" placeholder="Milestones" required>
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group">
							<div class="col-sm-4"></div>
							<div class="col-sm-4">
								<button name="update" class="addbutton" type="submit"><span class="glyphicon glyphicon-ok"></span> Update</button>
							</div>
							<div class="col-sm-4"></div>
						</div>
						</form>
					</div>
			
				<?php
				include "config.php";
					
					$id = $_GET['id'];
					$query1 = "SELECT cust_name, baby_name, baby_dob, phone_home, phone_mobile, line_id, email, address, city_id, province_id, zip_code, favorite_toys, milestones
								FROM CUSTOMER WHERE cust_id = $id";
					$result = mysqli_query($conn, $query1);                          
					if(!$result){
						print("Couldn't execute query");   
						die(mysqli_connect_error());
					}
					$row = mysqli_fetch_row($result);
					print"<script>
						document.getElementById('customerID').value=
						'".$row[0]."'
						</script>";
					print"<script>
						document.getElementById('babyID').value=
						'".$row[1]."'
						</script>";
					print"<script>
						document.getElementById('dobID').value=
						'".$row[2]."'
						</script>";
					print"<script>
						document.getElementById('homeNumberID').value=
						'".$row[3]."'
						</script>";
					print"<script>
						document.getElementById('mobileNumberID').value=
						'".$row[4]."'
						</script>";
					print"<script>
						document.getElementById('lineID').value=
						'".$row[5]."'
						</script>";
					print"<script>
						document.getElementById('emailID').value=
						'".$row[6]."'
						</script>";
					print"<script>
						document.getElementById('addressID').value=
						'".$row[7]."'
						</script>";
					print"<script>
						document.getElementById('cityID').value=
						'".$row[8]."'
						</script>";
					print"<script>
						document.getElementById('provinceID').value=
						'".$row[9]."'
						</script>";
					print"<script>
						document.getElementById('zipID').value=
						'".$row[10]."'
						</script>";
					print"<script>
						document.getElementById('favoriteID').value=
						'".$row[11]."'
						</script>";
					print"<script>
						document.getElementById('milestoneID').value=
						'".$row[12]."'
						</script>";
						
					if(isset($_POST['update'])){
						$customerID = $_POST['customerID'];
						$babyID = $_POST['babyID'];
						$babyGenderID = $_POST['babyGenderID'];
						$dobID = $_POST['dobID'];
						$homeNumberID = $_POST['homeNumberID'];
						$mobileNumberID = $_POST['mobileNumberID'];
						$lineID = $_POST['lineID'];
						$emailID = $_POST['emailID'];
						$addressID = $_POST['addressID'];
						$cityID = $_POST['cityID'];
						$provinceID = $_POST['provinceID'];
						$zipID = $_POST['zipID'];
						$favoriteID = $_POST['favoriteID'];
						$milestoneID = $_POST['milestoneID'];
						
						$query2 = "UPDATE CUSTOMER SET cust_name='$customerID', baby_name='$babyID', baby_gender='$babyGenderID', baby_dob='$dobID', phone_home='$homeNumberID',
								phone_mobile='$mobileNumberID', line_id='$lineID', email='$emailID', address='$addressID', city_id='$cityID', 
								province_id='$provinceID', zip_code='$zipID', favorite_toys='$favoriteID', milestones='$milestoneID' 
								WHERE cust_id='$id'";
						if($result = mysqli_query($conn, $query2)){
						print "<script>alert('Customer has been updated');
								window.location.href='customer_list?page=1';
								</script>";
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
			}	
	require('footer.php');
	?>