<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
	if (!$GLOBALS['loggedIn']) {
		require_once('../error/notfound.php');
		exit;
	}
	if ($GLOBALS['userTable']['rank'] == 0) {
		require_once('../error/notfound.php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo config::getName();?> | Roblox Asset Uploader</title>
		<?php html::buildHead();?>
	</head>
	<body>
		<?php html::getNavigation();?>
		<div class="container">
			<div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
				<script src="/core/func/js/admin/rbxAssetUpload.js?v=1"></script>
				<h4>Roblox Asset Uploader</h4>
				<div id="aStatus"></div>
				<div id="downloaderPanel">
					<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="width:100%;margin-bottom:43px;margin-top:43px"></i>
				</div>
			</div>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>