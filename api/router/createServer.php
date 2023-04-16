<?php
	exit('disabled');
	if (!isset($_GET['key'])) exit;
	if (!isset($_GET['version'])) exit;
	if (!isset($_GET['userID'])) exit;
	if (!isset($_GET['serverName'])) exit;
	if (!isset($_GET['serverDescription'])) exit;
	if (!isset($_GET['serverPrivacy'])) exit;
	if (!isset($_GET['ip'])) exit;
	if (!isset($_GET['port'])) exit;
	if (!isset($_GET['placeURL'])) exit;
	
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		echo $e->getMessage();
	}
	
	// Define variables
	$serverVersion = $_GET['version'];
	$userID = $_GET['userID'];
	$serverName = $_GET['serverName'];
	$serverDescription = $_GET['serverDescription'];
	$serverPrivacy = $_GET['serverPrivacy'];
	$serverIP = $_GET['ip'];
	$serverPort = $_GET['port'];
	$placeURL = $_GET['placeURL'];
	
	
	// Check the variables
	if ($serverVersion != 3) exit;
	if ($serverPrivacy != 0 && $serverPrivacy != 1) exit;
	
	if ($_GET['key'] != "894cfcdf-7714-4fea-a3f1-436d711a462b") exit;
	if (strlen($userID) == 0 || strlen($serverName) == 0 || strlen($serverName) > 256 || strlen($serverDescription) > 256) exit;
	
	// Define and generate the server public and private key
	$publicKey = md5(microtime().rand());
	$privateKey = md5(microtime().rand());
	
	// Insert the game to the games table and it will appear online as soon the server pings.
	$stmt = $dbcon->prepare("INSERT INTO games (`public`, `creator_uid`, `name`, `description`, `key`, `privatekey`, `version`, `ip`, `port`, `dedi`, `placeURL`) VALUES (:public, :user, :name, :description, :key, :serverkey, :version, :ip, :port, 1, :placeURL);");
	$stmt->bindParam(':public', $serverPrivacy, PDO::PARAM_INT);
	$stmt->bindParam(':version', $serverVersion, PDO::PARAM_INT);
	$stmt->bindParam(':serverkey', $privateKey, PDO::PARAM_STR);
	$stmt->bindParam(':user', $userID, PDO::PARAM_INT);
	$stmt->bindParam(':name', $serverName, PDO::PARAM_STR);
	$stmt->bindParam(':description', $serverDescription, PDO::PARAM_STR);
	$stmt->bindParam(':key', $publicKey, PDO::PARAM_STR);
	$stmt->bindParam(':port', $serverPort, PDO::PARAM_INT);
	$stmt->bindParam(':ip', $serverIP, PDO::PARAM_STR);
	$stmt->bindParam(':placeURL', $placeURL, PDO::PARAM_STR);
	$stmt->execute();
	
	// Return the game ID and private key so we execute the proper Lua code on the router.
	$stmt = $dbcon->prepare("SELECT * FROM games WHERE `creator_uid`=:uid ORDER BY id DESC LIMIT 1;");
	$stmt->bindParam(':uid', $userID, PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
	// Insert a request for the imageServer
	if (file_exists("/var/www/api/imageServer/server/".$result['id'])) @unlink("/var/www/api/imageServer/server/".$result['id']);
	if ($serverVersion == 1) {
		$stmt = $dbcon->prepare("INSERT INTO renders (`render_id`, `type`, `version`) VALUES (:placeURL, 'server', 2);");
		$stmt->bindParam(':placeURL', $result['id'], PDO::PARAM_INT);
		$stmt->execute();
	}else{
		$stmt = $dbcon->prepare("INSERT INTO renders (`render_id`, `type`) VALUES (:placeURL, 'server');");
		$stmt->bindParam(':placeURL', $result['id'], PDO::PARAM_INT);
		$stmt->execute();
	}
	
	// Return the ID and private key
	echo $result['id'].'-'.$result['privatekey'];
	$dbcon = null;
?>