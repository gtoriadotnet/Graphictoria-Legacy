<?php
	exit('disabled');
	if (isset($_GET['userID'])) {
		$userId = $_GET['userID'];
		if (strlen($userId) == 0) {
			$dbcon = null;
			exit;
		}
	}else{
		$dbcon = null;
		exit;
	}
	
	if (isset($_GET['key'])) {
		$key = $_GET['key'];
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
	
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	$stmt = $dbcon->prepare("SELECT gameKey, banned FROM users WHERE id=:id;");
	$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($result['gameKey'] == $key) {
		$query = "SELECT lastSeen, inGame, banned FROM users WHERE id = :id LIMIT 1;";
		$stmt = $dbcon->prepare($query);
		$stmt->bindParam(':id', $userId, PDO::PARAM_INT); 
		$stmt->execute(); 
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result['inGame'] == 0) {
			$stmt = $dbcon->prepare("UPDATE users SET inGame = 1 WHERE id=:id");
			$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
			$stmt->execute();
		}
		
		if ($result['inGame'] != $gameId) {
			$stmt = $dbcon->prepare("UPDATE users SET inGameId = :gameId WHERE id=:id");
			$stmt->bindParam(':gameId', $gameId, PDO::PARAM_INT);
			$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
			$stmt->execute();
		}
		
		$currentTime = date('Y-m-d H:i:s');
		$from_time = strtotime($result['lastSeen']);
		$to_time = strtotime($currentTime);
		$timeSince =  round(abs($to_time - $from_time) / 60,2);
		if ($timeSince > 0.4) {
			$stmt = $dbcon->prepare("UPDATE users SET lastSeen = NOW() WHERE id=:id");
			$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
			$stmt->execute();
		}
	}
	
	if ($result['banned'] > 0) {
		echo 'banned';
	}
	
	$dbcon = null;
?>