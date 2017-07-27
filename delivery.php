<?php  
require_once('header.php');
include "config.php";
if(!isset($_GET['cust_id'])){
	header("location: subscription_list");
}else{
	$cust_id = $_GET['cust_id'];
}

$sql = "SELECT * FROM DELIVERY_LIST";
if(($result_delivery = mysqli_query($conn, $sql))===FALSE){
	echo "sql fail";
}
else{
	$id = mysqli_num_rows($result_delivery);
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
				<input type="text" class="form-control" id="address" value="<?=$customer['address']?>" name="address">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="province">Province :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="provinceID" name="provinceID" value="<?=$province?>" readonly>
				<!-- <select class="form-control selectpicker" data-live-search="true" value="<?=$province?>" id="provinceID" name="province">
					<option value=''>Select province</option>
					<?php
					// loop isi province dari db
					$sql_province = "SELECT province_id, province_name FROM PROVINCE";
					if(($result_province = mysqli_query($conn, $sql_province)) === FALSE){
						echo "query failing, can't retrieve data";
					}
					else{
						while ($row = mysqli_fetch_assoc($result_province)) { ?>
						<option value="<?=$row['province_id']?>"><?=$row['province_name']?></option>
						<?php }
					}
					?>
				</select> -->
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="city">City :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="cityID" name="cityID" value="<?=$city?>" readonly>
				<!-- <select class="form-control selectpicker" data-live-search="true" id="cityID" value="<?=$city?>" name="cityID">
					<option value=''>Select city</option>
				</select> -->
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="mobile">Mobile Number :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="mobile" value="<?=$customer['phone_mobile']?>" name="mobile" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="home">Home Number :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="home" value="<?=$customer['phone_home']?>" name="home" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-date">Delivery Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="deliv-date" name="deliv-date">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pick-date">Pickup Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="pick-date" name="pick-date">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-charge">Actual Delivery Charge :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="deliv-charge" name="deliv-charge">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pick-charge">Actual Pickup Charge :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="pick-charge" name="pick-charge">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pay-note">Payment Note :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="pay-note" name="pay-note">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="note">Note :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="note" name="note">
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
				<input type="text" class="form-control" id="deliv-promo" name="deliv-promo">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deposit">Deposit Amount :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="deposit" name="deposit">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pay-term">Payment Terms :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="pay-term" name="pay-term">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="refund-date">Deposit Refund Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="refund-date" name="refund-date">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deposit-status">Deposit Status :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deposit-status" name="deposit-status">
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-schedule">Delivery Schedule :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="deliv-schedule" name="deliv-schedule">
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
			<label class="control-label col-sm-2" for="milestones">Milestones :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="milestones" value="<?=$customer['milestones']?>" name="milestones" readonly>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="select-category">Select Category :</label>
			<div class="col-sm-5">
				<select class="form-control selectpicker" data-live-search="true" id="select-category" name="select-category[]" multiple data-selected-text-format="count > 3">
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
			<label class="control-label col-sm-2" for="select-toy">Select Toy :</label>
			<div class="col-sm-5">
				<select class="form-control selectpicker" data-live-search="true" id="select-toy" name="select-toy[]" multiple data-selected-text-format="count > 3">
					<option value="" disabled>Select Toy</option>
					<?php 
					$sql_toy = "SELECT * FROM INVENTORY";
					$result = mysqli_query($conn, $sql_toy);
					while ($row = mysqli_fetch_assoc($result)) { ?>
					<option value="<?=$row['inventory_id']?>"><?=$row['toy_name']?></option>
					<?php }
					?>
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
	// $("#provinceID").change(function(){
	// 	$("#cityID").empty();
	// 	var currentProvince = $(this).find(':selected').val();
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "select_city.php",
	// 		data: {province: currentProvince},
	// 		success: function(response){
	// 			$("#cityID").html(response).selectpicker('refresh');
	// 		}
	// 	});
	// });
	$("#select-category").change(function(){
		$("#select-toy").empty().selectpicker('refresh');
		var category = $("#select-category").selectpicker('val');
		var age = $("#age").val();
		$.ajax({
			type: "POST",
			data: {category:category, age:age, cust_id:<?=$cust_id?>},
			url: "select_category.php",
			success: function(response){
				$("#select-toy").html(response).selectpicker('refresh');
			}
		});
	})
</script>
<?php 
require_once('footer.php');
?>