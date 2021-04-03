<?php
include 'DatabaseConfig.php';
include 'session.php';
$email = $_POST["email"];
$con = new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);
$sql = "SELECT * FROM user WHERE email = '$email' ";
$res1 = $con->query($sql);
if(mysqli_num_rows($res1)!=0)
{
	echo "exists";
}
else{
	echo "de";
}
mysqli_close($con);
?>
