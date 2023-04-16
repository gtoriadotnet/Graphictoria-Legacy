<?php
exit('disabled');
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}
	if (isset($_GET['uid'])) {
		$userId = $_GET['uid'];
		if (strlen($userId) == 0) {
			$dbcon = null;
			exit;
		}
	}else{
		$dbcon = null;
		exit;
	}
	
	if (isset($_GET['gameId'])) {
		$gameId = $_GET['gameId'];
	}else{
		$dbcon = null;
		exit;
	}
	
	if (isset($_GET['uname'])) {
		$username = $_GET['uname'];
		if (strlen($username) == 0) {
			$dbcon = null;
			exit;
		}
	}else{
		$dbcon = null;
		exit;
	}
	
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	$stmt = $dbcon->prepare("SELECT username FROM users WHERE id=:id;");
	$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($stmt->rowCount() == 0) {
		echo 'no';
	}else{
		if ($result['username'] != $username) {
			echo 'no';
		}else{
			$stmt = $dbcon->prepare("SELECT * FROM gameJoins WHERE uid=:id;");
			$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() == 0) {
				echo 'no';
			}else{
				$currentTime = date('Y-m-d H:i:s');
				$to_time = strtotime($currentTime);
				$from_time = strtotime($result['time']);
				$timeSince =  round(abs($to_time - $from_time) / 60,2);
				if ($timeSince > 5) {
					echo 'no';
				}else{
					if ($result['gameId'] != $gameId) {
						echo 'no';
					}else{
						echo 'yes';
					}
				}
			}
		}
	}
	$dbcon = null;
?>