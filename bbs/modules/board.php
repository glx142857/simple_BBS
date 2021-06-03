<?php 
	
	require_once('./includes/db.php');

	function get_all_boards() {

		$sql = "
			SELECT t_board.board_name, t_board.description, count(t_post.id) as post_cnt, max(t_post.write_time) as last_update_time
			FROM t_board
			LEFT JOIN t_post ON t_board.board_name = t_post.board_name
			where t_post.pid is null 
			group by t_board.board_name
		";

		$boards = exe_sql($sql);

		return $boards;

	}

	function get_board_all_posts($board_name) {

		$sql = "
			select t_post.board_name, t_post.id, t_post.title, t_user.username, t_post.write_time, count(t_child_post.id) as reply_count, t_post.see_count, max(t_child_post.write_time) as last_update_time, t_child_user.username as last_update_user
			from t_post 
			left join t_post as t_child_post on t_post.id = t_child_post.pid 
			left join t_user on t_post.uid = t_user.uid
			left join t_user as t_child_user on t_child_post.uid = t_child_user.uid
			where t_post.board_name = '$board_name' and t_post.pid is null
			group by t_post.id
			order by last_update_time desc, t_post.write_time desc
		";

		$posts = exe_sql($sql);
		return $posts;

	}

?>