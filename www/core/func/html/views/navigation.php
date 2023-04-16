<script src="/core/func/js/html/navigation.js?v=1010"></script>
<?php
	$addS = "";
	if ($GLOBALS['loggedIn'] && $GLOBALS['userTable']['themeChoice'] == 1) $addS = "background-color:#333;border-color:#282828";
?>
<nav class="navbar navbar-inverse navbar-fixed-top navbar" style="box-shadow:0 1px 2px 0 rgba(34,36,38,.15);<?php echo $addS;?>">
	<div class="container">
		<div class="navbar-header">
			<?php if (!$GLOBALS['loggedIn'] || $GLOBALS['userTable']['banned'] == 0): ?>
				<?php if ($GLOBALS['loggedIn']): ?>
					<button type="button" class="navbar-toggle collapsed" id="navbarSideButton">
				<?php else: ?>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
				<?php endif; ?>
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<?php endif; ?>
			<a style="margin: 2px 0px 0px;" class="navbar-brand" href="/"><img width="50" height="50" src="/core/html/img/logo.png"></a>
		</div>
		<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
			<?php if (!$GLOBALS['loggedIn'] || $GLOBALS['userTable']['banned'] == 0): ?>
			<ul class="nav navbar-nav">
				<li><a href="/forum">Forum</a></li>
				<li><a href="/games">Games</a></li>
				<li><a href="/catalog">Catalog</a></li>
				<li style="margin:3px 0px 0px;" class="dropdown">
					<a style="margin: -2px 0px 0px;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More <span class="caret"></span></a>
					<?php
						$addS2 = "margin-top:3px;";
						if ($GLOBALS['loggedIn'] && $GLOBALS['userTable']['themeChoice'] == 1) $addS2 = "margin-top:3px;color: #fff;border: 1px solid #282828;background-color: #333";
					?>
					<ul class="dropdown-menu" role="menu" style="<?php echo $addS2;?>">
						<?php
							if ($GLOBALS['loggedIn']) {
								if ($GLOBALS['userTable']['rank'] > 0) {
									$stmt = $GLOBALS['dbcon']->prepare("SELECT id FROM catalog WHERE approved = 0 AND declined = 0;");
									$stmt->execute();
									echo '<li><a href="/admin">Admin <span class="badge" style="background-color: #f44336;font-size:10px;padding: 6px 6px;"> '.$stmt->rowCount().'</span></a></li><li class="divider"></li>';
								}
								echo '<li><a href="/catalog/upload">Upload new Item</a></li>
								<li><a href="/games/new">Add Server</a></li>
									  <li><a href="/groups">Groups</a></li>
								      <li class="divider"></li>';
							}
						?>
						<li><a href="/users">Users</a></li>
						<li><a href="https://discord.gg/q666a2sF6d">Discord</a></li>
					</ul>
				</li>
			</ul>
			<div class="navbar-form navbar-left" role="search">
				<div class="form-group" id="navSearch">
					<input type="text" id="searchValue" class="form-control" style="display:none" placeholder="Username" autocomplete="off"></input>
				</div>
				<a id="switchSearch" style="display:none"><span class="caret"></span></a>
				<button type="submit" id="searchUser" class="btn btn-default" style="display:none">Search</button>
			</div>
			<?php endif; ?>
			<ul class="nav navbar-nav navbar-right">
				<?php
					if (!$GLOBALS['loggedIn']) {
						include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/html/views/navigation/loginPanel.php';
					}else{
						include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/html/views/navigation/rightNavigation.php';
					}
				?>
			</ul>
		</div>
	</div>
		<ul class="navbar-side navbarSide">
			<?php if ($GLOBALS['loggedIn']): ?>
				<li style="background-color:black">
				<div class="row" style="margin-right:0px">
					<div class="col-xs-4">
						<div style="margin-left:10px;position: relative;border:solid 1px #555555;height:50px;width:50px;height:50px;border-radius:50%;overflow: hidden" id="charImg" class="img-circle"><a style="margin-left:10px;color:#fff" href="/user/profile/<?php echo $GLOBALS['userTable']['username'];?>"><img style="position:absolute;left:0" src="<?php echo context::getUserHeadshotImage($GLOBALS['userTable']);?>" height="50"></div> <?php echo $GLOBALS['userTable']['username']?></a>
					</div>
					<div class="col-xs-4">
						<p style="margin-top:15px"><a style="color:#fff" data-toggle="tooltip" data-placement="bottom" data-original-title="Posties, used to buy exclusive items, rewarded to you by Graphictoria staff"><span class="fa fa-gg-circle"></span> <span id="userPosties"><?php echo $GLOBALS['userTable']['posties'];?></span></a></p>
						<p><a style="color:#fff" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo context::humanTiming(strtotime($GLOBALS['userTable']['lastAward'])); ?> until next reward"><span class="fa fa-money"></span> <span id="userCoins"><?php echo $GLOBALS['userTable']['coins'];?></span></a></p>
					</div>
					<div class="col-xs-4">
						<?php
							$query = "SELECT id FROM `friendRequests` WHERE `recvuid` = :id;";
							$stmt = $GLOBALS['dbcon']->prepare($query);
							$stmt->bindParam(':id', $GLOBALS['userTable']['id'], PDO::PARAM_INT);
							$stmt->execute();
							$numRequests = $stmt->rowCount();
							
							if ($numRequests == 0) {
								echo '<p style="margin-top:15px"><a style="color:#fff" data-toggle="tooltip" data-placement="bottom" data-original-title="Friends" href="/friends"><span class="fa fa-users"></span></a></p>';
							}else{
								echo '<p style="margin-top:15px"><a style="color:#fff" data-toggle="tooltip" data-placement="bottom" data-original-title="Friends" href="/friends"><span class="fa fa-users"></span><span class="badge" style="background-color: #f44336;font-size:10px;padding: 6px 6px;"> '.$numRequests.'</span></a></p>';
							}
							
							$query = "SELECT id FROM `messages` WHERE `recv_uid` = :id AND `read` = 0";
							$stmt = $GLOBALS['dbcon']->prepare($query);
							$stmt->bindParam(':id', $GLOBALS['userTable']['id'], PDO::PARAM_INT);
							$stmt->execute();
							$numMessages = $stmt->rowCount();
							
							if ($numMessages == 0) {
								echo '<p><a style="color:#fff" data-toggle="tooltip" data-placement="bottom" data-original-title="Messages" href="/user/messages"><span class="fa fa-envelope-open-o"></span></a></p>';
							}else{
								echo '<p><a style="color:#fff" data-toggle="tooltip" data-placement="bottom" data-original-title="Messages" href="/user/messages"><span class="fa fa-envelope-open-o"></span><span class="badge" style="background-color: #f44336;font-size:10px;padding: 6px 6px;"> '.$numMessages.'</span></a></p>';
							}
						?>
					</div>
				</div>
				</li>
				<li class="navbar-side-item"><a style="color:#999" href="/">Dashboard</a></li>
				<li class="navbar-side-item"><a style="color:#999" href="/user/settings">Settings</a></li>
				<li class="navbar-side-item"><a style="color:#999" href="/user/character">Character</a></li>
				<li class="navbar-side-item"><a style="color:#999" href="/forum">Forum</a></li>
				<li class="navbar-side-item"><a style="color:#999" href="/games">Games</a></li>
				<li class="navbar-side-item"><a style="color:#999" href="/catalog">Catalog</a></li>
				<?php
					if ($GLOBALS['userTable']['rank'] > 0) {
						$stmt = $GLOBALS['dbcon']->prepare("SELECT id FROM catalog WHERE approved = 0 AND declined = 0;");
						$stmt->execute();
						echo '<li class="navbar-side-item"><a style="color:#999" href="/admin">Admin <span class="badge" style="background-color: #f44336;font-size:10px;padding: 6px 6px;"> '.$stmt->rowCount().'</span></a></li><li class="divider"></li>';
					}
				?>
				<li class="navbar-side-item"><a style="color:#999" href="/games/new">Add Server</a></li>
				<li class="navbar-side-item"><a style="color:#999" href="/groups">Groups</a></li>
				<li class="navbar-side-item"><a style="color:#999" href="/users">Users</a></li>
				<li class="navbar-side-item"><a style="color:#999" href="https://discord.gg/q666a2sF6d">Discord</a></li>
				<li class="navbar-side-item"><a style="color:#999" href="/user/logout">Sign out</a></li>
			<?php endif; ?>
		</ul>
		<div class="overlay"></div>
</nav>
<?php
	$query = "SELECT COUNT(*) FROM `renders`;";
	$stmt = $GLOBALS['dbcon']->prepare($query);
	$stmt->execute();
	$renders = $stmt->fetchColumn(0);
	
	$news_on = true;
	
	if($renders >= 30)
	{
		echo '<div style="margin-bottom:54px"></div>';
		echo '<div class="alert alert-'.($renders < 200 ? 'warning' : 'danger').' center"'.($news_on ? ' style="margin-bottom:0px"' : '').'><b>Warning</b> - The render queue is currently '.($renders < 200 ? 'high' : 'very high').'. It may take a while for your avatar to change. (<b>'.$renders.'</b> renders queued)</div>';
	}
	
	if ($news_on) {
		if($renders < 30)
		{
			echo '<div style="margin-bottom:54px"></div>';
		}
		echo '<div class="alert alert-danger center">Outgoing mail is temporarily disabled.</div>';
		//echo '<div class="alert alert-success center">The thumbnail system has been redone completely. If you see a blank thumbnail, it may still be rendering. If the issue persists, please send a message in the <b style="color:white!important">#bugs</b> section of the <a class="alert-link" href="https://discord.gg/q666a2sF6d">Discord server</a>.</div>';
		//echo '<div class="alert alert-danger center">Graphictoria is under maintenance</div>';
		//echo '<div class="alert alert-warning center"><b style="color:white!important">Note</b> - The client is not released yet. (<a class="alert-link" href="https://discord.gg/q666a2sF6d">Join our Discord!</a>)</div>';
		//echo '<div class="alert alert-success center" style="padding-top: 7px;padding-bottom: 5px;"><b>Graphictoria Studio</b> has been released early! &nbsp; <a href="https://api.gtoria.net/launcher/GraphictoriaStudioLauncher.exe" class="btn btn-primary">Download it here!</a></div>';
		//echo '<div class="alert alert-danger center">Maintenance is currently being performed on the database. The site may experience some unexpected downtime.</div>';
		//echo '<div class="alert alert-info center"><b>Heads up!</b> More hats have been uploaded to the <a class="alert-link" href="/catalog">catalog</a>. <i style="font-size:10px;opacity:70%">(client still isnt released yet)</i></div>';
		//echo '<div class="alert alert-danger center">We\'re currently experiencing some techinical difficulties. Avatar generation may be slow.</div>';
		//echo '<div class="alert alert-danger center">We\'re currently experiencing some techinical difficulties. The site may go down periodically.</div>';
		//echo '<div class="alert alert-danger center">Avatars are currently being re-rendered. It may be a while before you see your avatar changes to take effect.</div>';
		//echo '<div class="alert alert-danger center"><a class="alert-link" href="https://gtoria.net/forum+587"><b>Please read:</b> Epiculy exposé thread</a></div>';
	}else{
		echo '<div style="margin-bottom:79px"></div>';
	}
?>

<div class="modal globalModal" tabindex="-1" role="dialog" aria-labelledby="modalglobal" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content center gModalContent">
			<h4 class="modal-title" id="modalUsername"></h4>
			<div class="modal-body" id="miniProfileContent">
				<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="globalModal2" tabindex="-1" role="dialog" aria-labelledby="globalModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" id="gModalHeader">
				<h5 class="modal-title" id="gModalTitle">Modal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="gModalErrorContainer"></div>
			<div class="modal-body" id="gModalBody">
			</div>
		</div>
	</div>
</div>

<?php
	$appear = false;
	if ($GLOBALS['loggedIn']) {
		if ($GLOBALS['userTable']['banned'] == 0 && $GLOBALS['userTable']['emailverified'] == 1) {
			if ($GLOBALS['sessionTable']['factorFinish'] == 1 && $GLOBALS['userTable']['2faEnabled'] == 1) {
				$appear = true;
			}else{
				if ($GLOBALS['userTable']['2faEnabled'] == 0) {
					$appear = true;
				}
			}
		}
	}

	if ($appear): ?>
	<script src="/core/func/js/chat.js?tick=1099"></script>
	<div id="desktopChat" class="desktopView">
		<div class="chatOpener">Chat</div>
		<div class="chatOptions"></div>
		<div class="chatOpenbackground">
			<button class="btn btn-success addChatBtn fullWidth" style="border-radius: 0px" onclick="renderChatChoices();">Add Chat</button>
			<div class="chatContainer"></div>
		</div>
	</div>
<?php endif; ?>