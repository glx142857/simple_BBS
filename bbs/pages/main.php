<?php require_once('_header.php'); ?>

	<div class="main">
		
		<table border="1">
			
			<thead>
				<tr>
					<td width="100">版块名</td>
					<td width="*">版块描述</td>
					<td width="40">贴数</td>
					<td width="150">最后发表</td>
				</tr>
			</thead>
			
			<tbody>
				<?php 

					if (empty($boards)) {
						echo '尚未创建版块';
					} else {

						foreach ($boards as $board) {

							echo '<tr>';
							echo '<td><a href="board_detail.php?board=' . urlencode($board['board_name']) . '">' . $board['board_name'] . '</a></td>';
							echo '<td><a href="board_detail.php?board=' . urlencode($board['board_name']) . '">' . $board['description'] . '</a></td>';
							echo '<td>' . $board['post_cnt'] . '</td>';
							echo '<td>' . $board['last_update_time'] . '</td>';
							echo '</tr>';

						}

					}

				?>
			</tbody>

		</table>

	</div>
	
<?php require_once('_footer.php'); ?>