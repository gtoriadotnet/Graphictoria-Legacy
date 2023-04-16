<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo config::getName();?> | Online Users</title>
		<?php html::buildHead();?>
	</head>
	<body>
		<?php 
			html::getNavigation();
		?>
		<script>
			$(document).ready(function() {
				console.log("Got online players");
				$("#onlineContainer").load("/core/func/api/users/getOnline.php");
				setInterval(function() {
					$("#onlineContainer").load("/core/func/api/users/getOnline.php");
				}, 5000);
			});
		</script>
		<?php
			$currentTime = date('Y-m-d H:i:s');
			$to_time = strtotime($currentTime);
			$stmt = $dbcon->prepare("SELECT `lastSeen` FROM `users` WHERE `banned` = 0 AND `hideStatus` = 0 ORDER BY `lastSeen` DESC;");
			$stmt->execute();
			$hcount = 0;
			
			foreach($stmt as $result) {
				$from_time = strtotime($result['lastSeen']);
				$timeSince =  round(abs($to_time - $from_time) / 60,2);
				if ($timeSince < 1440){
					$hcount++;
				}
			}
		
			$stmt = $GLOBALS['dbcon']->prepare("SELECT COUNT(*) FROM `users`;");
			$stmt->execute();
			$users = $stmt->fetchColumn(0);
		?>
		<div class="container">
			<div class="col-xs-12">
				<div id="onlineContainer">
					<div class="panel panel-primary">
						<div class="panel-heading" id="count"><span class="fa fa-user"></span> Users currently online</div>
						<div class="panel-body">
						</div>
					</div>
				</div>
				<div id="statisticsContainer">
					<div class="panel panel-primary">
						<div class="panel-heading"><span class="fa fa-server"></span> Statistics</div>
						<div class="panel-body">
							We currently have <?= $users ?> registered users.<br>
							In the past 24 hours, there have been <?php echo $hcount; ?> users online.
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>