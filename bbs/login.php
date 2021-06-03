<?php 

	session_start();

	require_once('config.php');
	require_once('./modules/auth.php');

	$username = $_GET['username'];
	$password = $_GET['password'];
	$login_success = login($username, $password);

	if ($login_success) {
		
		$_SESSION['username'] = $username;

	}

	if (isset($_SERVER['HTTP_REFERER'])) {

		$ref = $_SERVER['HTTP_REFERER'];
		header("Location: $ref");

	} else {

		header("Location: " . SITEROOT);

	}

?>