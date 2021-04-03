<?php
session_start();
include 'DatabaseConfig.php';
$con = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);
$otp = $_POST["otp"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$passwd = $_SESSION["passwd"];
$sql = "SELECT * FROM otp WHERE email = '$email' ";
$sql2 = "INSERT INTO user (name,email,passwd) VALUES ('$name','$email','$passwd')";
$res1 = $con->query($sql);
$row = $res1->fetch_assoc();
if($otp == $row["value"])
{
    mysqli_query($con,$sql2);
    //header("Location:login.html",TRUE);
   // die();
 }
 else{
 echo "invalid";
 }
 mysqli_close($con);   
?>