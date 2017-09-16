<?php 

if(!isset($_GET['subs_id']) || !isset($_GET['page']) || !$_GET['page'] || !$_GET['subs_id']){
	header("location: subscription_list?page=1");
}else{
	require('header.php');
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
			<div class="jumbotron">
				<br><br>
				<center><h2 class="leckerli">Subscription</h2></center>
			</div>
			<div class= "container-fluid">
				<form class="form-horizontal" action="libs/editsubscription?subs_id=<?=$subs_id?>" method="POST">
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
					<div class="col-sm-2 radio">
						<label><input type="radio" value="trial" name="status" <?php if($row['status'] == 'trial'){ echo "checked";} ?>>Free Trial</label>
					</div>
					<div class="col-sm-2"></div>
				</div>
				<div class="form-group" id="plan-time">
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
				
				<div class="form-group">
					<label class="control-label col-sm-4" for="sub-price">Subscription Price :</label>
					<div class="col-sm-2">
						<input type="text" class="form-control nominal-number" id="sub-price" name="sub-price" value="<?=number_format($row['subs_price'],2)?>">
						<script src="libs/jquery/dist/jquery.min.js"></script>
					</div>
					<div class="col-sm-2">
						<h4>Rupiah / Month</h4>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="total-payment">Monthly Payment :</label>
					<div class="col-sm-2">
						<input type="text" class="form-control nominal-number" id="monthly-payment" name="monthly-payment" value="<?php
						$monthly = $row['subs_price'] + $row['deliv_price'];
						echo number_format("$monthly", 2);
						?>" readonly>
					</div>
					<div class="col-sm-2">
						<h4>Rupiah</h4>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="total-payment">Total Payment :</label>
					<div class="col-sm-2">
						<input type="text" class="form-control nominal-number" id="total-payment" name="total-payment" value="<?php
						$total_payment = ($row['subs_price'] + $row['deliv_price'])*$row['subs_plan'] - $row['subs_promo'];
						echo number_format("$total_payment", 2);
						?>" readonly>
					</div>
					<div class="col-sm-2">
						<h4>Rupiah</h4>
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
						<input type="date" class="form-control" id="refund-date" name="refund-date" value=<?php echo date('Y-m-d',strtotime($row['deposit_refund'])) ?>>
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
					<div class="col-sm-4">
						<button class="addbutton" type="submit"><span class="
							glyphicon glyphicon-ok"></span> Update</button>
						</div>
						<div class="col-sm-4"></div>
					</div>
				</form>
				<hr>
				<div align="right">
					<a href="delivery?cust_id=<?=$row['cust_id']?>&subs_id=<?=$subs_id?>" class="btn btn-primary addbutton"><span class="glyphicon glyphicon-plus"></span> Create Delivery</a>
				</div>
				<h4>Delivery Schedule</h4>
				<div class="table-responsive">
					<table class="table table-hover">
						<tr class="row">
							<div class="col-sm-3">
								<th>ID</th>
								<th>Address</th>
								<th>City</th>
							</div>
							<div class="col-sm-1">
								<th>Mobile Phone</th>
								<th>Home Phone</th>
							</div>
							<div class="col-sm-3">
								<th>Delivery Date</th>
								<th>Pick Up Date</th>
								<th>Baby's Age</th>
								<th>Box Name</th>
							</div>
							<th class="col-sm-5">Details of Delivery</th>
						</tr>
						<?php 
						$cust_id = $row['cust_id'];
						$sql = "SELECT * FROM DELIVERY_LIST WHERE cust_id = '$cust_id' ORDER BY delivery_id DESC";
						$offset = ($_GET['page'] - 1) * 10;
						$result = mysqli_query($conn, "$sql LIMIT 10 OFFSET $offset");
						$resultFull = mysqli_query($conn, $sql);

						while ($row_deliv = mysqli_fetch_assoc($result)) {
							$deliv_id = $row_deliv['delivery_id'];
							$sql_verify = "SELECT * FROM DELIVERY_TOYS WHERE delivery_id ='$deliv_id' AND verification = '0'";
							$result_verify = mysqli_query($conn, $sql_verify);
							$verified = true;
							if (mysqli_num_rows($result_verify)) {
								$verified = false;
							}
							?> 
							<tr class="row">
								<div class="col-sm-3">
									<td><?=$deliv_id?></td>
									<td><?=$row_deliv['address']?></td>
									<td><?php
										$city_id =$row_deliv['city_id'];
										$sql = "SELECT * FROM CITY WHERE city_id = '$city_id'";
										$result_city = mysqli_query($conn, $sql);
										$row_city = mysqli_fetch_assoc($result_city);
										echo $row_city['city_name']
										?>
									</td>
								</div>
								<div class="col-sm-1">
									<td><?=$row_deliv['mobile_phone']?></td>
									<td><?=$row_deliv['home_phone']?></td>
								</div>
								<div class="col-sm-3">
									<td><?=$row_deliv['delivery_date']?></td>
									<td><?=$row_deliv['pickup_date']?></td>
									<td><?=$row_deliv['baby_age']?></td>
									<td><?=$row_deliv['box_name']?></td>
								</div>
								<td class="row col-sm-5"><a class="btn btn-info col-sm-3" id='btn-toys' href="delivery_view?deliv_id=<?php echo $row_deliv['delivery_id']; ?>&subs_id=<?=$subs_id?>" target="_blank">Details</a>
									<div class="col-sm-1"></div>
									<?php if($row_deliv['status'] == 'rented' && $verified){ ?> 
									<a class="btn btn-warning col-sm-4" id='btn-toys' href="libs/return?deliv_id=<?php echo $row_deliv['delivery_id']; ?>&subs_id=<?=$subs_id?>">Return</a>
									<div class="col-sm-1"></div>
									<a class='btn btn-danger col-sm-3' id='btn-toys' href='libs/delete_delivery?deliv_id=<?=$deliv_id."&subs_id=".$subs_id ?>'><span class='glyphicon glyphicon-remove'></span> Delete</a>
									<?php }
									elseif ($verified == false) {
										echo "<button class='btn btn-danger col-sm-4' id='btn-toys' disabled>Not Verified</button>";
										echo '<div class="col-sm-1"></div>';
										echo "<a class='btn btn-danger col-sm-3' id='btn-toys' href='libs/delete_delivery?deliv_id=$deliv_id&subs_id=$subs_id'><span class='glyphicon glyphicon-remove'></span> Delete</a>";
									}
									else{
										echo "<button class='btn btn-warning col-sm-4' id='btn-toys' disabled>Returned</button>";
										echo '<div class="col-sm-4"></div>';
									} ?> 
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<center>
						<div>
							<ul class="pagination pagination-sm">
								<?php
								$rows = mysqli_num_rows($resultFull);
								$pages = 0;
								$pageNow = $_GET['page'];
								$count = $pageNow;
								if($rows <= 10) {
									$pages = 1;
								} else if (($rows % 10 ) == 0) {
									$pages = $rows / 10;
								} else {
									$pages = floor($rows / 10) + 1;
								}
								$x = 1;
								if ($pageNow > 1) {
									$pageBefore = $pageNow - 1;
									echo "<li><a href='subscription?page=$pageBefore&subs_id=$subs_id'>Previous</a></li>";
								}
								while ($count <= $pages && $x <= 5) {
									echo "<li><a href='subscription?page=$count&subs_id=$subs_id'>$count</a></li>";
									$count = $count + 1;
									$x = $x + 1;
								}
								if ($pageNow < $pages) {
									$pageNext = $pageNow + 1;
									echo "<li><a href='subscription?page=$pageNext&subs_id=$subs_id'>Next</a></li>";
								}
								?>
							</ul>
						</div>
					</center>
					<?php 

					?>
				</div>
				<script>
					$( document ).ready(function() {
						<?php if($row['status'] == 'trial'){ ?>
							$("#plan-time").hide();
							$("input[name=plan]:radio").prop("required", false);
							<?php } ?>
							$("input[name=status]:radio").change(function () {
								$status = $("input[name='status']:checked").val();
								if ($status != "trial") {
									$("#plan-time").show();
									$("input[name=plan]:radio").prop("required", true);
								}else{
									$("#plan-time").hide();
									$("input[name=plan]:radio").prop("required", false);
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
					})
					$("input[name=plan]:radio, #sub-promo, #deliv-price").change(function () {
						$("#sub-price").empty();
						$("#total-payment").empty();
						$('#monthly-payment').empty();
						var currentPlan = $("input[name='plan']:checked").val();
						var currentPromo = $('#sub-promo').val();
						currentPromo = currentPromo.replace(",","")
						var deliveryPrice = $('#deliv-price').val();
						deliveryPrice = deliveryPrice.replace(",","")
						if(isNaN(currentPlan)) currentPlan = 0;
						if(isNaN(currentPromo)) currentPromo = 0;

						$.ajax({
							type: "POST",
							url: "libs/select_plan.php",
							data: {plan: currentPlan,promo: currentPromo, deliv:deliveryPrice},
							success: function(response){
								$("#sub-price").val(response['price']);
								$("#total-payment").val(response['total']);
								$('#monthly-payment').val(response['monthly']);
							},
							dataType:"json"
						});
					});
				</script>
				<?php
			}
		}
	}
	require('footer.php');
	?>