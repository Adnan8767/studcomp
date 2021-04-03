<?php
sleep(4);
$loc = $_POST['loc'];
header("Location:$loc",true);
die();
?>