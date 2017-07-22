<?php 
	require('header.php');
?>
				<div class="container">
					<form class="form-horizontal" method="post" action="./inventory_create.php">
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
									<option>Available</option>
									<option>Rented</option>
								    <option>Broken</option>
									<option>Missing Part</option>
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
								    <option>Yes</option>
								    <option>No</option>
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
									$query = "SELECT category_name FROM CATEGORY";
									$result = mysqli_query($conn,$query);
									while($row = mysqli_fetch_row($result))
							        {
							        	echo "<option value='".$row[0]."</option>";
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
									$query = "SELECT category_name FROM CATEGORY";
									$result = mysqli_query($conn,$query);
									while($row = mysqli_fetch_row($result))
							        {
							        	echo "<option value='".$row[0]."</option>";
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
								    <option>Yes</option>
								    <option>No</option>
								 </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="linguisticskill">Linguistic Skill :</label>
							<div class="col-sm-5">
								<select class="form-control" id="linguisticskill" name="linguisticskill">
								    <option>Yes</option>
								    <option>No</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="cognitiveskill">Cognitive Skill :</label>
							<div class="col-sm-5">
								<select class="form-control" id="cognitiveskill" name="cognitiveskill">
								    <option>Yes</option>
								    <option>No</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="socialskill">Social & Emotional Skill :</label>
							<div class="col-sm-5">
								<select class="form-control" id="socialskill" name="socialskill">
								    <option>Yes</option>
								    <option>No</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="imagination">Imagination :</label>
							<div class="col-sm-5">
								<select class="form-control" id="imagination" name="imagination">
								    <option>Yes</option>
								    <option>No</option>
								  </select>
							</div>
							<div class="col-sm-3"></div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="practicalskill">Practical Life Skill :</label>
							<div class="col-sm-5">
								<select class="form-control" id="practicalskill" name="practicalskill">
								    <option>Yes</option>
								    <option>No</option>
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
						<div class="form-group">
							<div class="col-sm-4"></div>
							<div class="col-sm-5">
								<button class="greenbutton" type="submit" name="submit" id="submit">Submit</button>
							</div>
							<div class="col-sm-3"></div>
						</div>
					</form>
				</div>
		<?php
			include"config.php";
			if(isset($_POST['submit'])){
				$toy_name = $_POST["toyname"];
				$product_code = $_POST["prodcode"];
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

				/*boolean*/
				if($battery =="Yes"){
					$battery = true;
				}else{
					$battery = false;
				}

				if($fine_motor =="Yes"){
					$fine_motor = true;
				}else{
					$fine_motor = false;
				}

				if($linguistic =="Yes"){
					$linguistic = true;
				}else{
					$linguistic = false;
				}

				if($cognitive =="Yes"){
					$cognitive = true;
				}else{
					$cognitive = false;
				}

				if($social_emotional =="Yes"){
					$social_emotional = true;
				}else{
					$social_emotional = false;
				}

				if($imagination =="Yes"){
					$imagination = true;
				}else{
					$imagination = false;
				}

				if($practical_life =="Yes"){
					$practical_life = true;
				}else{
					$practical_life = false;
				}

				$cat1_id = mysqli_query($conn, "SELECT category_id from CATEGORY where category_name = '$category_1'");
				$cat2_id = mysqli_query($conn, "SELECT category_id from CATEGORY where category_name = '$category_2'");

				$query = "INSERT INTO INVENTORY(product_code,toy_name,manufacturer,status,return_date,battery,category_1,category_2,manufacturing_age,age_lower,age_upper,fine_motor,linguistic,cognitive,social_emotional,imagination,practical,acquisition_price,retail_price,retail_store) 
						VALUES('$product_code','$toy_name','$manufacturer','$status','$return','$battery','$cat1_id','$cat2_id','$mf_age','$age_lower','$age_upper','$fine_motor','$linguistic','$cognitive','$social_emotional','$imagination','$practical_life','$acquisition_price','$retail_price','$retail_store');";

				$result = mysqli_query($conn, $query);
				echo"<script>alert('Successfully Added Inventory');</script>";
			}
		?>

<?php 
	require('footer.php');
?>