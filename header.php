<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("location: index");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hoopla Inventory System</title>
	<link rel="stylesheet" type="text/css" href="libs/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="libs/bootstrap/dist/css/bootstrap-theme.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="src/css/hooplastyle.css">
	<link rel="icon" type="image/png" href="src/images/mainan-smallest.png">
	<link rel="stylesheet" href="libs/bootstrap-select-1.12.3/dist/css/bootstrap-select.min.css">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="welcome"><img class="img-responsive" src="src/images/logo-1.png" style="height:50px"></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<li id="custNav"><a href="customer_list?page=1">Customer</a></li>
				<li id="subsNav"><a href="subscription_list?page=1">Subscription</a></li>
				<li id="inventNav"><a href="inventory_list?page=1">Inventory</a></li>
             	<li id="reportNav" class="dropdown">	
			        <a class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;">Report
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu" id="drop">
			          <li id="subsreport"><a href="report_subscription">Subscription Report</a></li>
			          <li id="upreport"><a href="report_expiry">Upcoming Expiry Report</a></li>
			          <li id="delivreport"><a href="report_delivery">Delivery Report</a></li>
			          <li id="inventreport"><a href="report_inventory">Inventory Report</a></li>
			          <li id="pickupreport"><a href="report_pickup">Pick Up Report</a></li>
		       		</ul>
		      	</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a data-toggle="modal" data-target="#myModal" class="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        <div class="modal-body"><center>
	          <p>Are you sure want to logout Hoopla! Inventory System ?<br> Any unsaved data will be lost.</p></center>
	        </div>
	        <div class="modal-footer">
	        	<center>
	        	<div class="btn-group">
	        		<a href="logout.php"><button type="button" class="addbutton"><span class="glyphicon glyphicon-ok"></span> Yes</button></a>
	        		<button type="button" class="filterbtn" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
	        	</div>
	        	</center>
	        </div>
	      </div>
	    </div>
	</div>
	<br><br><br><br>
	<?php
		$dir = basename($_SERVER['SCRIPT_NAME']);
		if($dir == "customer_list.php"){
			echo"<script>document.getElementById('custNav').classList.toggle('active');</script>";
		}
		if($dir == "subscription_list.php"){
			echo"<script>document.getElementById('subsNav').classList.toggle('active');</script>";
		}
		if($dir == "payment.php"){
			echo"<script>document.getElementById('payNav').classList.toggle('active');</script>";
		}
		if($dir == "inventory_list.php"){
			echo"<script>document.getElementById('inventNav').classList.toggle('active');</script>";
		}
		if($dir == "report_subscription.php"){
			echo"<script>document.getElementById('subsreport').classList.toggle('active');</script>";
		}
		if($dir == "report_expiry.php"){
			echo"<script>document.getElementById('upreport').classList.toggle('active');</script>";
		}
		if($dir == "report_delivery.php"){
			echo"<script>document.getElementById('delivreport').classList.toggle('active');</script>";
		}
		if($dir == "report_inventory.php"){
			echo"<script>document.getElementById('inventreport').classList.toggle('active');</script>";
		}
		if($dir == "report_pickup.php"){
			echo"<script>document.getElementById('pickupreport').classList.toggle('active');</script>";
		}
		
	?>
