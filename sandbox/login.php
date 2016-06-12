<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 

echo "hello";
$_SESSION["userid"] = "1";
echo "session userid = ".$_SESSION["userid"];
?>
