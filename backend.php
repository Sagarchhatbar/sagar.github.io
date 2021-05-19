<?php

error_reporting(0);
$conn = mysqli_connect('localhost','root','','basicbank') or die("Connection Failed");


if(isset($_POST['log1'])){
    session_start();
    $btnid=  $_POST["sysId"];
    $_SESSION['btnid']=$btnid;
}


 ?>