<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 

if ( !empty($_GET["login"]) && !empty($_GET["password"]) ) {
	$login = $_GET["login"];
	$password = $_GET["password"];

	$_SESSION["userid"] = "1";
	echo "session user id = ".$_SESSION["userid"];
	header('Location: http://pages.cs.wisc.edu/~kristina/inspir_project/sandbox/index.php');
} else {
	echo "fail";
}

?>
