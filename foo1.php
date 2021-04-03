<?php

include 'DatabaseConfig.php';
session_start();
$id = $_SESSION["userid"];
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
$query1 ="DELETE FROM days WHERE id='$id'";
 mysqli_query($con,$query1);
 ?>
