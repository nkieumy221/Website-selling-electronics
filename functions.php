<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'../lib/handle.php');
?>
<?php 
	// Set logged in user id: This is just a simulation of user login. We haven't implemented user log in
	// But we will assume that when a user logs in, 
	// they are assigned an id in the session variable to identify them across pages
	$user_id = Session::get('customerId');
	if(isset($_GET["productId"])){
		$idProduct = $_GET["productId"];
	}
	// connect to database
	$database = mysqli_connect("localhost", "root", "", "electronicshop");
	// get post with id 1 from database
	$post_query_result = mysqli_query($database, "SELECT * FROM hanghoa WHERE ID= ".$idProduct."");
	$post = mysqli_fetch_assoc($post_query_result);

	// Get all comments from database
	$comments_query_result = mysqli_query($database, "SELECT * FROM binhluan WHERE IDSanPham=" . $post['ID'] . " ORDER BY time DESC");
	$comments = mysqli_fetch_all($comments_query_result, MYSQLI_ASSOC);

	// Receives a user id and returns the username
	function getUsernameById($id)
	{
		global $database;
		$result = mysqli_query($database, "SELECT TenKhachHang FROM khachhang WHERE ID=" . $id . " LIMIT 1");
		// return the username
		return mysqli_fetch_assoc($result)['TenKhachHang'];
	}
	// Receives a comment id and returns the username
	function getRepliesByCommentId($id)
	{
		global $database;
		$result = mysqli_query($database, "SELECT * FROM replycomment WHERE IDComment=$id");
		$replies = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $replies;
	}
	// Receives a post id and returns the total number of comments on that post
	function getCommentsCountByPostId($post_id)
	{
		global $database;
		$result = mysqli_query($database, "SELECT COUNT(*) AS total FROM binhluan");
		$data = mysqli_fetch_assoc($result);
		return $data['total'];
	}

    //...
	// If the user clicked submit on comment form...
	if (isset($_POST['comment_posted'])) {
		global $database;
		echo "binhluan";
		// grab the comment that was submitted through Ajax call
		$comment_text = $_POST['comment_text'];
		$productId = $_POST['productId'];
		// insert comment into database
		$sql = "INSERT INTO binhluan(IDSanPham, IDUser, NoiDung, time) VALUES (" . $idProduct . "," . $user_id . ", '$comment_text', now())";
		echo $sql;
		$result = mysqli_query($database, $sql);
		// Query same comment from database to send back to be displayed
		$inserted_id = $database->insert_id;
		echo $inserted_id;
		$res = mysqli_query($database, "SELECT * FROM binhluan WHERE ID=$inserted_id");
		$inserted_comment = mysqli_fetch_assoc($res);
		// if insert was successful, get that same comment from the database and return it
		if ($result) {
			$comment = "<div class='comment clearfix'>
						<img src='profile.png' alt='' class='profile_pic'>
						<div class='comment-details'>
							<span class='comment-name'>" . getUsernameById($inserted_comment['IDUser']) . "</span>
							<span class='comment-date'>" . date('F j, Y ', strtotime($inserted_comment['time'])) . "</span>
							<p>" . $inserted_comment['NoiDung'] . "</p>
							<a class='reply-btn' href='#' data-id='" . $inserted_comment['ID'] . "'>reply</a>
						</div>
						<!-- reply form -->
						<form action='post_details.php' class='reply_form clearfix' id='comment_reply_form_" . $inserted_comment['ID'] . "' data-id='" . $inserted_comment['ID'] . "'>
							<textarea class='form-control' name='reply_text' id='reply_text' cols='30' rows='2'></textarea>
							<button class='btn btn-primary btn-xs pull-right submit-reply'>Submit reply</button>
						</form>
					</div>";
			$comment_info = array(
				'comment' => $comment,
				'comments_count' => getCommentsCountByPostId(2)
			);
			echo json_encode($comment_info);
			exit();
		} else {
			echo "error";
			exit();
		}
	}
	// If the user clicked submit on reply form...
	if (isset($_POST['reply_posted'])) {
		global $database;
		// grab the reply that was submitted through Ajax call
		$reply_text = $_POST['reply_text']; 
		$comment_id = $_POST['comment_id']; 
		// insert reply into database
		$sql = "INSERT INTO replycomment (IDUser, IDComment, Body, Time) VALUES (" . $user_id . ", $comment_id, '$reply_text', now())";
		$result = mysqli_query($database, $sql);
		$inserted_id = $database->insert_id;
		$res = mysqli_query($database, "SELECT * FROM replycomment WHERE ID=$inserted_id");
		$inserted_reply = mysqli_fetch_assoc($res);
		// if insert was successful, get that same reply from the database and return it
		if ($result) {
			$reply = "<div class='comment reply clearfix'>
						<img src='./assets/img/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg' alt='' class='profile_pic'>
						<div class='comment-details'>
							<span class='comment-name'>" . getUsernameById($inserted_reply['IDUser']) . "</span>
							<span class='comment-date'>" . date('F j, Y ', strtotime($inserted_reply['Time'])) . "</span>
							<p>" . $inserted_reply['Body'] . "</p>
							<a class='reply-btn' href='#'>reply</a>
						</div>
					</div>";
			echo $reply;
			exit();
		} else {
			echo "error";
			exit();
		}
	}

?>