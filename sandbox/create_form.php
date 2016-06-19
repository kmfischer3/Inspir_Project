<?php include("../includes/page_top.php");?>

<div class="content container">

	<h2 class="header">Create Post<br><small>Step 1: Enter text to display over image</small></h2><br>

	<form role="form" method="get" action="choose_img.php">
		<div class="form-group input-group-lg">
			<label for="inputText">Quote</label>
			<input class="form-control" value='"yolo"' name="inputText" id="inputText" name="inputText" type="textarea" required>
		</div>

		<div class="form-group input-group-lg">
			<label for="inputAuthor">Author<small>  (optional)</small></label>
			<input class="form-control" type="text" id="inputAuthor" name="inputAuthor" value="Jesus">
		</div>


	<h2><br><small>Step 2: Select A ThemeBoard</small></h2>
		<div class="form-group input-group-lg">
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

<?php include("../includes/page_bottom.php");?>
