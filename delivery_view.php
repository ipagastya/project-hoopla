<?php 
	if (!isset($_GET['deliv_id'])) {
		header('Location: susbscription_list');
	}else{
		require_once('header.php');
		require_once('config.php');
		$deliv_id = $_GET['deliv_id'];
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
			if ($count == 0) {
				$count = $count + 1;
			}
			else{
				$toy = $toy.", ";
			}
			$toy = $toy.$row['toy_name'];
		}
?>
<div class="container">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliveryID">Delivery ID :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deliveryID" name="deliveryID" value="<?=$deliv_id?>" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="address">Address :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="address" value="<?=$address?>" name="address" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="province">Province :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="provinceID" name="provinceID" value="<?=$province?>" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="city">City :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="cityID" name="cityID" value="<?=$city?>" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="mobile">Mobile Number :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="mobile" value="<?=$mobile?>" name="mobile" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="home">Home Number :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="home" value="<?=$home?>" name="home" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-date">Delivery Date :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="deliv-date" value="<?=$deliv_date?>" name="deliv-date" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pick-date">Pickup Date :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="pick-date" value="<?=$pickup_date?>" name="pick-date" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="deliv-charge">Actual Delivery Charge :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="deliv-charge" value="<?=$actual_delivery_charge?>" name="deliv-charge" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pick-charge">Actual Pickup Charge :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="pick-charge" value="<?=$actual_pickup_charge?>" name="pick-charge" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pay-note">Payment Note :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" value="<?=$payment_note?>" id="pay-note" name="pay-note" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="note">Note :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" value="<?=$note?>" id="note" name="note" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="age">Baby's Age :</label>
			<div class="col-sm-5">
				<input type="number" class="form-control" id="age" value="<?=$age?>" name="age" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="box-name">Box Name :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="box-name" value="<?=$box_name?>" name="box-name" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="toy">Toys :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="toy" value="<?=$toy?>" name="toy" disabled>
			</div>
			<div class="col-sm-5"></div>
		</div>
	</form>
</div>


<?php 
	}
?>