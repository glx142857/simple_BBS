<?php 
	ini_set('date.timezone','Asia/Shanghai');
	session_start();

	require_once('./includes/validation.php');
	require_once("./modules/board.php");
	require_once("./modules/post.php");

	if (isset($_POST['new_post'])) {

		if (isset($_SESSION['username'])) {
			
			$form_msg = new_post_validtion();
			if (empty($form_msg)) {
				
				$new_post_status = new_post($_POST['board'], $_SESSION['username'], $_POST['title'], $_POST['content']);
				if (!$new_post_status) {
					$form_msg[] = "发帖失败!";
				}				

			}

		} else {
			$form_msg[] = "请在登陆后发帖!";
		}

	}

	$board_name = $_GET['board'];	
	$posts = get_board_all_posts($board_name);

	require_once('./pages/posts.php');

	function new_post_validtion() {

		$errors = array();

		if (!valid_presence($_POST['title'])) {
			$errors[] = "新帖标题不能为空!";
		}

		if (!valid_presence($_POST['content'])) {
			$errors[] = "新帖内容不能为空!";
		}

		return $errors;

	}

?>