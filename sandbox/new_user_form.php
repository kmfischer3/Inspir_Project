<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Create Account</title>
</head>
<body>

<?php require_once("../includes/db_connection.php"); ?>

<div class="content container">
	<h1>Add new user</h1>
	<form role="form" method="post" action="add_new_user.php">

		<div class="form-group input-group-lg">
			<label for="login">Login</label>
			<input class="form-control" type="text" id="login" name="login" required>
		</div>

		<div class="form-group input-group-lg">
			<label for="password">Password</label>
			<input class="form-control" type="text" id="password" name="password" required>
		</div>

		<div class="form-group input-group-lg">
			<label for="firstname">First Name</label>
			<input class="form-control" type="text" id="firstname" name="firstname" required>
		</div>

		<input class="btn-lg btn-primary pull-right" type="submit" value="Sign in">
		
	</form>

</div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>