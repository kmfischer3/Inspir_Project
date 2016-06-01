<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 

// Set up JSON response per the API specs
$response = array();

$response["status_code"] = "_UNKNOWN";

if (mysqli_connect_errno()) {
	$response["status_code"] = "_SER";
} 
else {
$text = $_POST['inputText'];	
	if ( !empty($_GET["inputText"] ) {
		$response["status_code"] = "OK";
	} else {
		$response["status_code"] = "ERROR";	
	}
}

// Output pretty JSON
$json = json_encode($response);
echo $json;
?>
