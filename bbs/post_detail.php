<?php 
	ini_set('date.timezone','Asia/Shanghai');
	session_start();

	require_once('./includes/validation.php');
	require_once("./modules/post.php");

	if (isset($_POST['reply_post'])) {
		
		if (isset($_SESSION['username'])) {
			
			$form_msg = reply_post_validation();
			if (empty($form_msg)) {
				
				$reply_post_status = reply_post($_POST['post_id'], $_SESSION['username'], $_POST['content']);
				if (!$reply_post_status) {
					$form_msg[] = "回帖失败!";
				}

			}

		} else {
			$form_msg[] = "请在登陆后发帖!";
		}

	}

	if (!isset($_GET['id'])) {
		require_once('error.php');
		exit;
	}

	$post_id = $_GET['id'];
	
	$reply_count = get_reply_count($post_id);
	$see_count = get_see_count($post_id);
	$posts = get_one_post_and_replys($post_id);
	
	if (empty($posts)) {
		require_once('error.php');
		exit;		
	}
	
	update_see_count($post_id);

	require_once('./pages/post_reply.php');


	function reply_post_validation() {

		$errors = array();

		if (!valid_presence($_POST['content'])) {
			$errors[] = "新帖内容不能为空!";
		}

		return $errors;		

	}

?>