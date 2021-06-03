<?php 
	
	require_once('./includes/db.php');

	function login($username, $password) {

		$sql = "select * from t_user where username = '$username' and password = '$password'";

		$user = exe_sql($sql);

		if (empty($user)) {
			
			return false;

		} else {

			return true;

		}

	}

	function valid_username($username) {

		$sql = "select * from t_user where username = '$username'";

		$user = exe_sql($sql);

		return empty($user) ? true : false;

	}

	function register($username, $password) {

		$sql = "insert into t_user values('null', '$username', '$password', 'normal')";

		return exe_sql($sql);

	}

?>