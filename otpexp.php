<?php
session_start();
include 'DatabaseConfig.php';
$email = $_SESSION["email"];
$con = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);
$flag = $_POST["flag"];
$sql2 = "DELETE FROM otp WHERE email = '$email'";
$sql = "DELETE FROM otp WHERE email = '$email' AND expired < (NOW() - INTERVAL 1 MINUTE)";
if($flag == 1)
{
$res1 = $con->query($sql);
}
else{
	$res1 = $con->query($sql2);
	sleep(3);
	header("Location:login.php");
	die();
}

mysqli_close($con);
?>