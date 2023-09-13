<?php
session_start();
if(!isset($_SESSION['loginstatus'])){
    echo "Illegal Attempt!, Please Singin to continue.";
    die;
    
}

if($_SESSION['loginstatus']==false){
    echo "UnAuthorized!, Please Singin to continue.";
    die;
    
}




?>