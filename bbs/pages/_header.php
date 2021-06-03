<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>bbs</title>
	<link rel="stylesheet" href="<?php echo SITEROOT . 'pages/css/style.css'; ?>">
</head>
<body>
	
	<div class="container">
		
		<div class="header">
			
			<a class="logo" href="<?php echo SITEROOT . "index.php"; ?>">
				<img src="<?php echo SITEROOT . "pages/css/sdu_logo.png"; ?>" />
			</a>
			
			<div class="login_info">

				<?php if (isset($_SESSION['username'])) { 

					echo '用户名: <strong>' . $_SESSION['username'] . '</strong> &nbsp;';
					echo '<a href="logout.php" style="text-decoration: underline;">注销</a>';

				} else { ?>

					<form action="login.php" class="header_form">
						账号: <input type="text" name="username" value="">
						密码: <input type="text" name="password" value="">
						<input type="submit" name="login" value="登陆">
						&nbsp;
						<a href="register.php">注册</a>
					</form>

				<?php } ?>
				
			</div>

		</div>
		
		<hr>
		
		<div class="breadcrumb">
			<?php 
				require_once('includes/breadcrumb.php');
				echo breadcrumb();
			?>
		</div>
