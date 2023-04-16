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
	
	$isAdmin = ($GLOBALS['userTable']['rank'] == 1);
	
	$stmt = $GLOBALS['dbcon']->prepare("SELECT COUNT(*) FROM `catalog` WHERE `approved` = 0 AND `declined` = 0;");
	$stmt->execute();
	
	$assetsQueued = $stmt->fetchColumn(0);
	
	$stmt = $GLOBALS['dbcon']->prepare("SELECT COUNT(*) FROM `appeals` WHERE `accepted` = 0 AND `denied` = 0;");
	$stmt->execute();
	$pendingAppeals = $stmt->fetchColumn(0);
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo config::getName();?> | Admin Panel</title>
		<?php html::buildHead();?>
		<style>
		.adminBlock {
			margin-bottom: 20px;
		}
		
		.numberBadge {
			position: absolute!important;
			top: 5px!important;
			left: 20px!important;
			font-size: 18px;
			font-weight: bold;
		}
		
		.adminBtn {
			width: 100%;
			padding-top: 20px;
			height: 170px;
			font-size: 18px;
		}
		
		.adminIcon {
			font-size: 80px;
			margin-bottom: 20px;
		}
		</style>
	</head>
	<body>
		<?php html::getNavigation();?>
		<div class="container">
			<h2>Admin Panel</h2>
			<div class="row">
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" href="/admin/appeals"><?php if($pendingAppeals>0):?><span class="badge numberBadge"><?=$pendingAppeals?></span><?php endif;?><i class="fa fa-sticky-note adminIcon" aria-hidden="true"></i><br/>Ban Appeals</a>
				</div>
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" style="color:indianred" href="/admin/ban"><i class="fa fa-gavel adminIcon" aria-hidden="true"></i><br/>Ban User</a>
				</div>
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" style="color:mediumseagreen" href="/admin/unban"><i class="fa fa-user-plus adminIcon" aria-hidden="true"></i><br/>Unban User</a>
				</div>
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" href="/admin/reports"><i class="fa fa-flag adminIcon" aria-hidden="true"></i><br/>User Reports</a>
				</div>
			</div>
			<div class="row">
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" href="/admin/statistics"><i class="fa fa-server adminIcon" aria-hidden="true"></i><br/>Statistics</a>
				</div>
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" style="color:cornflowerblue" href="/admin/rewardPostie"><i class="fa fa-gg-circle adminIcon" aria-hidden="true"></i><br/>Reward Posties</a>
				</div>
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" href="/admin/assets"><?php if($assetsQueued>0):?><span class="badge numberBadge"><?=$assetsQueued?></span><?php endif;?><i class="fa fa-thumbs-up adminIcon" aria-hidden="true"></i><br/>Asset Queue</a>
				</div>
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" href="/admin/downloadasset"><img src="http://gtoria.net/html/img/logos/Roblox.png" class="adminIcon"/><br/>RBX Asset Uploader</a>
				</div>
			</div>
			<?php if($isAdmin):?>
			<div class="row">
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" href="/admin/newhat"><i class="fa fa-headphones adminIcon" aria-hidden="true"></i><br/>Create Hat</a>
				</div>
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" href="/admin/prune"><i class="fa fa-eraser adminIcon" aria-hidden="true"></i><br/>Prune Posts</a>
				</div>
				<div class="adminBlock col-sm-3">
					<a class="btn btn-default adminBtn" href="/admin/render"><i class="fa fa-refresh adminIcon" aria-hidden="true"></i><br/>Rerender Asset</a>
				</div>
			</div>
			<?php endif;?>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>