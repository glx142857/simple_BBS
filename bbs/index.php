<?php 
	
	session_start();

	require_once("./modules/board.php");
	$boards = get_all_boards();
	require_once('./pages/main.php');

?>