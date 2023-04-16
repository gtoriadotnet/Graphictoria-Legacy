<?php
exit('disabled');
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}
	$IP = $_SERVER['REMOTE_ADDR'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Report Abuse</title>
	</head>
	<body>
		<div class="container">
			<?php
				if (isset($_POST['submitreport'])) {
					$username = $_POST['username'];
					$reason = $_POST['reason'];
					
					$error = false;
					if (strlen($username) == 0) {
						$error = true;
						echo '<h4>An error has occurred.</h4>';
						echo 'You need to specifiy an username.<br><a href="http://api.xdiscuss.net/AbuseReport/InGameChat.php">Go back</a>';
					}
					
					if (strlen($username) > 20 and $error == false) {
						$error = true;
						echo '<h4>An error has occurred.</h4>';
						echo 'The username you specified is too long.<br><a href="http://api.xdiscuss.net/AbuseReport/InGameChat.php">Go back</a>';
					}
					
					if (strlen($reason) == 0 and $error == false) {
						$error = true;
						echo '<h4>An error has occurred.</h4>';
						echo 'You need to specifiy a reason.<br><a href="http://api.xdiscuss.net/AbuseReport/InGameChat.php">Go back</a>';
					}
					
					if (strlen($reason) > 256 and $error == false) {
						$error = true;
						echo '<h4>An error has occurred.</h4>';
						echo 'The reason you specified is too long.<br><a href="http://api.xdiscuss.net/AbuseReport/InGameChat.php">Go back</a>';
					}
					if ($error == false) {
						// Create database connection.
						include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
						try{
							$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
							$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
							$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
						}catch (PDOExpection $e){
							exit;
						}
						
						$stmt = $dbcon->prepare("SELECT * FROM users WHERE username=:uid;");
						$stmt->bindParam(':uid', $username, PDO::PARAM_INT);
						$stmt->execute();
						$result = $stmt->fetch(PDO::FETCH_ASSOC);
						$error = false;
						
						if ($stmt->rowCount() == 0) {
							$error = true;
							echo '<h4>An error has occurred.</h4>';
							echo 'The user you are reporting does not exist.<br><a href="http://api.xdiscuss.net/AbuseReport/InGameChat.php">Go back</a>';
						}
						if ($error == false) {
							if ($result['banned'] == 1) {
								$error = true;
								echo '<h4>An error has occurred.</h4>';
								echo 'The user you are reporting has been banned.<br><a href="http://api.xdiscuss.net/AbuseReport/InGameChat.php">Go back</a>';
							}
						}
						if ($error == false) {
							// Check if the same user has reported already.
							$stmt = $dbcon->prepare("SELECT * FROM reports WHERE reportIP=:ip AND target=:username;");
							$stmt->bindParam(':ip', $IP, PDO::PARAM_STR);
							$stmt->bindParam(':username', $username, PDO::PARAM_STR);
							$stmt->execute();
							$result = $stmt->fetch(PDO::FETCH_ASSOC);
							if ($stmt->rowCount() > 0) {
								echo '<h4>An error has occurred.</h4>';
								echo 'You have already reported this user.<br><a href="http://api.xdiscuss.net/AbuseReport/InGameChat.php">Go back</a>';
							}else{
								$query = "INSERT INTO reports (`target`, `reason`, `date`, `reportIP`) VALUES (:username, :reason, NOW(), :ip);";
								$stmt = $dbcon->prepare($query);
								$stmt->bindParam(':username', $username, PDO::PARAM_STR);
								$stmt->bindParam(':reason', $reason, PDO::PARAM_STR);
								$stmt->bindParam(':ip', $IP, PDO::PARAM_STR);
								$stmt->execute();
								
								echo '<h4>Thank you!</h4>';
								echo 'Your report has been saved. Thanks again!';
							}
						}
					}
					$dbcon = null;
					exit;
				}
			?>
			<h4>Report Abuse</h4>
			<form method="post">
				Username of rule breaker
				<input style="width:100%;" name="username" maxlength="20" type="text" class="form-control"></input>
				Say what this user did wrong
				<textarea style="width:100%;" name="reason" maxlength="256" rows="3" class="form-control"></textarea>
				<button type="submit" name="submitreport" style="width:100%;">Submit Report</button>
			</form>
		</div>
	</body>
</html>