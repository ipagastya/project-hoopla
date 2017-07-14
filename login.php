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