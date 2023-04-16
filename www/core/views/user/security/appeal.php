<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
	if (!$GLOBALS['loggedIn'] or $GLOBALS['userTable']['banned'] == 0) {
		header("Location: /");
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo config::getName();?> | Appeal</title>
		<?php html::buildHead();?>
	</head>
	<body>
		<?php
			html::getNavigation();
			
			if($GLOBALS['userTable']['appealStatus'] == 0)
			{
				echo '<script src="/core/func/js/account/appeal.js?v=10"></script>';
			}
		?>
		<div class="container">
			<!-- Vertical ad space -->
			<ins class="adsbygoogle"
				 style="display:block"
				 data-ad-client="ca-pub-3667210370239911"
				 data-ad-slot="3743605946"
				 data-ad-format="auto"
				 data-full-width-responsive="true"></ins>
			<script>
				 (adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			<div style="margin-top:23px;"></div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
				<?php
					if($GLOBALS['userTable']['appealStatus'] == 0):
				?>
				<div id="appealStatus"><div class="alert alert-danger">this isnt done yet, it does nothing</div></div>
				<div class="well profileCard">
					<h4>Ban Appeal</h4>
					<p>Feel like you've been incorrectly punished? Fill out the form below explaining why you've been banned incorrectly and a moderator will review it. It may take a few days before any action is taken.</p>
					<textarea cols="116" rows="10" style="max-width:100%;min-width:300px;" class="form-control" placeholder="In this box, type a few sentences explaining why you've been incorrectly banned." id="appealExplanation"></textarea>
					<p style="color:red;margin-bottom:0" id="explanationError">Your explanation must be over 50 characters. Please note that spamming characters will result in your appeal being denied.</p>
					<br/>
					<button class="btn btn-default" style="margin-bottom:15px;" id="sendAppeal" disabled>Send appeal</button>
					<p style="color:grey">* Abusing the appeal system will result in a permanent ban, along with the removal of your ability to appeal.</p>
				</div>
				<?php
					elseif($GLOBALS['userTable']['appealStatus'] == 1):
				?>
				<div class="alert alert-success">Your appeal has been sent and will be reviewed shortly! It may take a few days for your appeal to be read.</div>
				<a class="btn btn-primary" style="width:100%;" href="https://gtoria.net/account/suspended">Back</a>
				<?php
					elseif($GLOBALS['userTable']['appealStatus'] > 1):
				?>
				<p style="color:red">You aren't eligible to appeal.</p>
				<a class="btn btn-primary" style="width:100%;" href="https://gtoria.net/account/suspended">Back</a>
				<?php
					endif;
				?>
			</div>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>