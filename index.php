<?php
	session_start();
	if(isset($_SESSION['username'])){
		header("location: welcome");
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
	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="libs/bootstrap//dist/js/bootstrap.min.js"></script>
</head>
<body class="index">
	<div class= "container-fluid">
		<div align= "center">
			<center><img class="img-responsive" src="src/images/logo-1.png"></center>
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-md-4">
					</div>
					<div class="col-sm-4 col-md-4" id="loginarea">
						<h3 class="leckerli" id="title-header" style="background-color:#f1592a;color:#fff; padding: 10px 50px; border-top-left-radius: 10px; border-top-right-radius: 10px; margin-top: -60px;">Inventory System</h3>
						<h4>Login</h4>
						<br>
						<form class="form" method="post" action="./index">
							<input type="text" class="form-control" name="id" placeholder="username"><br>
							<input type="password" class="form-control" name="password" placeholder="password"><br>
							<button  class="btn btn-primary" id="loginbutton" name="loginbutton" type="submit"><b>LOGIN</b></button>
							<br>
						</form>
					</div>
					<div class="col-sm-4 col-md-4">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4"></div>
				<div class="col-sm-4 col-md-4">
					<center><div id="errorArea">
						<?php
							require_once('login.php');
						?>
					</div></center>
				</div>
				<div class="col-sm-4 col-md-4"></div>
			</div>
		</div>
	</div>
</body>
</html>