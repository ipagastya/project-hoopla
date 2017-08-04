<?php 
if (!isset($_GET['deliv_id'])) {
	header('Location: susbscription_list');
}else{
	require_once('header.php');
	require_once('config.php');
	$deliv_id = $_GET['deliv_id'];
	$subs_id = $_GET['subs_id'];
	$sql = "SELECT * FROM DELIVERY_LIST AS D JOIN CITY AS C ON D.city_id = C.city_id JOIN PROVINCE AS P ON P.province_id = C.province_id WHERE delivery_id = '$deliv_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$cust_id = $row['cust_id'];
	$address = $row['address'];
	$city = $row['city_name'];
	$province = $row['province_name'];
	$mobile = $row['mobile_phone'];
	$home = $row['home_phone'];
	$deliv_date = $row['delivery_date'];
	$pickup_date = $row['pickup_date'];
	$actual_delivery_charge = $row['actual_delivery_charge'];
	$actual_pickup_charge = $row['actual_pickup_charge'];
	$payment_note = $row['payment_note'];
	$note = $row['note'];
	$age = $row['baby_age'];
	$box_name = $row['box_name'];

		//toy
	$toy = "";
	$sql_toy = "SELECT * FROM DELIVERY_TOYS AS D JOIN INVENTORY AS I ON D.product_code = I.product_code WHERE delivery_id = '$deliv_id'";
	$result = mysqli_query($conn, $sql_toy);
	$count = 0;
	while ($row = mysqli_fetch_assoc($result)) {
		$toy_name = $row['toy_name'];
		$toy = $toy."<option disabled selected>$toy_name</option>";
	}
	$province_id = "";
	?>
	<div class="jumbotron">
		<br><br><center><h2 class="leckerli">View Delivery</h2></center>
	</div>
	<div class="container">
		<form class="form-horizontal" method="POST" action="libs/insertdelivery?subs_id=<?=$subs_id ?>">
			<div class="form-group">
				<label class="control-label col-sm-2" for="deliveryID">Delivery ID :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="deliveryID" name="deliveryID" value="<?=$deliv_id?>" readonly>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="address">Address :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="address" value="<?=$address?>" name="address" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="province">Province :</label>
				<div class="col-sm-5">
				<select class="form-control selectpicker show-tick" data-live-search="true" value="<?=$province?>" id="provinceID" name="province" required>
					<option value=''>Select province</option>
					<?php
					// loop isi province dari db
					$sql_province = "SELECT * FROM PROVINCE ORDER BY
						CASE province_name
							WHEN 'DKI Jakarta' THEN 1
							WHEN 'Jawa Barat' THEN 2
							WHEN 'Banten' THEN 3
							WHEN 'Bali' THEN 4
							ELSE 5
						END;";
					if(($result_province = mysqli_query($conn, $sql_province)) === FALSE){
						echo "query failing, can't retrieve data";
					}
					else{
						while ($row = mysqli_fetch_assoc($result_province)) { ?>
						<option value="<?=$row['province_id']?>" <?php if($row['province_name'] == $province){
							echo "selected"; 
							$province_id = $row['province_id'];
						} ?>><?=$row['province_name']?></option>
						<?php }
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
					<option value=''>Select city</option>
					<?php
					$sql_city = "SELECT C.city_id, C.city_name
					FROM CITY AS C
					WHERE C.province_id = $province_id";

					if(($result_city = mysqli_query($conn, $sql_city)) === FALSE){
						echo "<option>query failing, can't retrieve data</option>";
					}
					else{
						while ($row = mysqli_fetch_assoc($result_city)) { ?>
						<option value="<?=$row['city_id']?>" <?php if($row['city_name'] == $city) echo "selected"; ?>><?=$row['city_name']?></option>
						<?php }
					}
					?>
				</select>
			</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="mobile">Mobile Number :</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="mobile" value="<?=$mobile?>" name="mobile" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="home">Home Number :</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="home" value="<?=$home?>" name="home" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="deliv-date">Delivery Date :</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="deliv-date" value="<?=$deliv_date?>" name="deliv-date" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="pick-date">Pickup Date :</label>
				<div class="col-sm-5">
					<input type="date" class="form-control" id="pick-date" value="<?=$pickup_date?>" name="pick-date" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="deliv-charge">Actual Delivery Charge :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control nominal-number" id="deliv-charge" value="<?=number_format($actual_delivery_charge,2)?>" name="deliv-charge" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="pick-charge">Actual Pickup Charge :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control nominal-number" id="pick-charge" value="<?=number_format($actual_pickup_charge,2)?>" name="pick-charge" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="pay-note">Payment Note :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" value="<?=$payment_note?>" id="pay-note" name="pay-note" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="note">Note :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" value="<?=$note?>" id="note" name="note" required>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="age">Baby's Age :</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="age" value="<?=$age?>" name="age" readonly>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="box-name">Box Name :</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="box-name" value="<?=$box_name?>" name="box-name" readonly>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="toy">Toys :</label>
				<div class="col-sm-5">
					<select class="selectpicker">
						<?=$toy?>
					</select>
				</div>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-5">
				<button class="addbutton" name="submit-edit" type="submit"><span class="
				glyphicon glyphicon-ok"></span> Submit</button>
			</div>
			<div class="col-sm-5"></div>
		</div>
		</form>
	</div>
<script src="libs/jquery/dist/jquery.min.js"></script>
<script>
	$("#provinceID").change(function(){
		$("#cityID").empty();
		var currentProvince = $(this).find(':selected').val();
		var currentCity = "<?=$city ?>";
		$.ajax({
			type: "POST",
			url: "select_city.php",
			data: {province: currentProvince, delivery_city: currentCity},
			success: function(response){
				$("#cityID").html(response).selectpicker('refresh');
			}
		});
	});
	$(".nominal-number").change(function(){
		$value = $(this).val()
		if(!isNaN($value) && $value){
			$tag = this;
			$.ajax({
				type: "POST",
				data: {nominal: $value},
				url: "libs/nominal.php",
				success: function(response){
					$value = response;
					$($tag).val(response);
				}
			});
		}
		else{
			$(this).val("");
			$(this).attr("placeholder", "Please input number")
		}
	});
</script>

	<?php 
}
require_once('footer.php');
?>