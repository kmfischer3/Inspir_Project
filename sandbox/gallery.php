<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/configuration.php"); ?>

<?php include("../includes/page_top.php");?>

<?php

  $tags = array();

  echo '<div class="content">';

  //get current tags (default to "moon")
  if ( !empty($_GET["tags"]) ) {
  
    $url_tags = urldecode($_GET["tags"]); 
    $tag_keys = explode(' ', $url_tags);
    foreach($tag_keys as $k) {
      $tags += array($k => 10);
    }  

  } else {
    $tags = array("moon"=>10);
  }
  
  //build tag string for api call
  $tag_string = "";

  if (sizeof($tags) > 0) {
    foreach ($tags as $tag => $tag_bias) { 
      $tag_string .= urlencode($tag).'+';
    }
  }   
    
  $tag_string = trim($tag_string, '+');
    
  $api_call = "https://pixabay.com/api/?key=".$API_KEY."&q=".$tag_string;
  echo "api_call = ".$api_call;  
  
  //display results of api call
  $json = file_get_contents($api_call);
  $result = json_decode($json, true);

  if ($result["hits"]) {
  
    echo '<img class="img-responsive" src="'.$result["hits"][0]["webformatURL"].'" class="thumbnail img-responsive">';
    $img_tags = explode(', ', $result["hits"][0]["tags"]);
        
    //add biases to tags
    echo "<br>before: ";
    var_dump($tags);
    foreach($img_tags as $new_tag) {
      if ( array_key_exists($new_tag, $tags) ) {
        $tags[$new_tag] += 10;
      } else {
        $tags += array($new_tag => 10);
      }
    }    
    
    echo "<br>after: ";
    var_dump($tags);

  } else {
  
    echo "no results";
  
  }
    
  //build updated tag string for url params   
  //TODO replace "beautiful" with best match tag
  $tag_string .= '+'.'beautiful';
  echo '<a href="gallery.php?tags='.$tag_string.'" class="btn btn-success" role="button">Good</a>';
  
  echo '</div>';

?>
<?php include("../includes/page_bottom.php");?>
