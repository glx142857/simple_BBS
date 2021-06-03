<?php 
	
	require_once('./includes/validation.php');
	require_once('./modules/auth.php');

	if (isset($_GET['register'])) {
		
		$form_msg = register_validtion();

		if (empty($form_msg)) {
			
			if(valid_username($_GET['username'])) {

				$reg_status = register($_GET['username'], $_GET['password']);
				if ($reg_status) {
					$form_msg[] = "成功创建用户[" . $_GET['username'] . "]回到<a href=\"index.php\">首页</a>";
 				} else {
 					$form_msg[] = "创建用户失败!";
 				}

			} else {

				$form_msg[] = "该用户名已存在，请选择其他用户名";

			}

		} 

	}

	require_once('pages/register.php');


	function register_validtion() {

		$errors = array();

		if (!valid_presence($_GET['username'])) {
			$errors[] = "账号不能为空!";
		}

		if (!valid_presence($_GET['password'])) {
			$errors[] = "密码不能为空!";
		}

		if (!valid_presence($_GET['confirm'])) {
			$errors[] = "确认密码不能为空!";
		}		

		if (!valid_equal($_GET['password'], $_GET['confirm'])) {
			$errors[] = "密码与确认密码必须相同!";
		}

		return $errors;

	}

?>