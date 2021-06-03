<?php require_once('_header.php'); ?>

	<div class="main">
		
		<table border="1">
			
			<thead>
				<tr>
					<td width="200"><?php echo '回复: ' . $reply_count . ' | 查看: ' . $see_count; ?></td>
					<td width="*"><?php echo $posts[0]['title'] ?></td>
				</tr>
			</thead>
			
			<tbody>
				<?php 


					foreach ($posts as $post) {

						echo '<tr>';
						echo '<td>' . $post['username'] . '<br />发表于: ' . $post['write_time'] . '</td>';
						echo '<td>' . $post['content'] . '</td>';
						echo '</tr>';

					}


				?>
			</tbody>

		</table>
		
		<br>
		<br>
		
		<?php 

			if (!empty($form_msg)) {
				echo '<ul class="form_msg">';
				foreach ($form_msg as $msg) {
					echo '<li>' . $msg . '</li>';
				}
				echo '</ul>';
			}

		?>

		<form action="" method="post">
			<textarea name="content" id="" cols="100" rows="10" placeholder="请输入帖子内容"></textarea><br>
			<input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">
			<input type="submit" name="reply_post" value="回帖">
		</form>

	</div>

<?php require_once('_footer.php'); ?>