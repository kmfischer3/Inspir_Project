<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/configuration.php"); ?>

<?php include("../includes/page_top.php");?>

<?php
	echo "<br><br><br><br><br>";


	$text_array = ['meaning', 'life', 'find', 'gift', 'purpose', 'give'];
	$text = 'the meaning of life is to find your gift; the purpose of life is to give it away';

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

	$rand = rand(0, 3);
	//$rand_all = rand(0, 7);
	$search_term = urlencode($search_terms['none'][$rand]);

	$json = file_get_contents("https://pixabay.com/api/?key=".$API_KEY."&q=".$word);
	$new_search_json = json_decode($json, true);

	$max_results = 100;

	foreach ($text_array as $word) {
		echo $word."<br>";
		$random_term = urlencode($search_terms['none'][$rand]);
		$json = file_get_contents("https://pixabay.com/api/?key=".$API_KEY."&q=".$word."+".$random_term);

		$result = json_decode($json, true);

		if ($result["total"] > $max_results){
			echo "https://pixabay.com/api/?key=".$API_KEY."&q=".$word."+".$random_term;
			$search_term = urlencode($word);
			$new_search_json = $result;
			$max_results = $result["total"];
			echo "--> total_hits = ".$max_results."<br>";
		}
	}

	// At this point, search_term is either the "best" word from the input string, or a fallback from $search_terms array
	echo "'best' chosen search term= ".$search_term."<br>";

	//$json = file_get_contents("https://pixabay.com/api/?key=".$API_KEY."&q=".$search_term);
	//echo "https://pixabay.com/api/?key=".$API_KEY."&q=".$search_term;

	//$result = json_decode($json, true);
	//echo "<br>total: ".$result["total"];

	echo '<div class="content container"><h2>results:</h2><br>';
		$i = 0;
		foreach ($new_search_json["hits"] as $image) {
			if (++$i == 11) break;

			//$params = urlencode($params);
			echo '<a href="#" class="panel panel-default"><div class="panel-body"><div class="carousel slide"><div class="carousel inner"><div class="item active"><img class="img-responsive" src="';
			echo $image["webformatURL"];
			echo '" alt="photo1"><div class="carousel-caption"><h1>'.$text.'</h1></div></div></div></div></div></a>';
			//echo '<p><a href="#" type="button" class="btn btn-group-justified btn-default">choose ''</a></p><br><br>';
		}
	echo '</div>';


?>
<?php include("../includes/page_bottom.php");?>

