<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/page_top.php");?>
<?php
echo "<br><br><br><br>";
if (mysqli_connect_errno()) {
	$response["status_code"] = "_SERVER-ERROR";
} else {

	if ( !empty($_GET["inputLink"]) ) {
		//echo "link before decode: ".$_GET["inputLink"]."<br>";
        $url = urldecode($_GET["inputLink"]);
        //echo "link after decode: ".$url."<br>";
	}
	if ( !empty($_GET["inputText"]) ) {
		// includes author if there is one
        //$text = $_GET["inputText"];
        //echo "text before decode: ".$_GET["inputText"]."<br>";
        $text = urldecode($_GET["inputText"]);
        //echo "text after decode: ".$text;
	}
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

<div class="content container">
	<div class="page-header">
		<h2>Preview:</h2>
		<div class="panel panel-default"><div class="panel-body"><div class="carousel slide"><div class="carousel inner"><div class="item active"><img class="img-responsive" src="<?php echo $url; ?>" alt="preview"><div class="carousel-caption"><h1><?php echo $text; ?></h1></div></div></div></div></div></div>
	</div>

	<h3>Post to Wall(s)</h3>
	<form role="form" method="post" action="post.php">
				<input type="hidden" name="inputLink" value="<?php echo urlencode($url); ?>">
				<input type="hidden" name="inputText" value="<?php echo urlencode($text); ?>">
				<input type="hidden" name="optradio" value="<?php echo $optradio; ?>">

				<div class="form-group input-group-lg">
					<label for="checkbox">Users:</label>	
					<div class="checkbox">
						  <label><input type="checkbox" value="true" id="kfischer" name="kfischer">kfischer</label>
					</div>
					<div class="checkbox">
						  <label><input type="checkbox" value="true" id="test" name="test">test</label>
					</div>
			    </div>

				<input class="btn-lg btn-success pull-right" type="submit" value="Post!">
		
	</form>

</div> 

<?php include("../includes/page_bottom.php");?>

