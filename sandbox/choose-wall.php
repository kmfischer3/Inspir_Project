<?php include("../includes/page_top.php");?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

if (mysqli_connect_errno()) {
	$response["status_code"] = "_SERVER-ERROR";
} else {

	if ( !empty($_GET["inputLink"]) ) {
            	$url = $_GET["inputLink"];
	}
}

mysql_close($connection);

?>

<div class="content container">
	<h3>Post preview:</h3>
	<div class="panel panel-default">
	  	<div class="panel-body">
			<div class="carousel slide">
				<div class="carousel inner">
					<div class="item active">
						<img class="img-responsive" src="<?php echo $url?>" alt="photo1">
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include("../includes/buttons-preview_page.html");?>

</div>

<?php include("../includes/page_bottom.php");?>

