<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/page_top.php");?>

<?php
	checkLogin();
?>

<?php 

	$userid = $_SESSION["userid"];
	$response = array();
	$response["status_code"] = "_UNKNOWN";

	if (mysqli_connect_errno()) {
		$response["status_code"] = "_SER";
	} else {
		$query = "SELECT login,firstname FROM users WHERE id={$userid};";
		$return = mysqli_query($connection, $query);
		if (!$return) {
			echo "<h1><br>bad</h1>";
			$response["status_code"] = "_ERROR";
		} else {
				$result = mysqli_fetch_assoc($return);
				echo "made it to the correct block";
				$login = $result['login'];
				$firstname = $result['firstname'];
				$response["status_code"] = "OK";
		}	
	}

?>


<div class="content container">	
	<div class="page-header">
		<h1>My Wall<br><small>Hello, <?php echo $firstname;?></small></h1>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="my_wall.php"><span class="glyphicon glyphicon-user"></span> kfischer</a>
			<div class="pull-right"><span class="glyphicon glyphicon-time"></span> 3h</div>
		</div>
	  	<div class="panel-body">

	    		<img class="img-responsive" src="../images/sunset.jpg" alt="test">

		</div>
	  	<div class="panel-footer">
			<span class="glyphicon glyphicon-heart"></span> 7
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="my_wall.php"><span class="glyphicon glyphicon-user"></span> kfischer</a>
			<div class="pull-right"><span class="glyphicon glyphicon-time"></span> 1d</div>
		</div>
	  	<div class="panel-body">

	    		<img class="img-responsive" src="http://www.dailybackgrounds.com/wp-content/uploads/2015/01/keep-calm-and-study-on.jpg" alt="test3">
	  	
	  	</div>
	  	<div class="panel-footer">
			<span class="glyphicon glyphicon-heart-empty"></span> 1
		</div>
	</div>

</div>  

<?php include("../includes/button-add.html");?>
<?php include("../includes/page_bottom.php");?>

