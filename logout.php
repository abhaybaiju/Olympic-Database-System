<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: ". "form1.php");
	exit;
?>