<?php 
	require('header.php');
?>
<div class="jumbotron">
	<br><br>
	<center><h2 class="leckerli">Update Inventory Card</h2></center>
</div>
<div class="container">
	<form class="form-horizontal" method="post" action="./inventory_card_edit?id=<?=$_GET['id']?>&card=<?=$_GET['card']?>">
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
					<option value="Active">Active</option>
					<option value="Missing Parts">Missing Parts</option>
					<option value="Under Service">Under Service</option>
					<option value="Permanent Damaged">Permanent Damaged</option>
					<option value="Donated">Donated</option>
					<option value="Inactive">Inactive</option>
					<option value="Sold">Sold</option>
					<option value="Bali">Bali</option>
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
				glyphicon glyphicon-ok"></span> Update</button>
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
	$cardIDEdit = $_GET['card'];
	$query = "SELECT date,activity_id,Status,note,selling_price FROM INVENTORY_CARD WHERE card_id='$cardIDEdit'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_row($result);
	echo"
		<script>
			document.getElementById('dateCard').value='".$row[0]."';
			document.getElementById('activities').value='".$row[1]."';
			document.getElementById('statustext').value='".$row[2]."';
			document.getElementById('notes').value='".$row[3]."';
			document.getElementById('selling').value='".$row[4]."';
		</script>";
	if(isset($_POST['cardsubmit'])){
		$date = $_POST['dateCard'];
		$activities = $_POST['activities'];
		$status = $_POST['statustext'];
		$selling = $_POST['selling'];
		$notes = $_POST['notes'];
		$queryEdit = "UPDATE INVENTORY_CARD 
						SET date='$date',activity_id='$activities',Status='$status',note='$notes',selling_price='$selling' 
						WHERE card_id='$cardIDEdit'";
		$resultEdit=mysqli_query($conn,$queryEdit);
		date_default_timezone_set('Asia/Jakarta');
		$today_date = date('y-m-d H:i:s');
		$adminID = $_SESSION['adminID'];
		$updtmod = "UPDATE INVENTORY SET last_modified='$today_date', modified_by = '$adminID' WHERE product_code= '$product_code'";
		$resultMod=mysqli_query($conn,$updtmod);
		/***************/
		?>
		<script>alert('Edit Inventory Card Success');window.location.href='inventory?page=1&id=<?=$inventory_id?>';</script>";
		<?php
	}
?>
<?php 
	require('footer.php');
?>