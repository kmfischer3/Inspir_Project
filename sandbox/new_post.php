<?php include("../includes/page_top.php");?>

<div class="content container">

	<h2 class="header">New Post</h2>

	<a href="create_form.php" type="button" class="btn btn-info btn-block btn-lg pull-right" style="padding:20px;margin-top:50px;margin-bottom:50px;"><span class="glyphicon glyphicon-pencil"></span> Create Your Own</a>

	<p><h3>Or</h3></p>

	<div class="panel panel-default">
	    	<div class="panel-body">
			<h4>Upload an Image:</h4><br>
			<form role="form" method="get" action="choose-wall.php">

				<div class="form-group input-group-lg">
					<label for="inputLink">Image URL</label>
					<input class="form-control" value="https://" type="text" id="inputLink" name="inputLink" required pattern="https?://.+">
				</div>
				<br>
	
				<div class="form-group input-group-lg">
					<label for="radio">Select a ThemeBoard</label>
					<div class="radio">
					  <label><input type="radio" value="career" name="optradio">Career</label>
					</div>
					<div class="radio">
					  <label><input type="radio" value="family" name="optradio">Family</label>
					</div>
					<div class="radio disabled">
					  <label><input type="radio" value="fun" name="optradio">Fun</label>
					</div>
					<div class="radio">
					  <label><input type="radio" value="health" name="optradio">Health</label>
					</div>
					<div class="radio">
					  <label><input type="radio" value="meditation" name="optradio">Meditation</label>
					</div>
					<div class="radio">
					  <label><input type="radio" value="religious" name="optradio">Religious</label>
					</div>
					<div class="radio">
					  <label><input type="radio" value="school" name="optradio">School</label>
					</div>
					<input class="btn-lg btn-primary pull-right" type="submit" value="Next Step >">
				</div>

			</form>
	    	</div>
	</div>
</div>  

<?php include("../includes/page_bottom.php");?>
