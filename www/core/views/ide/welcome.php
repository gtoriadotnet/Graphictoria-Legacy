<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo config::getName();?> | Welcome</title>
		<?php html::buildHead();?>
		<link type="text/css" rel="stylesheet" href="/core/html/css/ide.css"/>
	</head>
	<body>
		<?php html::getNavigation();?>
		<div class="container">
			<h3 style="margin-left: 18px;">Welcome to Graphictoria Studio</h3>
			<div class="col-xs-12 col-sm-12 col-md-3">
				<div class="well profileCard" id="recentlyOpenedPlaces">
					<h4 style="margin:0 0 2px">Recently Opened Files</h4>
					<?php
						$query = $_SERVER['QUERY_STRING'];
						$places = 0;
						
						foreach(explode('&', $query) as $pair)
						{
							list($key, $value) = explode('=', $pair);
							if($key != '')
							{
								if($key == 'filename')
								{
									$places += 1;
									echo '<a href="#" class="fileLink" onclick="loadFile(\'' . htmlspecialchars(urldecode($value)) . '\')">' . htmlspecialchars(urldecode(urldecode($value))) . '</a>';
								}
							}
						}
						
						if($places == 0)
						{
							echo '<p class="muted" style="margin:0;">You haven\'t opened any places yet!</p>';
						}
					?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-9 gameCardCol">
				<h4>Place Templates</h4>
				<div>
					<div class="gameCard center" onclick="loadTemplate('baseplate')">
						<img name="thumbnail" src="https://gtoria.net/html/img/templates/placeholder.png" data-src="https://gtoria.net/html/img/templates/baseplate.png" alt="baseplate" width="240" height="120"/>
						<p>Baseplate</p>
					</div>
					<div class="gameCard center" onclick="loadTemplate('terrain')">
						<img name="thumbnail" src="https://gtoria.net/html/img/templates/placeholder.png" data-src="https://gtoria.net/html/img/templates/terrain.png" alt="terrain" width="240" height="120"/>
						<p>Flat Terrain</p>
					</div>
					<div class="gameCard center" onclick="loadTemplate('ffa')">
						<img name="thumbnail" src="https://gtoria.net/html/img/templates/placeholder.png" data-src="https://gtoria.net/html/img/templates/ffa.png" alt="ffa" width="240" height="120"/>
						<p>Free for All</p>
					</div>
					<div class="gameCard center" onclick="loadTemplate('tdm')">
						<img name="thumbnail" src="https://gtoria.net/html/img/templates/placeholder.png" data-src="https://gtoria.net/html/img/templates/tdm.png" alt="tdm" width="240" height="120"/>
						<p>Team Death Match</p>
					</div>
				</div>
			</div>
			<script src="/core/func/js/ide/welcome.js?v=31"></script>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>