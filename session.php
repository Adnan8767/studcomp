<?php
session_start();
if (isset($_SESSION["userid"]) && $_SESSION["user"] === true ) {
	# code...
	header("Location:index.php");
	exit;
}?>