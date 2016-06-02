<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>InspirGram</title>
</head>
<body>

<nav class="navbar navbar-default">
<div class="container">
	<div class="navbar-header">
		<a href="#" class="navbar-brand">
			<span class="glyphicon glyphicon-th-large"></span> InspirGram 
		</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="#">My Wall</a></li>
		<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ThemeBoards</a>
			<ul class="dropdown-menu">
				<li><a href="#">Business</a></li>
				<li><a href="#">Family</a></li>
				<li><a href="#">Goals</a></li>
				<li><a href="#">Health</a></li>
			</ul>

		</li>
	</ul>
</div>
</nav>

<div class="container">
	<h2 class="header">Step 2: Choose a photo</h2>
	<a href="javascript:history.back();" type="button" class="btn btn-warning navbar-btn pull-left"><span class="glyphicon glyphicon-menu-left"></span> Back</a>
	<a href="javascript:location.reload();" type="button" class="btn btn-warning navbar-btn pull-right"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
</div>

<div class="content container">



<?php 
/* 
Theme Boards:
	career
	family & friends
	fun
	health
	religion 
*/
$search_terms = array(
					'career' => array('fierce','difficult','business'),
					'family' => array('love','parents','sibling'),
					'fun' => array('hipster','colorful','quirky'),					
					'health' => array('healthy','athlete','yoga'),
					'religion' => array('church','cross','calm'),
					'none' => array('beautiful','pattern','magnificent')
				);

function google_images($q, $page) {
	$q = urlencode($q);
	$start = ($page - 1) * 21;
	$get_data = file_get_contents('https://www.google.com/search?safe=active&tbm=isch&source=hp&biw=1906&bih=1044&q=desktop+backgrounds+'.$q.'+-anime+-shark&tbs=ic:color');
	preg_match_all('/src="([^"]*)"/i', $get_data, $matches, PREG_SET_ORDER);
	$images = array();
	if (!$matches) echo "no matches";
	foreach ($matches as $data) {
		$images[] = $data[1];	
	}
	return $images;
}

$sample_quote = '"Creativity is contagious, pass it on." -Albert Einstein';
$rand = rand(0, 3);
$query = $search_terms['fun'][$rand];

echo 'Showing top 1 image results for '.$query.': <br>';

echo '<div class="row"><div class="col-sm-12 col-xs-12"><div class="carousel slide"><div class="carousel inner"><div class="item active">';
echo '<img src="https://upload.wikimedia.org/wikipedia/commons/5/58/Sunset_2007-1.jpg" alt="photo1" width="350" height="350"><div class="carousel-caption"><h1>'.$sample_quote.'</h1></div>';
//echo '<div><a href="#" class="thumbnail"><img src="' . google_images($query, 1)[1] . '" alt="photo2"></a></div>';
//echo '<div><a href="#" class="thumbnail"><img src="' . google_images($query, 1)[2] . '" alt="photo3"></a></div>';
echo '</div></div></div></div></div>';


//echo '<pre>' . print_r(google_images('dogs', 1), true) . '</pre>';
//var_dump(file_get_contents('https://www.google.com/search?hl=en&q=dog&tbm=isch&gws_rd=ssl'));
?>


</div>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
