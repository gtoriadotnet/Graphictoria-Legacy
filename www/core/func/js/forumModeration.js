//XlXi
//Forum moderation functions

function deletePost(postId, forumId) {
	if ($("#deletePost").is(":disabled") == false) {
		if ($("#deletePost").text() != "Are you sure?") {
			$("#deletePost").text("Are you sure?");
		}else{
			$("#deletePost").prop("disabled", true);
			$("#deletePost").text("Deleting Post...");
			var csrf_token = $('meta[name="csrf-token"]').attr('content');
			$.post('/core/func/api/forum/post/deletePost.php', {
				csrf: csrf_token,
				postId: postId
			})
			.done(function(response) {
				if (response == "error") {
					$("#pStatus").css("color", "red").html("Network error. Try again later.");
				}else{
					loadForum(forumId);
				}
			})
			.fail(function() {
				$("#pStatus").css("color", "red").html("Network error. Try again later.");
			});
		}
	}
}

function reinstatePost(postId, forumId) {
	if ($("#reinstatePost").is(":disabled") == false) {
		if ($("#reinstatePost").text() != "Are you sure?") {
			$("#reinstatePost").text("Are you sure?");
		}else{
			$("#reinstatePost").prop("disabled", true);
			$("#reinstatePost").text("Reinstating Post...");
			var csrf_token = $('meta[name="csrf-token"]').attr('content');
			$.post('/core/func/api/forum/post/reinstatePost.php', {
				csrf: csrf_token,
				postId: postId
			})
			.done(function(response) {
				if (response == "error") {
					$("#pStatus").css("color", "red").html("Network error. Try again later.");
				}else{
					loadPost(postId);
				}
			})
			.fail(function() {
				$("#pStatus").css("color", "red").html("Network error. Try again later.");
			});
		}
	}
}