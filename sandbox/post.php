<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php

if (mysqli_connect_errno()) {
	$response["status_code"] = "_SERVER-ERROR";
} else {

	if ( !empty($_POST["inputLink"]) && !empty($_POST["inputText"]) ) {

        $url = urldecode($_POST["inputLink"]);
        $text = $login = mysqli_real_escape_string($connection, urldecode($_POST["inputText"]));
        $userid = $_SESSION["userid"];

        $query = "INSERT INTO posts (userid, image, text) VALUES ({$userid}, '{$url}', '{$text}');";

		$result = mysqli_query($connection, $query);
		if (!$result) {
			$response["status_code"] = "ERROR_POSTING";
		} else {
			//echo "inserted result: ".$result;
			$response["status_code"] = "OK";
			header('Location: /~kristina/inspir_project/sandbox/index.php');
		}

	} else {
		$response["status_code"] = "_INVALID_INPUT";
	}


	//TODO later
	if ( !empty($_POST["optradio"]) ) {
		// includes author if there is one
        //$text = $_GET["inputText"];
        //echo "text before decode: ".$_GET["inputText"]."<br>";
        $optradio = $_POST["optradio"];
        //echo "text after decode: ".$text;
	}
}

mysqli_close($connection);

?>