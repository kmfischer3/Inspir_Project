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

<?php require_once("../includes/session.php"); ?>

<div class="content container">

	<form role="form" method="post" action="validate_login.php">

		<div class="form-group input-group-lg">
			<label for="login">Login</label>
			<input class="form-control" type="text" id="login">
		</div>

		<div class="form-group input-group-lg">
			<label for="password">Password</label>
			<input class="form-control" type="text" id="password">
		</div>

		<input class="btn-lg btn-primary pull-right" type="submit" value="Sign in">
		
	</form>

</div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>