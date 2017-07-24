<?php 
	require('header.php');
?>

				<div class="container">
					<center><h3>View Inventory</h3></center>
					<br>
					<form class="form-horizontal" method="post" action="./inventory">
						<div class="form-group">
							<label class="control-label col-sm-4" for="toyname">Toy Name :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="toyname" name="toyname">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="prodcode">Product Code :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="prodcode" name="prodcode">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="status">Inventory Status :</label>
							<div class="col-sm-5">
								 <select class="form-control" id="status" name="status">
									<option value="Available">Available</option>
									<option value="Rented">Rented</option>
								    <option value="Broken">Broken</option>
									<option value="Missing Part">Missing Part</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="datereturn">Next Return Date :</label>
							<div class="col-sm-5">
								<input type="date" class="form-control" id="datereturn" name="datereturn">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="manufacturer">Manufacturer :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="manufacturer" name="manufacturer">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="batteryopt">Battery :</label>
							<div class="col-sm-5">
								 <select class="form-control" id="batteryopt" name="batteryopt">
								    <option value="1">Yes</option>
								    <option value="0">No</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="cat1">Toy Category 1 :</label>
							<div class="col-sm-5">
								<select class="form-control" id="cat1" name="cat1">
								<?php
									include "config.php";
									$query = "SELECT * FROM CATEGORY";
									$result = mysqli_query($conn,$query);
									while($row = mysqli_fetch_row($result))
							        {
							        	echo "<option value='".$row[0]."'>".$row[1]."</option>";
							        }
								?>
								</select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="cat2">Toy Category 2 :</label>
							<div class="col-sm-5">
								<select class="form-control" id="cat2" name="cat2">
								<?php
									include "config.php";
									$query = "SELECT * FROM CATEGORY";
									$result = mysqli_query($conn,$query);
									while($row = mysqli_fetch_row($result))
							        {
							        	echo "<option value='".$row[0]."'>".$row[1]."</option>";
							        }
								?>
								</select>
							
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="mfage">Manufacturing Age :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="mfage" name="mfage">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="hooplaage">Hoopla Age :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="hooplaage" name="hooplaage">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="motorskill">Fine Motor Skill :</label>
							<div class="col-sm-5">
								<select class="form-control" id="motorskill" name="motorskill">
								    <option value="1">Yes</option>
								    <option value="0">No</option>
								 </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="linguisticskill">Linguistic Skill :</label>
							<div class="col-sm-5">
								<select class="form-control" id="linguisticskill" name="linguisticskill">
								    <option value="1">Yes</option>
								    <option value="0">No</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="cognitiveskill">Cognitive Skill :</label>
							<div class="col-sm-5">
								<select class="form-control" id="cognitiveskill" name="cognitiveskill">
								    <option value="1">Yes</option>
								    <option value="0">No</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="socialskill">Social & Emotional Skill :</label>
							<div class="col-sm-5">
								<select class="form-control" id="socialskill" name="socialskill">
								    <option value="1">Yes</option>
								    <option value="0">No</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="imagination">Imagination :</label>
							<div class="col-sm-5">
								<select class="form-control" id="imagination" name="imagination">
								    <option value="1">Yes</option>
								    <option value="0">No</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="practicalskill">Practical Life Skill :</label>
							<div class="col-sm-5">
								<select class="form-control" id="practicalskill" name="practicalskill">
								   	<option value="1">Yes</option>
								    <option value="0">No</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="acquisition">Acquisition Price :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="acquisition" name="acquisition">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="retail">Retail Price :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="retail" name="retail">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="retailstoresource">Retail Store Sourced :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="retailstoresource" name="retailstoresource">
							</div>
							<div class="col-sm-3"></div>
						</div>
						<br>
						<div class="form-group">
							<div class="col-sm-4"></div>
							<div class="col-sm-4">
								<button class="greenbutton" type="submit" name="update" id="update">Update</button>
							</div>
							<div class="col-sm-4"></div>
						</div>
					</form>
					<br>
					<br>
					<?php
						include "config.php";
						$product_code = $_GET['pcode'];
						/*QUERY AND ECHO FOR INPUT AND DROPDOWN FORM*/
						$query = "SELECT toy_name,status,return_date,manufacturer,category_1,category_2,manufacturing_age,age_lower,age_upper,acquisition_price,retail_price,retail_store,battery,fine_motor,linguistic,cognitive,social_emotional,imagination,practical
						FROM INVENTORY 
						WHERE product_code='$product_code'";
						$result = mysqli_query($conn, $query);
						$row = mysqli_fetch_row($result);
						echo"
						<script>
							document.getElementById('toyname').value='".$row[0]."';
							document.getElementById('prodcode').value=".$product_code.";
							document.getElementById('status').value='".$row[1]."';
							document.getElementById('datereturn').value='".$row[2]."';
							document.getElementById('manufacturer').value='".$row[3]."';
							document.getElementById('cat1').value='".$row[4]."';
							document.getElementById('cat2').value='".$row[5]."';
							document.getElementById('mfage').value='".$row[6]."';
							document.getElementById('hooplaage').value='".$row[7]."-".$row[8]."';
							document.getElementById('acquisition').value='".$row[9]."';
							document.getElementById('retail').value='".$row[10]."';
							document.getElementById('retailstoresource').value='".$row[11]."';
							document.getElementById('batteryopt').value='".$row[12]."';
							document.getElementById('motorskill').value='".$row[13]."';
							document.getElementById('linguisticskill').value='".$row[14]."';
							document.getElementById('cognitiveskill').value='".$row[15]."';
							document.getElementById('socialskill').value='".$row[16]."';
							document.getElementById('imagination').value='".$row[17]."';
							document.getElementById('practicalskill').value='".$row[18]."';
						</script>";
						/***************************************************************/

						if(isset($_POST['update'])){
							$product_code = $_POST['prodcode'];
							$toy_name = $_POST["toyname"];
							$status = $_POST["status"];
							$return = $_POST["datereturn"];
							$manufacturer = $_POST["manufacturer"];
							$battery = $_POST["batteryopt"];
							$category_1 = $_POST["cat1"];
							$category_2 = $_POST["cat2"];
							$mf_age = $_POST["mfage"];
							$hoopla_age = $_POST["hooplaage"];
							$fine_motor = $_POST["motorskill"];
							$linguistic = $_POST["linguisticskill"];
							$cognitive = $_POST["cognitiveskill"];
							$social_emotional = $_POST["socialskill"];
							$imagination = $_POST["imagination"];
							$practical_life = $_POST["practicalskill"];
							$acquisition_price = $_POST["acquisition"];
							$retail_price = $_POST["retail"];
							$retail_store = $_POST["retailstoresource"];
							/*Hoopla Age Tokenizer*/
							$token = strtok($hoopla_age, "-");
							$count = 0;
							$age_lower = "";
							$age_upper = "";
							while ($token !== false){
								if($age_lower == ""){
									$age_lower = "$token";
								}
								$token = strtok("-");
								if($age_upper == ""){
									$age_upper = "$token";
								}
									
							}
							/*Category Id Search*/
							if($category_1 != ""){
								$searchqueryCat1 = "SELECT category_id FROM CATEGORY WHERE category_name = '".$category_1."'";
								$resultCat1 = mysqli_query($conn, $searchqueryCat1);
								//$idcat1 = mysqli_fetch_assoc($resultCat1);
								while($row1 = mysqli_fetch_row($resultCat1)){
									$category_1 = $row1[0];
								}
							}
							if($category_2 != ""){
								$searchqueryCat2 = "SELECT category_id FROM CATEGORY WHERE category_name = '".$category_2."'";
								$resultCat2 = mysqli_query($conn, $searchqueryCat2);
								while($row2 = mysqli_fetch_row($resultCat2)){
									$category_2 = $row2[0];
								}
								
							}

							/*boolean*/
							if($battery =="1"){
								$battery = true;
							}else{
								$battery = false;
							}

							if($fine_motor =="1"){
								$fine_motor = true;
							}else{
								$fine_motor = false;
							}

							if($linguistic =="1"){
								$linguistic = true;
							}else{
								$linguistic = false;
							}

							if($cognitive =="1"){
								$cognitive = true;
							}else{
								$cognitive = false;
							}

							if($social_emotional =="1"){
								$social_emotional = true;
							}else{
								$social_emotional = false;
							}

							if($imagination =="1"){
								$imagination = true;
							}else{
								$imagination = false;
							}

							if($practical_life =="1"){
								$practical_life = true;
							}else{
								$practical_life = false;
							}
							$updtquery = "	UPDATE INVENTORY
											SET toy_name= '$toy_name', manufacturer= '$manufacturer', status= '$status', return_date= '$return', battery= '$battery', category_1= '$category_1', category_2= '$category_2', manufacturing_age= '$mf_age', age_lower= '$age_lower', age_upper= '$age_upper', fine_motor= '$fine_motor', linguistic= '$linguistic',cognitive= '$cognitive', social_emotional= '$social_emotional', imagination= '$imagination', practical= '$practical_life', acquisition_price= '$acquisition_price', retail_price= '$retail_price', retail_store= '$retail_store'
											WHERE product_code= '$product_code'";

							$updtresult = mysqli_query($conn, $updtquery);
							echo"<script>
									alert('Update Inventory Success');
									window.location.href='inventory_list';
								</script>";
						}
					?>
					<div align="right">
						<?php
							include "config.php";
							$product_code = $_GET['pcode'];
							echo "<a method='post' href='inventory_card?productcode=$product_code' class='btn btn-default addbutton' name='card'>Update Card</a>";
						?>
					</div>
					<br>
					<h4>Inventory Card</h4>
					<br>
					<div class="table-responsive">
						<table class="table table-hover">
							<tr>
								<th>Date</th>
								<th>Activities</th>
								<th>Status</th>
								<th>Notes</th>
							</tr>
							<?php
								include"config.php";
								$product_code = $_GET['pcode'];
								$query = "SELECT * FROM INVENTORY_CARD WHERE product_code = '$product_code'";
								$result = mysqli_query($conn,$query);
								if(!$result){
					               	echo("Couldn't execute query");
					                die(mysqli_connect_error());
					            }
								while($row = mysqli_fetch_row($result))
		        				{
		        					$queryAct = "SELECT activity_name FROM INVENTORY_ACTIVITY WHERE activity_id = '".$row[2]."'";
		        					$resultAct = mysqli_query($conn, $queryAct);
		        					$rowAct = mysqli_fetch_row($resultAct);
		        					echo "<tr>
						        			<td>".$row[1]."</td>
						        			<td>".$rowAct[0]."</td>
						        			<td>".$row[3]."</td>
						        			<td>".$row[4]."</td>
						        		</tr>";
		        				}
							?>
						</table>
					</div>
					<br>
					<br>
					<br>
	
				</div>
				<br>
				<br>
				<br>


<?php
	require_once('footer.php');
?>