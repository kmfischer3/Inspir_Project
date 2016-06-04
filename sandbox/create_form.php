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


	<h2><br><small>Step 2: Select ThemeBoard(s)</small></h2>
		<div class="form-group input-group-lg">
			<label for="checkbox"></label>	
			<div class="checkbox">
			  <label><input type="checkbox" value="">Business</label>
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" value="">Family</label>
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" value="">Goals</label>
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" value="">Health</label>
			</div>
	    	</div>

		<input class="btn-lg btn-primary pull-right" type="submit" value="Next Step >">
	</form>

</div>  

<?php include("../includes/page_bottom.php");?>
