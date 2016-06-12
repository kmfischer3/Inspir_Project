<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 
	$_SESSION["userid"] = "1";
	echo "session user id = ".$_SESSION["userid"];
	header('Location: http://pages.cs.wisc.edu/~kristina/inspir_project/sandbox/index.php');
?>
