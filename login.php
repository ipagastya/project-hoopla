<?php
include "config.php";
if(isset($_POST['loginbutton'])){
    $username = $_POST['id'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT username, password FROM ADMIN WHERE username=? AND password=?");
    $stmt->bind_param('is', $username, $password);
    $stmt->execute();
    $stmt->bind_result($username, $password);
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
    {
      $_SESSION['username'] = $username;
      /*session for id admin*/
      $idAdmin = 0;
      $querySearchIdAdmin = "SELECT admin_id FROM ADMIN WHERE username = '$username'";
      $resultIDAdmin = mysqli_query($conn, $querySearchIdAdmin);
      while($rowIDAdmin = mysqli_fetch_row($resultIDAdmin)){
        $idAdmin = $rowIDAdmin[0];
      }
      $_SESSION['adminID'] = $idAdmin;
      /***************/
      echo"<script>document.location.href='welcome'</script>";
      exit();
    }
    else {
        if($username == "" && $password == ""){
          echo "<h5 id='errorLogin'><span class='glyphicon glyphicon-warning-sign'></span> Enter Username and Password</h5>";
        }else{
          echo "<h5 id='errorLogin'><span class='glyphicon glyphicon-warning-sign'></span> Username or Password is Incorrect</h5>";
        }
    }
    $stmt->close();
}
else 
{   

}
$conn->close();
?>