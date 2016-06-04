<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php include("../includes/page_top.php");?>


<?php
//old verion: add-new.php


$text = "";
if ( !empty($_GET["inputText"]) ) {
	$text = $_GET["inputText"];
}
if ( !empty($_GET["inputAuthor"]) ) {
	$author = $_GET["inputAuthor"];
	$text = $text.'<br><small class="pull-right">-'.$author.'</small>';
}

//some algorithm to find image url
$url1 = "https://upload.wikimedia.org/wikipedia/commons/5/58/Sunset_2007-1.jpg";
$url2 = "http://rappingmanual.com/wp-content/uploads/2013/02/Motivate-self.jpg";
$url3 = "http://img2.10bestmedia.com/Images/Photos/96123/captiva-beach-captiva_54_990x660_201404211817.jpg";
?>

<div class="content container">
	<div class="panel panel-default">
	  	<div class="panel-body">
		<div class="carousel slide">
			<div class="carousel inner">
				<div class="item active">
					<img class="img-responsive" src="<?php echo $url1?>" alt="photo1">
					<div class="carousel-caption">
						<h1><?php echo $text?></h1>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

	<div class="panel panel-default">
	  	<div class="panel-body">
		<div class="carousel slide">
			<div class="carousel inner">
				<div class="item active">
					<img class="img-responsive" src="<?php echo $url2?>" alt="photo2">
					<div class="carousel-caption">

						<h1><?php echo $text?></h1>

					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

	<div class="panel panel-default">
	  	<div class="panel-body">
		<div class="carousel slide">
			<div class="carousel inner">
				<div class="item active">
					<img class="img-responsive" src="<?php echo $url3?>" alt="photo3">
					<div class="carousel-caption">
						<h1><?php echo $text?></h1>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<?php include("../includes/page_bottom.php");?>
