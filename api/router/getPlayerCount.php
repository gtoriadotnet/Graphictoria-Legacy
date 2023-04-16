<?php
	exit('disabled');
	if (!isset($_GET['serverKey'])) exit;
	$serverKey = $_GET['serverKey'];
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		echo $e->getMessage();
	}
	
	$stmt = $dbcon->prepare('SELECT numPlayers, lastPing FROM games WHERE privatekey = :key ORDER BY id ASC LIMIT 1;');
	$stmt->bindParam(':key', $serverKey, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($stmt->rowCount() > 0) {
		$timeSince = round(abs(strtotime(date('Y-m-d H:i:s')) - strtotime($result['lastPing'])) / 60,2);
		if ($timeSince > 5 || $result['lastPing'] == null) {
			echo '0';
		}else{
			echo $result['numPlayers'];
		}
	}else{
		echo '0';
	}
	
	$dbcon = null;
?>