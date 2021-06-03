<?php
	error_reporting(E_ALL & ~E_NOTICE); 
	function breadcrumb() {

		$bc = '<a href="' . SITEROOT . 'index.php">首页</a>';

		$cur_page =  end(explode('/',$_SERVER['PHP_SELF']));  
		switch ($cur_page) {
			case 'index.php':

				break;
			case 'board_detail.php':
				$board_name = $_GET['board'];
				$bc .= htmlentities(' > ') . '<a href="' . SITEROOT . 'board_detail.php?board=' . $board_name . '">' . $board_name . '</a>'; 
				break;
			case 'post_detail.php':
				$board_name = $_GET['board'];
				$bc .= htmlentities(' > ') . '<a href="' . SITEROOT . 'board_detail.php?board=' . $board_name . '">' . $board_name . '</a>'; 
				break;				
		}

		return $bc;

	}

?>