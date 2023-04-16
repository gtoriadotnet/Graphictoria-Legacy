<?php
	if (!defined('IN_PHP')) {
		exit;
	}
	
	$content = strip_tags($result['content']);
	$content = context::secureString($content);
?>
<script>
	$(document).ready(function () {
		var charactersAllowed = 30000;
		$('textarea').keyup(function () {
			var left = charactersAllowed - $(this).val().length;
			$('#remainingC').html('Characters left: ' + left);
			if ($(this).val().length == 0) $("#remainingC").empty();
		});
	});
</script>
<div id="rStatus"></div>
<p id="remainingC"></p>
<textarea rows="10" maxlength="30000" class="form-control" id="postContent" placeholder="Post content"><?= $content ?></textarea>
<button class="btn btn-primary" id="doEditPost" onclick="doEditPost(<?php echo $result['id'];?>)">Edit</button>