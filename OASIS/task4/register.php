<?php
session_start();
$_SESSION['loginstatus']=false;
$_SESSION['username']="";
$_SESSION['uid']="";
$_SESSION['type']="";

$uname=$_POST["username"];
$pass=$_POST["password"];
$utype=$_POST["utype"];

$hash = password_hash($pass, PASSWORD_DEFAULT);
if($utype=="Customer"){
    $utype=1;
    $conn = new mysqli("localhost","root","","oasis_login");

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    $sql = "INSERT INTO user(user_type,username,password) VALUES ($utype,'$uname','$hash')";

if ($conn->query($sql) === TRUE) {
  echo "User Registered!";
  $_SESSION['username']=$uname;
  $_SESSION['type']="Customer";
  $_SESSION['loginstatus']=true;
  echo '<script type="text/javascript">alert("User Registered!")</script>';
  header("Location: index.html");



} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


}elseif($utype=="Seller"){
    $utype=2;
    $conn = new mysqli("localhost","root","","oasis_login");

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    $sql = "INSERT INTO user(user_type,username,password) VALUES ($utype,'$uname','$hash')";

if ($conn->query($sql) === TRUE) {
  echo "User Registered!";
  $_SESSION['username']=$uname;
  $_SESSION['type']="Seller";
  $_SESSION['loginstatus']=true;
  echo '<script type="text/javascript">alert("User Registered!")</script>';
  header("Location:index.html");



} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
  
}
else{
    die;
  }

?>