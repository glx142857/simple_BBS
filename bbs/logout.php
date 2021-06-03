<?php 
	
	session_start();
	
	require_once('config.php');

	unset($_SESSION['username']);

	if (isset($_SERVER['HTTP_REFERER'])) {

		$ref = $_SERVER['HTTP_REFERER'];
		header("Location: $ref");

	} else {

		header("Location: " . SITEROOT);

	}	

?>