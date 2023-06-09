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
		<title><?php echo config::getName();?> | Groups</title>
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
			<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
				<div class="well profileCard">
					<h3>Groups</h3>
					<p>Groups will make team-work a lot easier, interact with friends and make new ones!</p>
					<a class="btn btn-primary" href="/groups/create">Create new Group</a>
					<a class="btn btn-primary" href="/groups/search">Search Group</a>
				</div>
			</div>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>