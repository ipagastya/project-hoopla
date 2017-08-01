<?php  
require_once('header.php');
include "config.php";
if(!isset($_GET['cust_id']) && !isset($_GET['subs_id'])){
	header("location: subscription_list");
}else{
	$cust_id = $_GET['cust_id'];
	$subs_id = $_GET['subs_id'];
}

$sql = "SELECT * FROM DELIVERY_LIST";
if(($result_delivery = mysqli_query($conn, $sql))===FALSE){
	echo "sql fail";
}
else{
	$id = mysqli_num_rows($result_delivery) + 1;
}

$sql = "SELECT * FROM CUSTOMER WHERE cust_id = '$cust_id'";
if(($result_customer = mysqli_query($conn, $sql))===FALSE){
	echo "sql fail";
}
else{
	$customer = mysqli_fetch_assoc($result_customer);
	$city_id = $customer['city_id'];
	$province_id = $customer['province_id'];
}

$sql = "SELECT * FROM PROVINCE WHERE province_id = '$province_id'";
$result_province = mysqli_query($conn, $sql);
$province = mysqli_fetch_assoc($result_province)['province_name'];

$sql = "SELECT * FROM CITY WHERE city_id = '$city_id'";
$result_city = mysqli_query($conn, $sql);
$city = mysqli_fetch_assoc($result_city)['city_name'];

$sql_subs = "SELECT * FROM SUBSCRIPTION WHERE subs_id = $subs_id";
$result_subs = mysqli_query($conn, $sql_subs);
$subscription = mysqli_fetch_assoc($result_subs);

$dob= $customer['baby_dob'];
$baby_age = (date('Y') - date('Y',strtotime($dob)));
?>
<div class="container">
	<form class="form-horizontal" method="POST" action="insertdelivery.php?cust_id=<?=$cust_id ?>">
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliveryID">Delivery ID :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deliveryID" name="deliveryID" value="<?=$id?>" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="address">Address :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="address" value="<?=$customer['address']?>" name="address" required>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="province">Province :</label>
			<div class="col-sm-5">
				<select class="form-control selectpicker show-tick" data-live-search="true" value="<?=$province?>" id="provinceID" name="province">
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
						<option value="<?=$row['province_id']?>" <?php if($row['province_name'] == $province) echo "selected"; ?>><?=$row['province_name']?></option>
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
				<select class="form-control selectpicker show-tick" data-live-search="true" id="cityID" name="cityID">
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
				<input type="number" class="form-control" id="mobile" value="<?=$customer['phone_mobile']?>" name="mobile">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="home">Home Number :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="home" value="<?=$customer['phone_home']?>" name="home">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-date">Delivery Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="deliv-date" name="deliv-date" required>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pick-date">Pickup Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="pick-date" name="pick-date" required>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-charge">Actual Delivery Charge :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control nominal-number" id="deliv-charge" value="0" name="deliv-charge" required>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pick-charge">Actual Pickup Charge :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control nominal-number" id="pick-charge" value="0" name="pick-charge" required>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pay-note">Payment Note :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="pay-note" name="pay-note" required>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="note">Note :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="note" name="note" required>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="age">Baby's Age :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="age" value="<?=$baby_age?>" name="age" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="name">Baby's Name :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="name" value="<?=$customer['baby_name']?>" name="name" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-promo">Delivery Promo :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deliv-promo" value="<?=number_format($subscription['deliv_promo'],2) ?>" name="deliv-promo" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deposit">Deposit Amount :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deposit" value="<?=number_format($subscription['deposit'],2) ?>" name="deposit" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pay-term">Payment Terms :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="pay-term" name="pay-term" value="<?=$subscription['payment_terms'] ?>" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="refund-date">Deposit Refund Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="refund-date" value="<?=$subscription['deposit_refund'] ?>" name="refund-date" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deposit-status">Deposit Status :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deposit-status" value="<?=$subscription['deposit_status'] ?>" name="deposit-status" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-schedule">Delivery Schedule :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="deliv-schedule" name="deliv-schedule" required>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="favorite">Favorite Toys :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="fav-toy" value="<?=$customer['favorite_toys']?>" name="favorite-toys" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="box-name">Box Name :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="box-name" name="box-name" required>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="milestones">Milestones :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="milestones" value="<?=$customer['milestones']?>" name="milestones" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="select-category">Select Category :</label>
			<div class="col-sm-5">
				<select class="form-control selectpicker" data-live-search="true" id="select-category" name="select-category[]" multiple data-selected-text-format="count > 3" required>
					<option value="" disabled>Select Category</option>
					<?php 
					$sql_category = "SELECT * FROM CATEGORY";
					$result = mysqli_query($conn, $sql_category);
					while ($row = mysqli_fetch_assoc($result)) { ?>
					<option value="<?=$row['category_id']?>"><?=$row['category_name']?></option>
					<?php }
					?>
				</select>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="select-skill">Select Skill :</label>
			<div class="col-sm-5">
				<select class="form-control selectpicker" data-live-search="true" id="select-skill" name="select-skill[]" multiple data-selected-text-format="count > 3" required>
					<option value="" disabled>Select Category</option>
					<option value="fine_motor">Fine Motor</option>
					<option value="linguistic">Linguistic</option>
					<option value="cognitive">Cognitive</option>
					<option value="social_emotional">Social Emotional</option>
					<option value="imagination">Imagination</option>
					<option value="practical">Practical</option>
				</select>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="select-toy">Select Toy :</label>
			<div class="col-sm-5">
				<select class="form-control selectpicker" data-live-search="true" id="select-toy" name="select-toy[]" multiple data-selected-text-format="count > 3" required>
					<option value="" disabled>Select Toy</option>
				</select>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-5">
				<button class="btn btn-primary greenbutton" type="submit">Submit</button>
			</div>
			<div class="col-sm-5"></div>
		</div>
	</form>
</div>
<br>
<br>
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
	$("#select-category, #select-skill").change(function(){
		$("#select-toy").empty().selectpicker('refresh');
		var category = $("#select-category").selectpicker('val');
		var skill = $("#select-skill").selectpicker('val');
		var age = $("#age").val();
		$.ajax({
			type: "POST",
			data: {category:category, skill:skill, age:age, cust_id:<?="$cust_id"?>},
			url: "select_category.php",
			success: function(response){
				$("#select-toy").html(response).selectpicker('refresh');
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
require_once('footer.php');
?>
