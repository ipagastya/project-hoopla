<?php 
	require('header.php');
?>
<div class="jumbotron">
	<br><br>
	<center><h2 class="leckerli">Update Inventory Card</h2></center>
</div>
<div class="container">
	<form class="form-horizontal" method="post" action="./inventory_card?id=<?=$_GET['id']?>">
		<!-- helper div to insert product code to database-->
		<div class="form-group" style="display:none;">
			<label class="control-label col-sm-3" for="prodcode">Product Code :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="prodcode" name="prodcode">
			</div>
			<div class="col-sm-4"></div>
		</div>
		<!--=====================================================================-->
		<div class="form-group">
			<label class="control-label col-sm-3" for="date">Date :</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="dateCard" name="dateCard">
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="activities">Activities :</label>
			<div class="col-sm-5">
				<select class="form-control" id="activities" name="activities">
				<?php
					include "config.php";
					$query = "SELECT * FROM INVENTORY_ACTIVITY";
					$result = mysqli_query($conn,$query);
					while($row = mysqli_fetch_row($result))
					{
						echo "<option value='".$row[0]."'>".$row[1]."</option>";
					}
				?>
				</select>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="status">Status :</label>
			<div class="col-sm-5">
				<!--input type="text" class="form-control" id="statustext" name="statustext"-->
				<select class="form-control" id="statustext" name="statustext">
					<option>Active</option>
					<option>Missing Parts</option>
					<option>Under Service</option>
					<option>Permanent Damaged</option>
					<option>Donated</option>
					<option>Inactive</option>
					<option>Sold</option>
					<option>Bali</option>
				</select>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="selling">Selling Price :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="selling" name="selling">
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="notes">Notes :</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="notes" name="notes">
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<button class="addbutton" type="submit" name ="cardsubmit" id="cardsubmit"><span class="
				glyphicon glyphicon-ok"></span> Submit</button>
			</div>
			<div class="col-sm-6"></div>
		</div>
	</form>
	<br>
	<br>
</div>
<?php
	include "config.php";
	$inventory_id = $_GET['id'];
	$queryhelper = "SELECT product_code FROM INVENTORY WHERE inventory_id = $inventory_id";
	$resulthelper = mysqli_query($conn,$queryhelper);
	$rowhelper = mysqli_fetch_row($resulthelper);
	$product_code = $rowhelper[0];
	echo"
		<script>
			document.getElementById('prodcode').value='".$product_code."';
		</script>";
	if(isset($_POST['cardsubmit'])){
		$inventory_id = $_GET['id'];
		$product_code = $_POST['prodcode'];
		$date = $_POST['dateCard'];
		$activities = $_POST['activities'];
		$status = $_POST['statustext'];
		$selling = $_POST['selling'];
		$notes = $_POST['notes'];
		$query="INSERT INTO INVENTORY_CARD(product_code,date,activity_id,Status,note,selling_price) VALUES('$product_code','$date','$activities','$status','$notes','$selling')";
		$result=mysqli_query($conn,$query);
		/*for last modified*/
		date_default_timezone_set('Asia/Jakarta');
		$today_date = date('y-m-d H:i:s');
		$adminID = $_SESSION['adminID'];
		$updtmod = "UPDATE INVENTORY SET last_modified='$today_date', modified_by = '$adminID' WHERE product_code= '$product_code'";
		$resultMod=mysqli_query($conn,$updtmod);
		/***************/
		?>
		<script>alert('Successfully Updated Inventory Card');window.location.href='inventory?page=1&id=<?=$inventory_id?>';</script>";
		<?php
	}
?>
<?php 
	require('footer.php');
?>