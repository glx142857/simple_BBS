<?php require_once('_header.php'); ?>

	<div class="main">
		
		<table border="1">
			
			<thead>
				<tr>
					<td width="*">标题</td>
					<td width="150">作者</td>
					<td width="70">回复/查看</td>
					<td width="150">最后发表</td>
				</tr>
			</thead>
			
			<tbody>
				<?php 

					if (empty($posts)) {
						echo '<tr>';
						echo '<td colspan="4">尚无帖子!</td>';
						echo '</tr>';
					} else {

						foreach ($posts as $post) {

							echo '<tr>';
							echo '<td><a href="post_detail.php?board=' . urlencode($post['board_name']) . '&id=' . urlencode($post['id']) . '">' . $post['title'] . '</a></td>';
							echo '<td>' . $post['username'] . '<br />' . $post['write_time'] . '</td>';
							echo '<td>' . $post['reply_count'] . ' / ' . $post['see_count'] . '</td>';
							echo '<td>' . $post['last_update_user'] . '<br />' . $post['last_update_time'] . '</td>';
							echo '</tr>';

						}

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
			<input type="text" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : ''; ?>" placeholder="请输入帖子标题" size="115"><br>
			<textarea name="content" id="" cols="100" rows="10" placeholder="请输入帖子内容"></textarea><br>
			<input type="hidden" name="board" value="<?php echo $_GET['board']; ?>">
			<input type="submit" name="new_post" value="发帖">
		</form>

	</div>
	
<?php require_once('_footer.php'); ?>