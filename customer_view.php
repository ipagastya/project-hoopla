<?php 
	require('header.php');
?>
<div class="jumbotron">
	<br><br>
	<center><h2 class="leckerli">View Customer</h2></center>
</div>
 <div class="container">
		<form class="form-horizontal" method="post" action="./customer_view?id=<?=$_GET['id']?>">
			<div class="form-group">
				<label class="control-label col-sm-2" for="customerID">Customer's Name :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="customerID" name="customerID" placeholder="Customer's Name">
				</div>
				<div id='errorCustomer' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="babyID">Baby's Name :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="babyID" name="babyID" placeholder="Baby's Name">
				</div>
				<div id='errorBaby' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="dobID">Baby's Date of Birth :</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="dobID" name="dobID" placeholder="YYYY-MM-DD">
				</div>
				<div id='errorDOB' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="numberID">Home Number / Mobile Number (WA) :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="homeNumberID" name="homeNumberID" placeholder="Home Number">
				</div>
				<div id='errorHomeNumber' style='color:red;text-align: left;'></div>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="mobileNumberID" name="mobileNumberID" placeholder="Mobile Number">
				</div>
				<div id='errorMobileNumber' style='color:red;text-align: left;'></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="lineID">Line ID :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="lineID" name="lineID" placeholder="Line ID">
				</div>
				<div id='errorLine' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email :</label>
				<div class="col-sm-5">
					<input type="email" class="form-control" id="emailID" name="emailID" placeholder="Email">
				</div>
				<div id='errorEmail' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="address">Address :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="addressID" name="addressID" placeholder="Address">
				</div>
				<div id='errorAddress' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="province">Province :</label>
				<div class="col-sm-5">	
					<select class="form-control selectpicker show-tick" data-live-search="true" id="provinceID" name="provinceID">
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
				<div id='errorProvince' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="city">City :</label>
				<div class="col-sm-5">	
					<select class="form-control selectpicker show-tick" data-live-search="true" id="cityID" name="cityID">
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
				<div id='errorCity' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="zip">ZIP :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="zipID" name="zipID" placeholder="ZIP Code">
				</div>
				<div id='errorZIP' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="favorite">Favorite/Least Favorite Toys :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="favoriteID" name="favoriteID" placeholder="Favorite">
				</div>
				<div id='errorFavorite' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="milestone">Milestones to be developed :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="milestoneID" name="milestoneID" placeholder="Milestones">
				</div>
				<div id='errorMilestone' style='color:red;text-align: left;'></div>
				<div class="col-sm-5"></div>
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
		
			$flagName = false;
            $flagBabyName = false;
            $flagDOB = false;
			$flagHomeNumber = false;
			$flagMobileNumber = false;
			$flagLine = false;
			$flagEmail = false;
			$flagAddress = false;
			$flagCity = false;
			$flagProvince = false;
			$flagZIP = false;
			$flagFavorite = false;
			$flagMilestone = false;
			
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
			print"<script>
								document.getElementById('customerID').value=
										'".$customerID."'
								</script>";
						print"<script>
								document.getElementById('babyID').value=
										'".$babyID."'
								</script>";
						print"<script>
								document.getElementById('dobID').value=
										'".$dobID."'
								</script>";
						print"<script>
								document.getElementById('homeNumberID').value=
										'".$homeNumberID."'
								</script>";
						print"<script>
								document.getElementById('mobileNumberID').value=
										'".$mobileNumberID."'
								</script>";
						print"<script>
								document.getElementById('lineID').value=
										'".$lineID."'
								</script>";
						print"<script>
								document.getElementById('emailID').value=
										'".$emailID."'
								</script>";
						print"<script>
								document.getElementById('addressID').value=
										'".$addressID."'
								</script>";
						print"<script>
								document.getElementById('cityID').value=
										'".$cityID."'
								</script>";
						print"<script>
								document.getElementById('provinceID').value=
										'".$provinceID."'
								</script>";
						print"<script>
								document.getElementById('zipID').value=
										'".$zipID."'
								</script>";
						print"<script>
								document.getElementById('favoriteID').value=
										'".$favoriteID."'
								</script>";
						print"<script>
								document.getElementById('milestoneID').value=
										'".$milestoneID."'
								</script>";
			
				if($flagName == false || 
						$flagBabyName == false || 
						$flagDOB == false || 
						$flagHomeNumber == false || 
						$flagMobileNumber == false ||
						$flagLine == false ||
						$flagEmail == false ||
						$flagAddress ==false ||
						$flagCity == false ||
						$flagProvince == false ||
						$flagZIP == false ||
						$flagFavorite == false ||
						$flagMilestone == false)
					{
						/*menjaga value jika masih belum benar supaya tetap tampil di form*/
						print"<script>
								document.getElementById('customerID').value=
										'".$customerID."'
								</script>";
						print"<script>
								document.getElementById('babyID').value=
										'".$babyID."'
								</script>";
						print"<script>
								document.getElementById('dobID').value=
										'".$dobID."'
								</script>";
						print"<script>
								document.getElementById('homeNumberID').value=
										'".$homeNumberID."'
								</script>";
						print"<script>
								document.getElementById('mobileNumberID').value=
										'".$mobileNumberID."'
								</script>";
						print"<script>
								document.getElementById('lineID').value=
										'".$lineID."'
								</script>";
						print"<script>
								document.getElementById('emailID').value=
										'".$emailID."'
								</script>";
						print"<script>
								document.getElementById('addressID').value=
										'".$addressID."'
								</script>";
						print"<script>
								document.getElementById('cityID').value=
										'".$cityID."'
								</script>";
						print"<script>
								document.getElementById('provinceID').value=
										'".$provinceID."'
								</script>";
						print"<script>
								document.getElementById('zipID').value=
										'".$zipID."'
								</script>";
						print"<script>
								document.getElementById('favoriteID').value=
										'".$favoriteID."'
								</script>";
						print"<script>
								document.getElementById('milestoneID').value=
										'".$milestoneID."'
								</script>";
					}
					if($customerID == "" ||
					$babyID == "" ||
					$dobID == "" ||
					$homeNumberID == "" ||
					$mobileNumberID == "" ||
					$lineID == "" ||
					$emailID == "" ||
					$addressID == "" ||
					$cityID == "" ||
					$provinceID == "" ||
					$zipID == "" ||
					$favoriteID == "" ||
					$milestoneID == "")
					{
						if($customerID == ""){
							print "<script>
									document.getElementById('errorCustomer').innerHTML=
									'<h6>* Nama Belum Diisi</h6>'
									</script>";
							print "<style>
									#customerID{
										border-color:red;
										border-width:3px;
									}
									</style>";
						}
						if($babyID== ""){
							print "<script>
									document.getElementById('errorBaby').innerHTML=
									'<h6>* Nama Belum Diisi</h6>'
									</script>";
							print "<style>
									#babyID{
										border-color:red;
										border-width:3px;
									}
									</style>";
						}
						if($dobID == ""){
							print "<script>
									document.getElementById('errorDOB').innerHTML=
									'<h6>* Tanggal Belum Diisi</h6>'
									</script>";
							print "<style>
									#dobID{
										border-color:red;
										border-width:3px;
									}
									</style>";
						}
						if($homeNumberID == ""){
									print "<script>
										document.getElementById('errorHomeNumber').innerHTML=
										'<h5>* Nomor Belum Diisi</h5>'
										</script>";
									print "<style>
										#homeNumberID{
											border-color:red;
											border-width:3px;
										}
										</style>";
								}
						if($mobileNumberID == ""){
									print "<script>
										document.getElementById('errorMobileNumber').innerHTML=
										'<h5>* Nomor Belum Diisi</h5>'
										</script>";
									print "<style>
										#mobileNumberID{
											border-color:red;
											border-width:3px;
										}
										</style>";
								}
						if($lineID == ""){
									print "<script>
										document.getElementById('errorLine').innerHTML=
										'<h5>* Line ID Belum Diisi</h5>'
										</script>";
									print "<style>
										#lineID{
											border-color:red;
											border-width:3px;
										}
										</style>";
								}
						if($emailID == ""){
									print "<script>
										document.getElementById('errorEmail').innerHTML=
										'<h5>* Email Belum Diisi</h5>'
										</script>";
									print "<style>
										#emailID{
											border-color:red;
											border-width:3px;
										}
										</style>";
								}
						if($addressID == ""){
									print "<script>
										document.getElementById('errorAddress').innerHTML=
										'<h5>* Alamat Belum Diisi</h5>'
										</script>";
									print "<style>
										#addressID{
											border-color:red;
											border-width:3px;
										}
										</style>";
								}
						if($cityID == ""){
									print "<script>
										document.getElementById('errorCity').innerHTML=
										'<h5>* Kota Belum Diisi</h5>'
										</script>";
									print "<style>
										#cityID{
											border-color:red;
											border-width:3px;
										}
										</style>";
								}
						if($provinceID== ""){
									print "<script>
										document.getElementById('errorProvince').innerHTML=
										'<h5>* Provinsi Belum Diisi</h5>'
										</script>";
									print "<style>
										#provinceID{
											border-color:red;
											border-width:3px;
										}
										</style>";
								}
						if($zipID == ""){
									print "<script>
										document.getElementById('errorZIP').innerHTML=
										'<h5>* Kode Pos Belum Diisi</h5>'
										</script>";
									print "<style>
										#zipID{
											border-color:red;
											border-width:3px;
										}
										</style>";
								}
						if($favoriteID == ""){
									print "<script>
										document.getElementById('errorFavorite').innerHTML=
										'<h5>* Favorite Belum Diisi</h5>'
										</script>";
									print "<style>
										#favoriteID{
											border-color:red;
											border-width:3px;
										}
										</style>";
								}
						if($milestoneID == ""){
									print "<script>
										document.getElementById('errorMilestone').innerHTML=
										'<h5>* Milestones Belum Diisi</h5>'
										</script>";
									print "<style>
										#milestoneID{
											border-color:red;
											border-width:3px;
										}
										</style>";
								}
					}
					if($customerID != "" &&
					$babyID != "" &&
					$dobID != "" &&
					$homeNumberID != "" &&
					$mobileNumberID != "" &&
					$lineID != "" &&
					$emailID != "" &&
					$addressID != "" &&
					$cityID != "" &&
					$provinceID != "" &&
					$zipID != "" &&
					$favoriteID != "" &&
					$milestoneID != "")
					{
					$flagName = true;
					$flagBabyName = true;
					$flagDOB = true;
					$flagHomeNumber = true;
					$flagMobileNumber = true;
					$flagLine = true;
					$flagEmail = true;
					$flagAddress = true;
					$flagCity = true;
					$flagProvince = true;
					$flagZIP = true;
					$flagFavorite = true;
					$flagMilestone = true;
						$query2 = "UPDATE CUSTOMER SET cust_name='$customerID', baby_name='$babyID', baby_dob='$dobID', phone_home='$homeNumberID',
									phone_mobile='$mobileNumberID', line_id='$lineID', email='$emailID', address='$addressID', city_id='$cityID', 
									province_id='$provinceID', zip_code='$zipID', favorite_toys='$favoriteID', milestones='$milestoneID' 
									WHERE cust_id='$id'";
						if($result = mysqli_query($conn, $query2)){
							print "<script>alert('Customer Telah Berhasil Diperbaharui');
							window.location.href='customer_list?page=1';
							</script>";
						}
						print "<script>alert('".$query2."');</script>";
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