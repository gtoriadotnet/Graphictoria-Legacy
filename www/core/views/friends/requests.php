<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
	if (!$GLOBALS['loggedIn']) {
		header("Location: /");
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo config::getName();?> | Friend Requests</title>
		<?php html::buildHead();?>
	</head>
	<body>
		<?php html::getNavigation();?>
		<ins class="adsbygoogle"
			 style="display:block"
			 data-ad-client="ca-pub-3667210370239911"
			 data-ad-slot="4289582614"
			 data-ad-format="auto"
			 data-full-width-responsive="true"></ins>
		<script>
			 (adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		<div class="container">
			<div id="fStatus"></div>
			<script src="/core/func/js/friends/requests.js"></script>
			<h4>My Friend Requests</h4>
			<div class="btn-group btn-group-justified">
				<a href="/friends" class="btn btn-default">Friends</a>
				<a href="/friends/requests" class="btn btn-default">Requests</a>
			</div>
			<div class="well profileCard">
				<div id="friendsContainer">
					<div class="center"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>
				</div>
			</div>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>