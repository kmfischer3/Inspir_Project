<?php
	session_start();
	
	function checkLogin() {
		if ( !isset($_SESSION["userid"]) ) {
			header('Location: http://pages.cs.wisc.edu/~kristina/inspir_project/sandbox/login.php');
		}
		return;
	}
	function message() {
		if (isset($_SESSION["message"])) {
			$output = "<div class=\"message\">";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</div>";
			
			// clear message after use
			$_SESSION["message"] = null;
			
			return $output;
		}
	}
	function errors() {
		if (isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];
			
			// clear message after use
			$_SESSION["errors"] = null;
			
			return $errors;
		}
	}
	
?>
