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
						<div class="col-sm-5">
							<input type="text" class="form-control" id="sub-promo" name="sub-promo" value="<?=$row['subs_promo']?>" required>
						</div>
						<div class="col-sm-3"></div>
					</div>
					<!--TODO: Price otomatis ke generate ketika subs plan dipilih and (subs promo on hold)-->
					<div class="form-group">
						<label class="control-label col-sm-4" for="sub-price">Subscription Price :</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="sub-price" name="sub-price" value="<?=$row['subs_price']?>" readonly>
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
									$.ajax({
										type: "POST",
										url: "select_plan.php",
										data: {plan: currentPlan,promo: currentPromo},
										success: function(response){
											$("#sub-price").val(response);
										}
									});
								});
							</script>
						</div>
						<div class="col-sm-1">
							<h4>Rupiah</h4>
						</div>
						<div class="col-sm-5"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="toypermonth">No of Toys/Month :</label>
						<div class="col-sm-5">
							<input type="number" class="form-control" id="toypermonth" name="toypermonth" value="<?=$row['num_ofToys']?>" required>
						</div>
						<div class="col-sm-3"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="first-deliv">First Delivery Date :</label>
						<div class="col-sm-5">
							<input type="date" class="form-control" id="first-deliv" name="first-deliv" value=<?php echo date('Y-m-d',strtotime($row['first_deliv'])) ?> required>
						</div>
						<div class="col-sm-3"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="deliv-promo">Delivery Promo :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="deliv-promo" name="deliv-promo" value="<?=$row['deliv_promo']?>" required>
						</div>
						<div class="col-sm-3"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="deliv-price">Delivery Price :</label>
						<div class="col-sm-5">
							<input type="number" class="form-control" id="deliv-price" name="deliv-price" value="<?=$row['deliv_price']?>" required>
						</div>
						<div class="col-sm-3"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="deposit">Deposit Amount :</label>
						<div class="col-sm-5">
							<input type="number" class="form-control" id="deposit" name="deposit" value="<?=$row['deposit']?>" required>
						</div>
						<div class="col-sm-3"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pay-term">Payment Terms :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="pay-term" name="pay-term" value="<?=$row['payment_terms']?>" required>
						</div>
						<div class="col-sm-3"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="refund-date">Deposit Refund Date :</label>
						<div class="col-sm-5">
							<input type="date" class="form-control" id="refund-date" name="refund-date" value=<?php echo date('Y-m-d',strtotime($row['deposit_refund'])) ?> required>
						</div>
						<div class="col-sm-3"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="deposit-status">Deposit Status :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="deposit-status" name="deposit-status" value="<?=$row['deposit_status']?>" required>
						</div>
						<div class="col-sm-3"></div>
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
				// isi dari database
						?>
					</table>
				</div>
				<?php 
			// pagination
				?>
			</div>

			<?php
		}
	}
}
require('footer.php');
?>