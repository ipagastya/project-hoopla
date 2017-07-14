<!DOCTYPE html>
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
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-md-4">
					</div>
					<div class="col-sm-4 col-md-4" id="loginarea">
						<h3>Hoopla Inventory System</h3>
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
	<?php
        include "config.php";
        $query = "SELECT username FROM admin";
        $result = pg_query($query);
        if(isset($_POST["loginbutton"])){
        	$username = $_POST["id"];
            $password = $_POST["password"];
            $query = "SELECT * FROM admin WHERE username='".$username."'AND password='".$password."'";
            $result = pg_query($query);
            $row = pg_fetch_row($result);
            $count = pg_num_rows($result);
            if($username == "" || $password == ""){
                echo "<script>alert('Harap Isi Username atau Password');</script>";
            }
            if($username != "" || $password != ""){
               if($count == 1){
               		header("location: welcome.php ");
               }else{
               		echo "<script>alert('Username tidak terdaftar');</script>";
               }
            }
        }
    ?>
</body>
	
</html>