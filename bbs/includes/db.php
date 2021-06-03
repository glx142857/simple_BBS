<?php 
	
	require_once('./config.php');

	/*
	* 执行sql语句
	*/
	function exe_sql($sql) {

		$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		mysqli_set_charset($conn, "utf8");

		if (mysqli_connect_errno()) {
			die('database connect error.' . mysqli_connect_error());
		}

		$result = mysqli_query($conn, $sql);
		if (!$result) {
			die('database query error.' . mysqli_error($conn));
		}

		if (is_bool($result)) {

			$data = mysqli_affected_rows($conn);

		} else {

			$data = array();
			while (($row = mysqli_fetch_assoc($result))) {
				$data[] = $row;
			}
			mysqli_free_result($result);
			
		}

		mysqli_close($conn);

		return $data;

	}

?>