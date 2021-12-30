<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comment and reply system in PHP</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/productDetail.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<style>
		form button { margin: 5px 0px; }
textarea { display: block; margin-bottom: 10px; }
/*post*/
.post { border: 1px solid #ccc; margin-top: 10px; }
/*comments*/
.comments-section { margin-top: 10px; border: 1px solid #ccc; }
.comment { margin-bottom: 10px; }
.comment .comment-name { font-weight: bold; }
.comment .comment-date {
	font-style: italic;
	color: rgb(184, 183, 183);
    font-size: 1.3rem;
}
.comment .reply-btn, .edit-btn { font-size: 0.8em; }
.comment-details { width: 91.5%; float: left; }
.comment-details p { margin-bottom: 0px; }
.comment .profile_pic {
	width: 55px;
	height: 55px;
	margin-right: 5px;
	float: left;
	border-radius: 50%;
}
/*replies*/
.reply { margin-left: 30px; }
.reply_form {
	margin-left: 40px;
	display: none;
}
#comment_form { margin-top: 10px; }
	</style>
</head>
<body>
<div class="pd-body">
	<div class="grid wide">
		<div class="mt-32 product__description">
			<!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
			<?php if (isset($user_id)): ?>
				<form class="clearfix cmt-content__form" action="test.php" method="post" id="comment_form form-cmt">
					<textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
					<button class="btn btn--primary cmt-btn" id="submit_comment">Submit comment</button>
				</form>
			<?php else: ?>
				<div class="well" style="margin-top: 20px;">
					<h4 class="text-center"><a href="#">Sign in</a> to post a comment</h4>
				</div>
			<?php endif ?>
			<!-- Display total number of comments on this post  -->
			<h2><span id="comments_count"><?php echo count($comments) ?></span> Comment(s)</h2>
			<hr>
			<!-- comments wrapper -->
			<div id="comments-wrapper">
			<?php if (isset($comments)): ?>
				<!-- Display comments -->
				<?php foreach ($comments as $comment): ?>
				<!-- comment -->
				<div class="comment clearfix">
					<img src="./assets/img/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg" alt="" class="profile_pic">
					<div class="comment-details">
						<span class="comment-name"><?php echo getUsernameById($comment['IDUser']) ?></span>
						<span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["time"])); ?></span>
						<p><?php echo $comment['NoiDung']; ?></p>
						<a class="reply-btn" href="#" data-id="<?php echo $comment['ID']; ?>">Trả lời</a>
					</div>
					<!-- reply form -->
					<form action="test.php" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment['ID'] ?>" data-id="<?php echo $comment['ID']; ?>">
						<textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
						<button class="btn btn--primary btn-xs pull-right submit-reply">Submit reply</button>
					</form>

					<!-- GET ALL REPLIES -->
					<?php $replies = getRepliesByCommentId($comment['ID']) ?>
					<div class="replies_wrapper_<?php echo $comment['ID']; ?>">
						<?php if (isset($replies)): ?>
							<?php foreach ($replies as $reply): ?>
								<!-- reply -->
								<div class="comment reply clearfix">
									<img src="./assets/img/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg" alt="" class="profile_pic">
									<div class="comment-details">
										<span class="comment-name"><?php echo getUsernameById($reply['IDUser']) ?></span>
										<span class="comment-date"><?php echo date("F j, Y ", strtotime($reply["Time"])); ?></span>
										<p><?php echo $reply['Body']; ?></p>
										<a class="reply-btn" href="#">Trả lời</a>
									</div>
								</div>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
					<!-- // comment -->
				<?php endforeach ?>
			<?php else: ?>
				<h2>Be the first to comment on this post</h2>
			<?php endif ?>
			</div><!-- comments wrapper -->
		</div><!-- // all comments -->
	</div>
</div>
<!-- Javascripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="scripts.js"></script>
</body>
</html>