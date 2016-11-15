<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/configuration.php"); ?>

<?php include("../includes/page_top.php");?>

<?php

	echo "<br><br><br><br><br>";

	$popular_tags = array('landscape','beautiful','pattern','desert', 'animal', 'space', 'cute', 'flower', 'weather', 'art', 'abstract');
	//$current_tags = array('moon');
	$current_tags = array();

	$rand_keys = array_rand($popular_tags, 2);
	$rand_term1 = $popular_tags[$rand_keys[0]];
	$rand_term2 = $popular_tags[$rand_keys[1]];

	$get_pics = "https://pixabay.com/api/?key=".$API_KEY."&q=";

	if (sizeof($current_tags) > 0) {
		foreach ($current_tags as $tag) {
			$get_pics .= "+".$tag;
		}

		$get_pics .= "+".$rand_term1;
	} else {
		$get_pics .= "+".$rand_term1."+".$rand_term2;
	}

	echo "api call: ".$get_pics;
	$json = file_get_contents($get_pics);
	$result = json_decode($json, true);

	echo '<div class="content container"><h2>results:</h2><br>';
		$i = 0;
		foreach ($result["hits"] as $image) {
			if (++$i == 6) break;
			echo '<a href="#" class="panel panel-default"><div class="panel-body"><div class="carousel slide"><div class="carousel inner"><div class="item active"><img class="img-responsive" src="';
			echo $image["webformatURL"];
			echo '" alt="photo1"><div class="carousel-caption"></div></div></div></div></div></a>';
		}
	echo '</div>';

?>
<?php include("../includes/page_bottom.php");?>

