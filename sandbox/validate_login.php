<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 

if ( !empty($_POST["login"]) && !empty($_POST["password"]) ) {

	$login = $_POST["login"];
	$password = $_POST["password"];
	//$password = mysqli_real_escape_string($connection, password_hash($password, PASSWORD_DEFAULT));

	$response = array();
	$response["status_code"] = "_UNKNOWN";

	if (mysqli_connect_errno()) {
		$response["status_code"] = "_SER";
		//echo "error1";
	} else {
		$query = "SELECT id,password FROM users WHERE login = '{$login}';";
		$return = mysqli_query($connection, $query);
		$result = mysqli_fetch_assoc($return);
		//echo "<br>result from sql: ".$result['password']."<br>";
		if (!$result) {
			//echo "error2";
			$response["status_code"] = "_SQL_ERROR_OR_WRONG_LOGIN";
			header('Location: login.php?access_denied=1');
		} else {
			//echo "password entered: ".$password."<br>password from db: ".$result;
			if (password_verify($password, $result['password'])) {

				//$query2 = $result['id'];
				$id = $result['id'];
				$_SESSION["userid"] = $id;
				//echo "<br>session userid = ".$_SESSION["userid"]."<br>";
				header('Location: index.php');
				$response["status_code"] = "OK";

			} else {
				$response["status_code"] = "INCORRECT_PASSWORD";
				header('Location: login.php?access_denied=1');
			}

		}	
	}

	// Output pretty JSON
	$json = json_encode($response);
	//echo $json;
	mysqli_close($connection);


} else {
	echo "login and password required";
}

?>
	