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
		<title><?php echo config::getName();?> | <?=($GLOBALS['userTable']['bantype'] == 5 or $GLOBALS['userTable']['bantype'] == 0) ? 'Account Deleted' : 'Suspended'?></title>
		<?php html::buildHead();?>
	</head>
	<body>
		<?php html::getNavigation();?>
		<script src="/core/func/js/account/suspended.js?v=3"></script>
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
				<div id="sStatus"></div>
				<div class="well profileCard" style="margin-bottom:8px;">
					<?php
						if ($GLOBALS['userTable']['bantype'] == 0 or $GLOBALS['userTable']['bantype'] == 5) {
							$type = "Account Deleted";
						}elseif ($GLOBALS['userTable']['bantype'] == 1) {
							$type = "Warning";
						}elseif ($GLOBALS['userTable']['bantype'] == 2) {
							$type = "Suspended for 1 day";
						}elseif ($GLOBALS['userTable']['bantype'] == 3) {
							$type = "Suspended for 1 week";
						}else{
							$type = "Suspended for 1 month";
						}
						
						echo '<h4>'.$type.'</h4>';
						if ($type == "Account Deleted") {
							$message = "You will not be able to re-activate your account.";
						}elseif ($type == "Warning") {
							$message = "You can re-activate your account now.";
						}else{
							$message = "You will be able to re-activate your account once the suspension has been expired.";
						}
						echo '<p><b>Reviewed</b>: '.date('M j Y g:i A', strtotime($GLOBALS['userTable']['bantime'])).'</p>';
						echo '<p><b>Moderator Note</b>: '.context::secureString($GLOBALS['userTable']['banreason']).'</p>';
						echo '<p style="color:grey">'.$message.'</p>';
						
						if ($GLOBALS['userTable']['bantype'] != 5 && $GLOBALS['userTable']['bantype'] != 0) {
							echo '<button class="btn btn-default" id="liftBan">Re-activate my account</button>';
						}
					?>
				</div>
				<?php if($GLOBALS['userTable']['appealStatus'] == 0): ?>
				<p class="text-muted center">Believe you've been unfairly banned? <a href="http://gtoria.net/account/appeal">Appeal here</a>.</p>
				<?php elseif($GLOBALS['userTable']['appealStatus'] == 1): ?>
				<p class="center" style="color:lime">You have an appeal pending.</p>
				<?php elseif($GLOBALS['userTable']['appealStatus'] == 2): ?>
				<p class="center" style="color:red">Your appeal has been denied. You cannot re-appeal for this ban.</p>
				<?php endif; ?>
			</div>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>