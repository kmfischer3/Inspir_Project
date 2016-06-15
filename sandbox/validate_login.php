<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 

if ( !empty($_GET["login"]) && !empty($_GET["password"]) ) {

	$login = $_GET["login"];
	$password = $_GET["password"];

	$response = array();
	$response["status_code"] = "_UNKNOWN";

	if (mysqli_connect_errno()) {
		$response["status_code"] = "_SER";
	} else {
		$query = "SELECT password FROM Users WHERE login = '{$login}';";
		$result = mysqli_query($connection, $query);
		if (!$result) {
			$response["status_code"] = "_SQL_ERROR_OR_WRONG_LOGIN";
		} else {
			
			if ($password == $result) {

				$query2 = "SELECT id FROM Users WHERE login = '{$login}';";
				$id = mysqli_query($connection, $query2);
				$_SESSION["userid"] = "{$id}";
				//header('Location: http://pages.cs.wisc.edu/~kristina/inspir_project/sandbox/index.php');
				$response["status_code"] = "OK";

			} else {
				$response["status_code"] = "INCORRECT_PASSWORD";
			}

		}	
	}

	// Output pretty JSON
	$json = json_encode($response);
	echo $json;
	mysql_close($connection);


} else {
	echo "fail";
}

?>
	