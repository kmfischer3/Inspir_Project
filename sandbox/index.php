<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("timestamp_transform.php"); ?>

<?php
	checkLogin();
?>
<?php include("../includes/page_top.php");?>


<?php

if (mysqli_connect_errno()) {
	$response["status_code"] = "_SERVER-ERROR";
} else {

        $query = "SELECT * FROM posts ORDER BY postdate DESC";
		$result = mysqli_query($connection, $query);
		//$result = mysqli_fetch_assoc($return);

		if (!$result) {
			$response["status_code"] = "_SQL_ERROR_OR_NO_POSTS_TO_DISPLAY";
			echo "<h4>No posts to display.</h4>";
		} else {

			echo '<div class="content container"><h1>Welcome</h1><p>[FINAL TEST hopefully]Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab libero, cupiditate veniam officiis itaque in porro iure fugit iusto reprehenderit commodi earum cum blanditiis quos error similique quod, facere! Hic.</p><br>';

			while ($post = mysqli_fetch_assoc($result)) {

				$userid = $post['userid'];
				$image = $post['image'];
				$text = $post['text'];
				$postdate = $post['postdate'];

				$user_query = "SELECT login FROM users WHERE id={$userid}";
				$name = mysqli_query($connection, $user_query);
				//$name = $mysqli_query($connection, "SELECT login FROM users WHERE id={$userid}");
				$what = mysqli_fetch_assoc($name);
				$login = $what['login'];


				$postdate = time_elapsed_string($postdate);

				echo '<div class="panel panel-default"><div class="panel-heading"><a href="my_wall.php"><span class="glyphicon glyphicon-user"></span> '.$login.'</a><div class="pull-right"><span class="glyphicon glyphicon-time"></span> '.$postdate.'</div></div><div class="panel-body"><div class="carousel slide"><div class="carousel inner"><div class="item active"><img class="img-responsive" src="'.$image.'" alt="img"><div class="carousel-caption"><h1>'.$text.'</h1></div></div></div></div></div><div class="panel-footer"><span class="glyphicon glyphicon-heart-empty"></span> 4</div></div>';

			}

			echo '</div>';
			$response["status_code"] = "OK";
		}

}

mysqli_close($connection);

?>

<?php include("../includes/button-add.html");?>
<?php include("../includes/page_bottom.php");?>

