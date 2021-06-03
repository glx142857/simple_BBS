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
				<img src="<?php echo SITEROOT . "pages/css/bbs_logo.png"; ?>" />
			</a>
		</div>
		
		<hr>

		<div class="register">
			
			<?php 
				if (!empty($form_msg)) {
					
					echo '<ul class="form_msg">';
					foreach ($form_msg as $msg) {
						
						echo "<li>$msg</li>";

					}
					echo '</ul>';

				}
			?>
			

			<form action="register.php" >
				账号: <input type="text" name="username" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>"> <br>
				密码: <input type="text" name="password" value="<?php echo isset($_GET['password']) ? $_GET['password'] : ''; ?>"> <br>
				确认: <input type="text" name="confirm" value="<?php echo isset($_GET['confirm']) ? $_GET['confirm'] : ''; ?>"> <br>
				<input type="submit" name="register" value="注册">
				<a href="register.php">重填</a>
			</form>

		</div>
	
<?php require_once('_footer.php'); ?>