<?php 
	
	require_once('./includes/db.php');

	function new_post($board_name, $username, $title, $content) {

		$sql = "select * from t_user where username = '$username'";
		$user = exe_sql($sql);
		$uid = $user[0]['uid'];

		$cur_time = date('Y-m-d H:i',time());

		$sql = "insert into t_post values(null, null, '$board_name', $uid, '$title', '$content', '$cur_time', 0)";
		$new_post_status = exe_sql($sql);

		return $new_post_status;

	}

	function get_reply_count($post_id) {

		$sql = "select count(id) as reply_cnt from t_post where pid = $post_id";
		$r = exe_sql($sql);

		return $r[0]['reply_cnt'];

	}

	function get_see_count($post_id) {

		$sql = "select see_count from t_post where id = $post_id";
		$r = exe_sql($sql);

		return $r[0]['see_count'];

	}

	function get_one_post_and_replys($post_id) {

		$sql = "
			select title, content, username, write_time 
			from t_post 
			left join t_user on t_post.uid = t_user.uid 
			where t_post.id = $post_id or t_post.pid = $post_id 
			order by t_post.write_time			
		";

		$posts = exe_sql($sql);

		return $posts;

	}

	function update_see_count($post_id) {

		$sql = "update t_post set see_count = see_count + 1 where id = $post_id";
		$r = exe_sql($sql);

		return $r;

	}

	function reply_post($post_id, $username, $content) {

		$sql = "select * from t_user where username = '$username'";
		$user = exe_sql($sql);
		$uid = $user[0]['uid'];

		$sql = "select board_name from t_post where id = $post_id";
		$r = exe_sql($sql);
		$board_name = $r[0]['board_name'];

		$cur_time = date('Y-m-d H:i',time());

		$sql = "insert into t_post values(null, $post_id, '$board_name', $uid, null, '$content', '$cur_time', 0)";
		$new_post_status = exe_sql($sql);

		return $new_post_status;		

	}

?>