<?php
include "config.php";
if(isset($_POST['loginbutton'])){
    $username = $_POST['id'];
    $password = md5($_POST['password']);
    $user_id = 0;
    $status = "";

    $stmt = $conn->prepare("SELECT user_id, username, password, status FROM users WHERE username=? AND password=? LIMIT 1");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->bind_result($user_id, $username, $password, $status);
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
        {
            if($stmt->fetch()) //fetching the contents of the row
            {
               if ($status == 'd') {
                   echo "YOUR account has been DEACTIVATED.";
                   exit();
               } else {
                   $_SESSION['username'] = $username;
                   echo 'Success!';
                   exit();
               }
           }

    }
    else {
        echo "INVALID USERNAME/PASSWORD Combination!";
    }
    $stmt->close();
}
else 
{   

}
$conn->close();
/*$query = "SELECT username FROM admin";
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
      echo"<script>document.location.href='welcome'</script>";
    }else{
      echo "<h5 id='errorLogin'><span class='glyphicon glyphicon-warning-sign'></span> Username or Password is Incorrect</h5>";
      echo"<script>alert('Login Failed !');</script>";
    }
  }
}*/
?>