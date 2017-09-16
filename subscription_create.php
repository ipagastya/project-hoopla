<?php
require_once("header.php");
require_once("config.php");
?>
<div class="jumbotron create">
	<br><br>
	<center><h2 class="leckerli">Create Subscription</h2></center>
</div>
<div class="container">
	<form class="form-horizontal" id="form" action="libs/insertsubscription.php" method="POST">
		<div class="form-group">
			<label class="control-label col-sm-4" for="customerName">Customer Name :</label>
			<div class="col-sm-5">
				<select class="form-control selectpicker" data-live-search="true" id="customerName" name="customerName" required>
					<option value=''>Select Customer</option>
					<?php
					$sql_customer = "SELECT cust_id, cust_name FROM CUSTOMER";
					if(($result_customer = mysqli_query($conn, $sql_customer)) === FALSE){
						echo "query failing, can't retrieve data";
					}
					else{
						while ($row = mysqli_fetch_assoc($result_customer)) { ?>
						<option value="<?=$row['cust_id']?>"><?=$row['cust_name']?></option>
						<?php }
					}
					?>
				</select>
			</div>
			<div class="col-sm-3" id="error-name"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="status">Subscription Type :</label>
			<div class="col-sm-2 radio">
				<label><input type="radio" value="new" name="status" required>New</label>
			</div>
			<div class="col-sm-2 radio">
				<label><input type="radio" value="extension" name="status">Extension</label>
			</div>
			<div class="col-sm-2 radio">
				<label><input type="radio" value="trial" name="status">Free Trial</label>
			</div>
			<div class="col-sm-1" id="error-name"></div>
			<div class="col-sm-1"></div>
		</div>
		<div class="form-group" id="plan-time">
			<label class="control-label col-sm-4" for="plan">Subscription Plan :</label>
			<div class="col-sm-2 radio">
				<label><input type="radio" value="1" name="plan" required>1 Month</label>
			</div>
			<div class="col-sm-2 radio">
				<label><input type="radio" value="3" name="plan">3 Months</label>
			</div>
			<div class="col-sm-2 radio">
				<label><input type="radio" value="6" name="plan">6 Months</label>
			</div>
			<div class="col-sm-2" id="error-name"></div>
			<?php
			$subs_type = "3 Months";
			?>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="sub-promo">Subscription Promo :</label>
			<div class="col-sm-2">
				<input type="text" class="form-control nominal-number" id="sub-promo" name="sub-promo" value="0" required>
			</div>
			<div class="col-sm-2">
				<h4>Rupiah</h4>
			</div>
			<div class="col-sm-3" id="error-name"></div>
			<div class="col-sm-1"></div>
		</div>
		<!--TODO: Price otomatis ke generate ketika subs plan dipilih and (subs promo on hold)-->
		<div class="form-group">
			<label class="control-label col-sm-4" for="sub-price">Subscription Price :</label>
			<div class="col-sm-2">
				<input type="text" class="form-control nominal-number" id="sub-price" name="sub-price" value="0.00">
				<?php
	          //  require("config.php");
	          //  $query = "SELECT st.price FROM subscription_type st WHERE st.type = " + $subs_type;
	          //  $result = "guna";//mysqli_query($conn, $query);
	          //  echo $result
				?>
			</div>
			<div class="col-sm-2">
				<h4>Rupiah / Month</h4>
			</div>
			<div class="col-sm-3" id="error-name"></div>
			<div class="col-sm-1"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="total-payment">Monthly Payment :</label>
			<div class="col-sm-2">
				<input type="text" class="form-control nominal-number" id="monthly-payment" name="monthly-payment" value="0.00" readonly>
			</div>
			<div class="col-sm-2">
				<h4>Rupiah</h4>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="total-payment">Total Payment :</label>
			<div class="col-sm-2">
				<input type="text" class="form-control nominal-number" id="total-payment" name="total-payment" value="0.00" readonly>
			</div>
			<div class="col-sm-2">
				<h4>Rupiah</h4>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="toypermonth">No of Toys/Month :</label>
			<div class="col-sm-2">
				<input type="number" class="form-control" id="toypermonth" name="toypermonth" value="0" required>
			</div>
			<div class="col-sm-3" id="error-name"></div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="first-deliv">First Delivery Date :</label>
			<div class="col-sm-2">
				<input type="date" class="form-control" id="first-deliv" name="first-deliv" required>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="deliv-promo">Delivery Promo :</label>
			<div class="col-sm-2">
				<input type="text" class="form-control nominal-number" id="deliv-promo" value="0" name="deliv-promo" required>
			</div>
			<div class="col-sm-2">
				<h4>Rupiah</h4>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="deliv-price">Delivery Price :</label>
			<div class="col-sm-2">
				<input type="text" class="form-control nominal-number" id="deliv-price" value="0" name="deliv-price" required>
			</div>
			<div class="col-sm-2">
				<h4>Rupiah</h4>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="deposit">Deposit Amount :</label>
			<div class="col-sm-2">
				<input type="text" class="form-control nominal-number" id="deposit" value="0" name="deposit" required>
			</div>
			<div class="col-sm-2">
				<h4>Rupiah</h4>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="pay-term">Payment Terms :</label>
			<div class="col-sm-2 radio">
				<label><input type="radio" value="Upfront" name="pay-term" required>Upfront</label>
			</div>
			<div class="col-sm-2 radio">
				<label><input type="radio" value="Monthly" name="pay-term">Monthly</label>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="refund-date">Deposit Refund Date :</label>
			<div class="col-sm-2">
				<input type="date" class="form-control" id="refund-date" name="refund-date">
			</div>
			<div class="col-sm-6"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="deposit-status">Deposit Status :</label>
			<div class="col-sm-2">
				<select class="form-control selectpicker show-tick" id="deposit-status" name="deposit-status" required>
					<option value="Waiting">Waiting</option>
					<option value="Paid" disabled>Paid</option>
					<option value="Cancelled" disabled>Cancelled</option>
					<option value="Extended" disabled>Extended</option>
					<option value="Refunded" disabled>Refunded</option>
					<option value="Refunded-Partially" disabled>Refunded-Partially</option>
					<option value="Void" disabled>Void</option>
				</select>
			</div>
			<div class="col-sm-6"></div>
		</div>
		<br>
		<div class="form-group">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<button class="addbutton" type="submit" id="submit"><span class="
					glyphicon glyphicon-ok"></span> Submit</button>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</form>
	</div>
	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script>
		$( document ).ready(function() {
			$("#plan-time").hide();
			$("input[name=plan]:radio").prop("required", false);
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
			$value = $(this).val();
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
		$("#submit").click(function(){
			if($("#customerName").val == ""){

			}
		});
		$("input[name=plan]:radio, #sub-promo, #deliv-price, #customerName").change(function () {
			$customer = $("#customerName").val();
			var deliv_promo = 0;
			if(isNaN(deliv_promo)) deliv_promo = 0;
			$.ajax({
				type: "POST",
				data: {customer: $customer, promo: deliv_promo},
				url: "libs/deliv_price.php",
				success: function(response){
					$("#deliv-price").val(response);
					$("#sub-price").empty();
					$("#total-payment").empty();
					$('#monthly-payment').empty();
					var currentPlan = $("input[name='plan']:checked").val();
					var currentPromo = $('#sub-promo').val();
					currentPromo = currentPromo.replace(",","")
					var deliveryPrice = $('#deliv-price').val();
					deliveryPrice = deliveryPrice.replace(",","")
					alert(deliveryPrice);
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
				}
			});
			
		});

	</script>

	<?php
	require_once("footer.php")
#sdsd
	?>