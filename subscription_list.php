<?php 
require('header.php');
if (!isset($_GET['page'])) {
	header("location: welcome");
}
?>
<div class="jumbotron">
	<br><br>
	<center><h2 class="leckerli">Subscription List</h2></center>
	<div class="container">
		<form class="form-horizontal collapse" id="form-filter" method="get" action="subscription_list">
			<input type="hidden" name="page" value="1" /> 
			<div class="form-group">
				<label class="control-label col-sm-3" for="start-date">Final Pickup Date :</label>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="start-date">Start Date</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="start-date" name="start-date">
				</div>
				<label class="control-label col-sm-3" for="end-date">End Date</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="end-date" name="end-date">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="name">Customer Name :</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="name" name="name">
				</div>
				<div class="col-sm-6"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="note">Payment Note :</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="note" name="note">
				</div>
				<div class="col-sm-6"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3" for="sub-plan">Subscription Plan :</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" id="sub-plan" name="sub-plan">
				</div>
				<label class="control-label col-sm-1" for="sub-plan">Month</label>
				<div class="col-sm-5"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-4"></div>
				<button class="greenbutton control-label col-sm-4" type="submit" name="filtersubmit" id="filtersubmit"><center>Submit</center></button>
				<div class="col-sm-4"></div>
			</div>
		</form>
		<br>
		<div align="right">
			<div class="btn-group" >
				<button class="filterbtn" data-toggle="collapse" data-target="#form-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
				<a href="subscription_create"><button class="addbutton" type="button"><span class="glyphicon glyphicon-plus"></span> Add Subscription</button></a>
			</div>
			
		</div>
	</div>
</div>
<div class= "container">
	<h4>Subscription Schedule</h4>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Customer's Name</th>
				<th>New/Ext</th>
				<th>Subscription Plan</th>
				<th>No of Toys / Month</th>
				<th>First Delivery Date</th>
				<th>Final Pick Up Date</th>
				<th>Payment Note</th>
				<th>Details</th>
			</tr>
			<?php
			include "config.php";
			$sql = "SELECT subs_id, cust_name, status, subs_plan, num_ofToys, first_deliv, final_pickup, payment_terms FROM SUBSCRIPTION AS S JOIN CUSTOMER AS C ON S.cust_id = C.cust_id ";
			if(isset($_GET['filtersubmit'])){
				$ada = false;
				$condition = "";
				$condition_date = "";
				$condition_customer = "";
				$condition_payment = "";
				$condition_plan = "";
				if(isset($_GET['start-date']) && $_GET['start-date']){
					$start_date = $_GET['start-date'];
					$condition_date = $condition_date."(final_pickup >= '$start_date')";
					$ada = true;
				}
				if (isset($_GET['end-date']) && $_GET['end-date']) {
					if ($ada) {
						$condition_date = $condition_date." AND ";
					}
					$end_date = $_GET['end-date'];
					$condition_date = $condition_date."(final_pickup <= '$end_date')";
				}
				if (isset($_GET['name']) && $_GET['name']) {
					if ($ada) {
						$condition_customer = $condition_customer." AND ";
					}
					$name = $_GET['name'];
					$condition_customer = "(cust_name LIKE '%$name%')";
					$ada = TRUE;
				}
				if (isset($_GET['note']) && $_GET['note']) {
					if ($ada) {
						$condition_payment = $condition_payment." AND ";
					}
					$payment = $_GET['note'];
					$condition_payment = "(payment_terms LIKE '%$payment%')";
					$ada = TRUE;
				}

				if (isset($_GET['sub-plan']) && $_GET['sub-plan']) {
					if ($ada) {
						$condition_plan = $condition_plan." AND ";
					}
					$plan = $_GET['sub-plan'];
					$condition_plan = "(subs_plan = '$plan')";
					$ada = TRUE;
				}

				if($ada){
					$condition = $condition." WHERE ".$condition_date.$condition_customer.$condition_payment.$condition_plan;
					$sql = $sql.$condition;
				}

			}
			$offset = ($_GET['page'] - 1) * 10;
			if (($result = mysqli_query($conn, "$sql LIMIT 10 OFFSET $offset")) === FALSE){
				echo "query failing";
			}
			else {
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) { ?>
					<tr>
						<td><?=$row['cust_name']?></td>
						<td><?=$row['status']?></td>
						<td>
							<?=$row['subs_plan']." Months"?>
						</td>
						<td><?=$row['num_ofToys']?></td>
						<td><?=$row['first_deliv']?></td>
						<td><?=$row['final_pickup']?></td>
						<td><?=$row['payment_terms']?></td>
						<td><a class='btn btn-default' href="subscription?page=1&subs_id=<?=$row['subs_id']?>">Details</a></td>
					</tr>
					<?php }
				}
			}
			$resultFull = mysqli_query($conn , $sql);
				// from content db
			?>
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
			if ($pageNow > 1) {
				$pageBefore = $pageNow - 1;
				if (isset($_GET['filtersubmit'])) {
					$start_date = $_GET['start-date'];
					$end_date = $_GET['end-date'];
					$name = $_GET['name'];
					$note=$_GET['note'];
					$sub_plan=$_GET['sub-plan'];
					echo "<li><a href='subscription_list?page=$pageBefore&start-date=$start_date&end-date=$end_date&name=$name&note=$note&sub-plan=$sub_plan&filtersubmit='>Previous</a></li>";
				}else{
					echo "<li><a href='subscription_list?page=$pageBefore'>Previous</a></li>";
				}
			}
			$x = 1;
			while ($count <= $pages && $x <= 5) {
				if (isset($_GET['filtersubmit'])) {
					$start_date = $_GET['start-date'];
					$end_date = $_GET['end-date'];
					$name = $_GET['name'];
					$note=$_GET['note'];
					$sub_plan=$_GET['sub-plan'];
					echo "<li><a href='subscription_list?page=$count&start-date=$start_date&end-date=$end_date&name=$name&note=$note&sub-plan=$sub_plan&filtersubmit='>$count</a></li>";
				}else{
					echo "<li><a href='subscription_list?page=$count'>$count</a></li>";
				}
				$count = $count + 1;
				$x = $x + 1;
			}
			if ($pageNow < $pages) {
				$pageNext = $pageNow + 1;
				if (isset($_GET['filtersubmit'])) {
					$start_date = $_GET['start-date'];
					$end_date = $_GET['end-date'];
					$name = $_GET['name'];
					$note=$_GET['note'];
					$sub_plan=$_GET['sub-plan'];
					echo "<li><a href='subscription_list?page=$pageNext&start-date=$start_date&end-date=$end_date&name=$name&note=$note&sub-plan=$sub_plan&filtersubmit='>Next</a></li>";
				}else{
					echo "<li><a href='subscription_list?page=$pageNext'>Next</a></li>";
				}
			}
			?>
		</ul>
	</div>
	</center>
</div>
<?php
require('footer.php');
?>