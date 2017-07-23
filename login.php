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
    echo "<script>alert('Please enter your username and password');</script>";
  }
  if($username != "" || $password != ""){
    if($count == 1){
      $_SESSION['username'] = $username;
      header("location: welcome");
    }else{
      echo "<script>alert('The username or password you entered is incorrect');</script>";
    }
  }
}
?>