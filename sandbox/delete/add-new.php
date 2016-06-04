<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php include("../includes/page_top.php");?>


<?php

$text = "";
if ( !empty($_GET["inputText"]) ) {
	$text = $_GET["inputText"];
}

?>

<div class="content container">
	<div class="panel panel-default">
	  	<div class="panel-body">
		<div class="carousel slide">
			<div class="carousel inner">
				<div class="item active">
					<img class="img-responsive" src="https://upload.wikimedia.org/wikipedia/commons/5/58/Sunset_2007-1.jpg" alt="photo1">
					<div class="carousel-caption">
						<h1><?php echo $text?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("../includes/page_bottom.php");?>
