<!DOCTYPE html>
<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("location: index.php ");
	}
?>
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
				<li><a href="customer_list">Customer</a></li>
				<li><a href="subscription_list">Subscription</a></li>
				<li><a href="#">Payment</a></li>
				<li><a href="inventory_list">Inventory</a></li>
                		<li><a href="report">Report</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav>

	<!--ghost navbar-->
	<nav class="navbar navbar-default navbar-relative" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand">Hoopla Inventory System</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="#">Customer</a></li>
				<li><a href="#">Subscription</a></li>
				<li><a href="#">Payment</a></li>
				<li><a href="#">Inventory</a></li>
                <li><a href="#">Report</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav>
