<?php 
	require_once("../includes/session.php");
	$_SESSION["userid"] = null;
	header('Location: index.php');
?>
	