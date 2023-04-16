<?php
	if (!defined('IN_PHP')) {
		exit;
	}
?>
<script>
	$(document).ready(function () {
		var charactersAllowed = 30000;
		$('textarea').keyup(function () {
			var left = charactersAllowed - $(this).val().length;
			$('#remainingC').html('<br>Characters left: ' + left);
			if ($(this).val().length == 0) $("#remainingC").empty();
		});
	});
</script>
<div id="pStatus"></div>
<div class="col-xs-12 col-sm-12 col-md-9">
<input class="form-control" maxlength="128" id="postTitle" type="text" placeholder="Post title" style="display:inline"><p id="remainingC" style="display:inline"></p>
<textarea rows="10" maxlength="30000" class="form-control" id="postContent" placeholder="Post here"></textarea>
<button class="btn btn-primary" id="postMessage" onclick="postMessage(<?php echo $result['id'];?>)">Post</button></div>
<div class="col-xs-12 col-sm-12 col-md-3 center">
<h4>Rules of Posting</h4>
<p>Read the <a target="_blank" href="https://gtoria.net/forum+23"><b>Terms of Service</b></a> before posting on the Forums.</p>
<p>Posting low quality content/post farming will result in your post being deleted and a warning being added to your account.</p></div>