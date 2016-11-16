<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/configuration.php"); ?>

<?php include("../includes/page_top.php");?>

<?php

  $popular_tags = array('moon', 'insects', 'flower', 'phenomenon', 'sun', 'ocean');
  $sub_tags = array('desert','beautiful','landscape','animal','flower','weather','pattern','abstract', 'sunset', 'ocean', 'phenomenon', 'space', 'illusion');
	
	echo '<div class="content"><div class="row">';
	
  foreach ($popular_tags as $tag) {
  
    $api_call = "https://pixabay.com/api/?key=".$API_KEY."&q=".$tag;
    
    //echo "api call: ".$api_call;
    $json = file_get_contents($api_call);
    $result = json_decode($json, true);

    if ($result["hits"]) {
    
      echo '<div class="col-lg-4 col-sm-6 col-xs-12"><a href="gallery.php?tags='.$tag.'">';
      echo '<img title="'.$tag.'" src="'.$result["hits"][0]["webformatURL"].'" class="thumbnail img-responsive">';
      echo '</a></div>';
      
    }
  }
  
  echo '</div></div>';

?>

</div>

<?php include("../includes/page_bottom.php");?>
