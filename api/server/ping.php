<?php
	exit('disabled');
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}
	
	if (isset($_GET['key'])) {
		$key = htmlentities($_GET['key'], ENT_QUOTES, "UTF-8");
		if (strlen($key) == 0) {
			exit;
		}
	}else{
		exit;
	}
	
	//if ($_SERVER['HTTP_USER_AGENT'] != "Graphictoria3") {
	//	exit;
	//}
	
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	
	$query = "SELECT lastPing FROM games WHERE `privatekey` = :key LIMIT 1;";
	$stmt = $dbcon->prepare($query);
	$stmt->bindParam(':key', $key, PDO::PARAM_STR); 
	$stmt->execute(); 
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$currentTime = date('Y-m-d H:i:s');
	$from_time = strtotime($result['lastPing']);
	$to_time = strtotime($currentTime);
	$timeSince =  round(abs($to_time - $from_time) / 60,2);
	if ($timeSince > 0.4) {
		$stmt = $dbcon->prepare("UPDATE games SET lastPing=NOW() WHERE `privatekey`=:key;");
		$stmt->bindParam(':key', $key, PDO::PARAM_STR);
		$stmt->execute();
	}

	if (isset($_GET['players'])) {
		$nPlayers = $_GET['players'];
		$stmt = $dbcon->prepare("UPDATE games SET numPlayers=:np WHERE `privatekey`=:key;");
		$stmt->bindParam(':np', $nPlayers, PDO::PARAM_INT);
		$stmt->bindParam(':key', $key, PDO::PARAM_STR);
		$stmt->execute();
	}
	
	$dbcon = null;
?>