
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/page_top.php");?>

<?php

if (mysqli_connect_errno()) {
	$response["status_code"] = "_SERVER-ERROR";
} else {

	if ( !empty($_GET["inputLink"]) && !empty($_GET["inputText"]) ) {

        $url = urldecode($_GET["inputLink"]);
        $text = urldecode($_GET["inputText"]);
        $userid = 4;

        $query = "INSERT INTO posts (userid, image, text) VALUES ({$userid}, '{$url}', '{$text}');";
        echo "<br><br><br>".$query;
	} else {
		$response["status_code"] = "_INVALID_INPUT";
	}



	//TODO later
	if ( !empty($_GET["optradio"]) ) {
		// includes author if there is one
        //$text = $_GET["inputText"];
        //echo "text before decode: ".$_GET["inputText"]."<br>";
        $optradio = $_GET["optradio"];
        //echo "text after decode: ".$text;
	}
}

mysqli_close($connection);

?>


<?php include("../includes/page_bottom.php");?>