<?php 
require('header.php');
if(!isset($_GET['subs_id'])){
	header("location: subscription_list");
}else{
	$subs_id = $_GET['subs_id'];
	include "config.php";
	$sql = "SELECT * FROM SUBSCRIPTION AS S JOIN CUSTOMER AS C ON S.cust_id = C.cust_id WHERE subs_id = $subs_id";
	if(($result = mysqli_query($conn, $sql)) === FALSE){
		echo "sql fail";
	}
	else{
		if (mysqli_num_rows($result) == 0) {
			echo "<h1>Subs ID Not Valid</h1>";
				// header("location: subscription_list");
		}
		else{
			$row = mysqli_fetch_assoc($result);
			?>
			<div class= "container">
				<form class="form-horizontal" action="editsubscription?subs_id=<?=$subs_id?>" method="POST">
					<div class="form-group">
						<label class="control-label col-sm-4" for="customerName">Customer Name :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="customerName" name="customerName" value="<?=$row['cust_name']?>" readonly>
						</select>
					</div>
					<div class="col-sm-3"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="status">Subscription Type :</label>
					<div class="col-sm-2 radio">
						<label><input type="radio" value="new" name="status" required <?php if($row['status'] == 'new') echo "checked" ?>>New</label>
					</div>
					<div class="col-sm-2 radio">
						<label><input type="radio" value="extension" name="status" <?php if($row['status'] == 'extension') echo "checked" ?>>Extension</label>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="plan">Subscription Plan :</label>
					<div class="col-sm-2 radio">
						<label><input type="radio" value="1" name="plan" required <?php if($row['subs_plan'] == 1) echo "checked" ?>>1 Month</label>
					</div>
					<div class="col-sm-2 radio">
						<label><input type="radio" value="3" name="plan" <?php if($row['subs_plan'] == 3) echo "checked" ?>>3 Months</label>
					</div>
					<div class="col-sm-2 radio">
						<label><input type="radio" value="6" name="plan" <?php if($row['subs_plan'] == 6) echo "checked" ?>>6 Months</label>
					</div>
					<div class="col-sm-2"></div>
					<?php
					$subs_type = "3 Months";
					?>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="sub-promo">Subscription Promo :</label>
					<div class="col-sm-2">
						<input type="text" class="form-control nominal-number" id="sub-promo" name="sub-promo" value="<?=number_format($row['subs_promo'],2)?>" required>
					</div>
					<div class="col-sm-2">
						<h4>Rupiah</h4>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<!--TODO: Price otomatis ke generate ketika subs plan dipilih and (subs promo on hold)-->
				<div class="form-group">
					<label class="control-label col-sm-4" for="sub-price">Subscription Price :</label>
					<div class="col-sm-2">
						<input type="text" class="form-control nominal-number" id="sub-price" name="sub-price" value="<?=number_format($row['subs_price'],2)?>" readonly>
						<?php
          //  require("config.php");
          //  $query = "SELECT st.price FROM subscription_type st WHERE st.type = " + $subs_type;
          //  $result = "guna";//mysqli_query($conn, $query);
          //  echo $result
						?>
						<script src="libs/jquery/dist/jquery.min.js"></script>
						<script>
							$("input[name=plan]:radio,#sub-promo").change(function () {
								$("#sub-price").empty();
								var currentPlan = $("input[name='plan']:checked").val();
								var currentPromo = $("#sub-promo").val();
								if(isNaN(currentPlan)) currentPlan = 0;
								if(isNaN(currentPromo)) currentPromo = 0;
								$.ajax({
									type: "POST",
									url: "select_plan_delimiter.php",
									data: {plan: currentPlan,promo: currentPromo},
									success: function(response){
										$("#sub-price").val(response);
									}
								});
							});
						</script>
					</div>
					<div class="col-sm-2">
						<h4>Rupiah / Month</h4>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="toypermonth">No of Toys/Month :</label>
					<div class="col-sm-2">
						<input type="number" class="form-control" id="toypermonth" name="toypermonth" value="<?=$row['num_ofToys']?>" required>
					</div>
					<div class="col-sm-6"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="first-deliv">First Delivery Date :</label>
					<div class="col-sm-2">
						<input type="date" class="form-control" id="first-deliv" name="first-deliv" value=<?php echo date('Y-m-d',strtotime($row['first_deliv'])) ?> required>
					</div>
					<div class="col-sm-6"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="deliv-promo">Delivery Promo :</label>
					<div class="col-sm-2">
						<input type="text" class="form-control nominal-number" id="deliv-promo" name="deliv-promo" value="<?=number_format($row['deliv_promo'],2)?>" required>
					</div>
					<div class="col-sm-2">
						<h4>Rupiah</h4>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="deliv-price">Delivery Price :</label>
					<div class="col-sm-2">
						<input type="text" class="form-control nominal-number" id="deliv-price" name="deliv-price" value="<?=number_format($row['deliv_price'],2)?>" required>
					</div>
					<div class="col-sm-2">
						<h4>Rupiah</h4>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="deposit">Deposit Amount :</label>
					<div class="col-sm-2">
						<input type="text" class="form-control nominal-number" id="deposit" name="deposit" value="<?=number_format($row['deposit'],2)?>" required>
					</div>
					<div class="col-sm-2">
						<h4>Rupiah</h4>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="pay-term">Payment Terms :</label>
					<div class="col-sm-2 radio">
						<label><input type="radio" value="Upfront" name="pay-term" required <?php if($row['payment_terms'] == 'Upfront') echo "checked" ?>>Upfront</label>
					</div>
					<div class="col-sm-2 radio">
						<label><input type="radio" value="Monthly" name="pay-term" <?php if($row['payment_terms'] == 'Monthly') echo "checked" ?>>Monthly</label>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="refund-date">Deposit Refund Date :</label>
					<div class="col-sm-2">
						<input type="date" class="form-control" id="refund-date" name="refund-date" value=<?php echo date('Y-m-d',strtotime($row['deposit_refund'])) ?> required>
					</div>
					<div class="col-sm-6"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="deposit-status">Deposit Status :</label>
					<div class="col-sm-2">
						<select class="form-control selectpicker show-tick" id="deposit-status" name="deposit-status" required>
							<?php $deposit_status = $row['deposit_status']; ?>
							<option value="Waiting" <?php if($deposit_status == 'Waiting') echo "selected" ?>>Waiting</option>
							<option value="Paid" <?php if($deposit_status == 'Paid') echo "selected" ?>>Paid</option>
							<option value="Cancelled" <?php if($deposit_status == 'Cancelled') echo "selected" ?>>Cancelled</option>
							<option value="Extended" <?php if($deposit_status == 'Extended') echo "selected" ?>>Extended</option>
							<option value="Refunded" <?php if($deposit_status == 'Refunded') echo "selected" ?>>Refunded</option>
							<option value="Refunded-Partially" <?php if($deposit_status == 'Refunded-Partially') echo "selected" ?>>Refunded-Partially</option>
							<option value="Void" <?php if($deposit_status == 'Void') echo "selected" ?>>Void</option>
						</select>
					</div>
					<div class="col-sm-6"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-4"></div>
					<div class="col-sm-5">
						<button class="btn btn-primary greenbutton" type="submit">Submit</button>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
			<hr>
			<div align="right">
				<a href="delivery?cust_id=<?=$row['cust_id']?>" class="btn btn-primary addbutton"><span class="glyphicon glyphicon-plus"></span> Create Delivery</a>
			</div>
			<h4>Delivery Schedule</h4>
			<div class="table-responsive">
				<table class="table table-hover">
					<tr>
						<th>No</th>
						<th>Address</th>
						<th>City</th>
						<th>Province</th>
						<th>Mobile Phone</th>
						<th>Home Phone</th>
						<th>Delivery Date</th>
						<th>Pick Up Date</th>
						<th>Actual Delivery Charge</th>
						<th>Actual Pickup Charge</th>
						<th>Payment Note</th>
						<th>Note</th>
						<th>Baby's Age</th>
						<th>Box Name</th>
						<th>Details of Toys</th>
					</tr>
					<?php 
					$cust_id = $row['cust_id'];
					$sql = "SELECT * FROM DELIVERY_LIST WHERE cust_id = '$cust_id'";
					$result = mysqli_query($conn, $sql);
					while ($row_deliv = mysqli_fetch_assoc($result)) { ?> 
					<tr>
						<td><?=$row_deliv['delivery_id']?></td>
						<td><?=$row_deliv['address']?></td>
						<td><?php
							$city_id =$row_deliv['city_id'];
							$sql = "SELECT * FROM CITY WHERE city_id = '$city_id'";
							$result_city = mysqli_query($conn, $sql);
							$row_city = mysqli_fetch_assoc($result_city);
							echo $row_city['city_name'];
							?></td>
							<td><?php
								$province_id = $row_deliv['province_id'];
								$sql = "SELECT * FROM PROVINCE WHERE province_id = '$province_id'";
								$result_province = mysqli_query($conn, $sql);
								$row_province = mysqli_fetch_assoc($result_province);
								echo $row_province['province_name'];
								?></td>
								<td><?=$row_deliv['mobile_phone']?></td>
								<td><?=$row_deliv['home_phone']?></td>
								<td><?=$row_deliv['delivery_date']?></td>
								<td><?=$row_deliv['pickup_date']?></td>
								<td><?=$row_deliv['actual_delivery_charge']?></td>
								<td><?=$row_deliv['actual_pickup_charge']?></td>
								<td><?=$row_deliv['payment_note']?></td>
								<td><?=$row_deliv['note']?></td>
								<td><?=$row_deliv['baby_age']?></td>
								<td><?=$row_deliv['box_name']?></td>
								<td><a href="delivery_view?deliv_id=<?php echo $row_deliv['delivery_id']; ?>" target="_blank">Details</a></td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<?php 

					?>
				</div>
				<script>
					$(".nominal-number").change(function(){
						$value = $(this).val()
						if(!isNaN($value)){
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
					})
				</script>
				<?php
			}
		}
	}
	require('footer.php');
	?>