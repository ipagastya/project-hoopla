<!DOCTYPE html>
<?php
	session_start();
	require_once('login.php');
?>
<html>
<head>
	<title>Login - Hoopla Inventory System</title>
	<link rel="stylesheet" type="text/css" href="libs/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="libs/bootstrap/dist/css/bootstrap-theme.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="src/css/hooplastyle.css">
	<link rel="icon" type="image/png" href="src/images/mainan-smallest.png">
	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="libs/bootstrap//dist/js/bootstrap.min.js"></script>
</head>
<body class="index">
	<div class= "container-fluid">
		<div align= "center">
			<br>
			<center><img class="img-responsive" src="src/images/logo-1.png"></center>
			<img class="img-responsive align-center" src="src/images/invent.png">
			<div>
				<div class="row">
					<div class="col-sm-4 col-md-4">
					</div>
					<div class="col-sm-4 col-md-4" id="loginarea">
						<h3>Login</h3>
						<br>
						<form class="form" method="post" action="./index.php">
							<input type="text" class="form-control" name="id" placeholder="username"><br>
							<input type="password" class="form-control" name="password" placeholder="password"><br>
							<button  class="btn btn-primary" id="loginbutton" name="loginbutton" type="submit"><b>LOGIN</b></button>
						</form>
					</div>
					<div class="col-sm-4 col-md-4">
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
	
</html>