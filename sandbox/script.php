<?php include("../includes/page_top.php");?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<br><br><br><br><br><br>
<?php



// Set up JSON response per the API specs
$response = array();

$response["status_code"] = "_UNKNOWN";

if (mysqli_connect_errno()) {
	echo "_Connect-error";
} else {

	//$create = "CREATE TABLE Content (id int(2),url varchar(255));";
	//$result = "";
	//$result = mysqli_query($connection, $create);
/*
	$url = "https%3A%2F%2Fs-media-cache-ak0.pinimg.com%2F236x%2Fb6%2Fde%2F93%2Fb6de939e424d85887803c01ad1cd1cef.jpg";

	$query = "INSERT INTO Content (id, url) VALUES (1, '{$url}')";
	$res = mysqli_query($connection, $query);

	if ( !$res ) {
		echo "nope";
	} else {
		echo "we good?";
	}
*/


	$query = "SELECT * FROM Content";
	$res = mysqli_query($connection, $query);

	if ( !$res ) {
		echo "nope";
	} else {
		echo "we good?";
	}



/*	if ( !empty($_GET["inputLink"]) ) {
            	$url = urlencode($_GET["inputLink"]);
		echo urldecode($url);
		$response["status_code"] = $url;

	} else {
		$response["status_code"] = "_WHADDAFUCK";
	}
*/

	
}



?>

<?php include("../includes/page_bottom.php");?>

