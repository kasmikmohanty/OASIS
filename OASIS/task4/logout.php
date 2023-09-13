<?php
session_start();
$_SESSION['loginstatus']=false;
$_SESSION['username']="";
$_SESSION['uid']="";
$_SESSION['type']="";
header("Location: index.html");
?>