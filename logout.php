<?php
session_start();
if (session_destroy()) {
	# code...
	header("Location:login.php");
	exit;
}
?>