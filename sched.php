<?php
include 'DatabaseConfig.php';
session_start();
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
$id = $_SESSION["userid"];
$flag = $_POST["flag"];
if($flag == 0)
{
	$query1 ="DELETE FROM schedule WHERE uid = '$id' ";
 	mysqli_query($con,$query1);
}
elseif ($flag==1) {
	$title = $_POST["title"];
	$desc = $_POST["desc"];
	$time = $_POST["timee"];
	$prog = $_POST["prog"];
	$query1 = "INSERT INTO schedule(uid,title,descc,`time`,prog) VALUES ('$id','$title','$desc','$time','$prog')";
	mysqli_query($con,$query1);
	echo "Saved";
}
elseif ($flag==2)
{
	$prog = $_POST["prog"];
	$query1 = "UPDATE TABLE schedule WHERE uid='$id' SET prog = '$prog'";
	mysqli_query($con,$query1);
}
mysqli_close($con);
?>