<?php
include "config.php";
$query = "SELECT username FROM admin";
$result = mysqli_query($conn, $query);
if(isset($_POST["loginbutton"])){
  $username = $_POST["id"];
  $password = $_POST["password"];
  $query = "SELECT * FROM ADMIN WHERE username='".$username."'AND password='".$password."'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_row($result);
  $count = mysqli_num_rows($result);
  if($username == "" && $password == ""){
    echo "<h5 id='errorLogin'><span class='glyphicon glyphicon-warning-sign'></span> Enter Username and Password</h5>";
    echo"<script>alert('Login Failed !');</script>";
  }
  if($username != "" || $password != ""){
    if($count == 1){
      $_SESSION['username'] = $username;
      header("location: welcome");
    }else{
      echo "<h5 id='errorLogin'><span class='glyphicon glyphicon-warning-sign'></span> Username or Password is Incorrect</h5>";
      echo"<script>alert('Login Failed !');</script>";
    }
  }
}
?>