<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<div class="container">
	<a href="index.php"> Home</a>
</div>

<?php 

if ( !empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["password"])) {

	$login = $_POST["login"];
	$password = $_POST["password"];
	echo "<br>unhashed password: ".$password."<br>";
	$firstname = $_POST["firstname"];

	$response = array();
	$response["status_code"] = "_UNKNOWN";

	if (mysqli_connect_errno()) {
		$response["status_code"] = "_SER";
		//echo "error1";
	} else {
		//$login = mysqli::escape_string($login);
		$login = mysqli_real_escape_string($connection, $login);
		echo "<br>login: ".$login."<br>";
		//$password = mysqli::escape_string(password_hash($password, PASSWORD_DEFAULT));
		$password = mysqli_real_escape_string($connection, password_hash($password, PASSWORD_DEFAULT));
		echo "<br>hashed password: ".$password."<br>";
		//$firstname = mysqli::escape_string($firstname);
		$firstname = mysqli_real_escape_string($connection, $firstname);

		$query = "INSERT INTO users (login, password, firstname) vALUES ('{$login}', '{$password}', '{$firstname}');";
		$result = mysqli_query($connection, $query);
		if (!$result) {
			$response["status_code"] = "ERROR_INSERTING_NEW_USER";
		} else {
			echo "inserted id: ".$result;
			$response["status_code"] = "OK";
		}

	}

	// Output pretty JSON
	$json = json_encode($response);
	echo $json;
	mysql_close($connection);


} else {
	echo "All three fields are required.";
}

?>

	