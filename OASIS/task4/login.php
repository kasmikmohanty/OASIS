<?php
session_start();
$_SESSION['loginstatus']=false;
$_SESSION['username']="";
$_SESSION['type']="";
$_SESSION['uid']="";
$uname=$_POST["username"];
$pass=$_POST["password"];
$utype=$_POST["utype"];

// $verify = password_verify($plaintext_password, $hash);
  
// // Print the result depending if they match
// if ($verify) {
//     echo 'Password Verified!';
// } else {
//     echo 'Incorrect Password!';
// }


if($utype=="Customer"){
  $type=1;

  $conn = new mysqli("localhost","root","","oasis_login");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  $sql = "SELECT user_id,user_type, username, password FROM user where username= '$uname' and user_type=1 ";
  $result = $conn->query($sql);
  
if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc();
      echo "<br> id: ". $row["user_type"]. " - Name: ". $row["username"]. " " . $row["password"] . "<br>";
  $verify = password_verify($pass, $row["password"]);
  
// Print the result depending if they match
    if ($verify) {

        echo 'Password Verified!';
        echo "Welcome $uname";
        $_SESSION['username']=$uname;
        $_SESSION['type']="Customer";
        $_SESSION['loginstatus']=true;
        $_SESSION['uid']=$row["user_id"];
        header("Location: home.php");

    } else {
        // echo 'Incorrect Password!';
        // echo '<script type="text/javascript">alert("Incorrect Password!");history.go(-1);</script>';

    }

} else {
  echo '<script type="text/javascript">alert("User not Registered!");history.go(-1);</script>';
}
 

}elseif($utype=="Seller"){
  $type=2;

  $conn = new mysqli("localhost","root","","oasis_login");

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  $sql = "SELECT user_id,user_type, username, password FROM user where username= '$uname' and user_type=2 ";
  $result = $conn->query($sql);
  
if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc();
      // echo "<br> id: ". $row["user_type"]. " - Name: ". $row["username"]. " " . $row["password"] . "<br>";
  $verify = password_verify($pass, $row["password"]);
  
// Print the result depending if they match
    if ($verify) {
      
        echo 'Password Verified!';
        echo "Welcome $uname";
        $_SESSION['username']=$uname;
        $_SESSION['type']="Seller";
        $_SESSION['loginstatus']=true;
        $_SESSION['uid']=$row["user_id"];
        header("Location: home.php");


    } else {
        // echo 'Incorrect Password!';
        // echo '<script type="text/javascript">alert("Incorrect Password!");history.go(-1);</script>';

    }

} else {
  echo '<script type="text/javascript">alert("User not Registered!");history.go(-1);</script>';
}
 



}else{
  die;
}

// if($uname=="Atharva" && $pass=="athu"){
//     echo "Login Successfull!";
//     if(!isset($_COOKIE["user"])) {
//         // echo "Cookie named '" . $cookie_name . "' is not set!";
//         setcookie("user",$uname, time() + (86400 * 30), "/");
//         echo("Cookie set!");
//       }
// }else{
//     echo "Login Failed!";

// }
?>


// <?php
// $cookie_name="user";
// if(!isset($_COOKIE[$cookie_name])) {
//   echo "Cookie named '" . $cookie_name . "' is not set!";
// } else {
// //   echo "Cookie '" . $cookie_name . "' is set!<br>";
//   echo "Value is: " . $_COOKIE[$cookie_name];
// }
// ?>