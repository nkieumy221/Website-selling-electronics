<?php
if(!empty($_POST["name"]) && !empty($_POST["comment"])){
	$insertComments = "INSERT INTO binhluan (ID, NoiDung, TenNguoiDung) VALUES ('".$_POST["commentId"]."', '".$_POST["comment"]."', '".$_POST["name"]."')";
	mysqli_query($conn, $insertComments) or die("database error: ". mysqli_error($conn));	
	$message = '<label class="text-success">Comment posted Successfully.</label>';
	$status = array(
		'error'  => 0,
		'message' => $message
	);	
} else {
	$message = '<label class="text-danger">Error: Comment not posted.</label>';
	$status = array(
		'error'  => 1,
		'message' => $message
	);	
}
echo json_encode($status);
?>
<div class="container">		
	<h2>Example: Comment System with Ajax, PHP & MySQL</h2>		
	<form method="POST" id="commentForm">
		<div class="form-group">
			<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required />
		</div>
		<div class="form-group">
			<textarea name="comment" id="comment" class="form-control" placeholder="Enter Comment" rows="5" required></textarea>
		</div>
		<span id="message"></span>
		<div class="form-group">
			<input type="hidden" name="commentId" id="commentId" value="0" />
			<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Post Comment" />
		</div>
	</form>		
	<div id="showComments"></div>   
</div>	

<script type="text/javascript">
    $(document).ready(function(){ 
	$('#commentForm').on('submit', function(event){
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
			url: "comments.php",
			method: "POST",
			data: formData,
			dataType: "JSON",
			success:function(response) {
				if(!response.error) {
					$('#commentForm')[0].reset();
					$('#commentId').val('0');
					$('#message').html(response.message);
					showComments();
				} else if(response.error){
					$('#message').html(response.message);
				}
			}
		})
	});	
});

function showComments() {
	$.ajax({
		url:"show_comments.php",
		method:"POST",
		success:function(response) {
			$('#showComments').html(response);
		}
	})
}

</script>