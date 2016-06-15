<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php 

if ( !empty($_GET["login"]) && !empty($_GET["password"]) ) {
	$login = $_GET["login"];
	$password = $_GET["password"];


	if (mysqli_connect_errno()) {
		echo "_SER error";
	} else {
		$query = "SELECT password FROM Users WHERE login='{$login}';";
		$result = mysqli_query($connection, $query);
		if (!$result) {
			echo = "_SQL error";
		} else {
			if ($password == $result) {
				$id_query = "SELECT id FROM Users WHERE login='{$login}';";
				$id = mysqli_query($connection, $id_query);
				$_SESSION["userid"] = "{$id}";
				//header('Location: http://pages.cs.wisc.edu/~kristina/inspir_project/sandbox/index.php');		
				echo "worked";		
			}
		}	
	}

} else {
	echo "fail";
}

?>
