<?php
exit('disabled');
	// If Cloudflare sent an IP, replace it.
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	$IP = $_SERVER['REMOTE_ADDR'];
	
	// Check if everything exists.
	if (!isset($_GET['gameId'])) exit;
	if (is_array($_GET['gameId'])) exit;
	if (!is_numeric($_GET['gameId'])) exit;
	$gameId = $_GET['gameId'];
	
	if (!isset($_GET['key'])) exit;
	if (is_array($_GET['key'])) exit;
	$key = $_GET['key'];
	
	if (!isset($_GET['uid'])) exit;
	if (is_array($_GET['uid'])) exit;
	if (!is_numeric($_GET['uid'])) exit;
	$uid = $_GET['uid'];
	
	// Create database connection.
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	
	// Validate everything
	$stmt = $dbcon->prepare("SELECT gameKey, rank FROM users WHERE id=:uid;");
	$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if ($result['gameKey'] != $key) echo 'no';
	if ($result['gameKey'] == $key && strlen($result['gameKey']) > 0) {
		$stmt = $dbcon->prepare("SELECT * FROM games WHERE id=:id;");
		$stmt->bindParam(':id', $gameId, PDO::PARAM_INT);
		$stmt->execute();
		$rGame = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$gameKey = $rGame['key'];
		if ($rGame['public'] == 0) {
			$stmtU = $dbcon->prepare("SELECT * FROM gameKeys WHERE userid=:id AND `key` = :key;");
			$stmtU->bindParam(':id', $uid, PDO::PARAM_INT);
			$stmtU->bindParam(':key', $gameKey, PDO::PARAM_STR);
			$stmtU->execute();
			if ($stmtU->rowCount() == 0 and $rGame['creator_uid'] != $uid and $result['rank'] == 0 and $rGame['public'] == 0) {
				echo 'no';
				$dbcon = null;
				exit;
			}
		}
		
		$stmt = $dbcon->prepare("DELETE FROM gameJoins WHERE uid=:uid");
		$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
		$stmt->execute();
		
		$stmt = $dbcon->prepare("INSERT INTO `gameJoins` (`uid`, `gameId`) VALUES (:uid, :gameId);");
		$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
		$stmt->bindParam(':gameId', $gameId, PDO::PARAM_INT);
		$stmt->execute();
		
		// Badge awarding
		$stmt = $dbcon->prepare("SELECT id FROM badges WHERE uid=:uid AND badgeId = 8;");
		$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
		$stmt->execute();
				
		if ($stmt->rowCount() == 0) {
			$stmt = $dbcon->prepare("INSERT INTO `badges` (`uid`, `badgeId`) VALUES (:uid, 8);");
			$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
			$stmt->execute();
		}
		echo 'yes';
	}
	
	$dbcon = null;
?>