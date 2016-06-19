<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/configuration.php"); ?>

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
if ( !empty($_GET["optradio"]) ) {
	$radio = $_GET["optradio"];
} else {
	$radio = 'none';
}

	$search_terms = array(
						'career' => array('career','fierce','hard work','leadership'),
						'family' => array('family','love','parents','sibling'),
						'fun' => array('funny','hipster','colorful','quirky'),					
						'health' => array('run','health','athlete','yoga'),
						'meditation' => array('calm','meditate','buddha','mind'),	
						'religious' => array('religion','church','cross','satan'),
						'school' => array('school','brain','smart','pattern'),
						'none' => array('landscape','beautiful','pattern','magnificent')
					);


$rand = urlencode($search_terms[$radio][rand(0, 3)]);

$json = file_get_contents("https://pixabay.com/api/?key=".$API_KEY."&q=".$rand);

$result = json_decode($json, true);

echo '<div class="content container"><h2>Select an image:</h2><br>';
	$i = 0;
	foreach ($result["hits"] as $image) {
		if (++$i == 11) break;
		$params = "choose-wall.php?inputLink=".urlencode($image["webformatURL"])."&inputText=".urlencode($text);

		if ( !empty($_GET["optradio"]) ) {
			$params = $params."&optradio=".$_GET["optradio"];
		}

		//$params = urlencode($params);
		echo '<a href="'.$params.'" class="panel panel-default"><div class="panel-body"><div class="carousel slide"><div class="carousel inner"><div class="item active"><img class="img-responsive" src="';
		echo $image["webformatURL"];
		echo '" alt="photo1"><div class="carousel-caption"><h1>'.$text.'</h1></div></div></div></div></div></a>';
		//echo '<p><a href="#" type="button" class="btn btn-group-justified btn-default">choose ''</a></p><br><br>';
	}
echo '</div>';

?>

<?php include("../includes/page_bottom.php");?>
