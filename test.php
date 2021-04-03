<?php
include 'DatabaseConfig.php';
session_start();
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
$aray = $_POST["aray"];
$id = $_SESSION["userid"];
$j = json_decode($aray,true);
$count =  count($j);
for ($i = 0;$i<$count;$i++)
{
	$time = $j[$i]['time'];
	$mon = $j[$i]['mon'];
	$tue = $j[$i]['tue'];
	$wed = $j[$i]['wed'];
	$thur = $j[$i]['thur'];
	$fri = $j[$i]['fri'];
	$sat = $j[$i]['sat'];
	$sql = "INSERT  INTO days(id,timee,mon,tue,wed,thur,fri,sat) VALUES ('$id','$time','$mon','$tue','$wed','$thur','$fri','$sat')";
	$result = mysqli_query($con,$sql);
}
?>
