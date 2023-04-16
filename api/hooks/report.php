<?php
exit('disabled');
	if (!isset($_GET['message'])) exit;
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) 
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	
	
	if ($_SERVER['HTTP_USER_AGENT'] != "WEBHOOK GUY" || !isset($_GET['key']) || $_GET['key'] != "ZkfGU0SlOd4DZmquah0KAmywAS7rtqDL") 
		exit;
	
	$message = $_GET['message'];
	$message = str_replace("@here", "", $message);
	$message = str_replace("@everyone", "", $message); // Seiko prevention
	
	/*
	*  This is the file everyone claims logs your IP.
	*  Not really, as you can see.
	*/
	
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		echo $e->getMessage();
	}
	
	$stmt = $dbcon->prepare("SELECT username FROM users WHERE `lastIP`=:ip ORDER BY id DESC LIMIT 1");
	$stmt->bindParam(':ip', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$url = "https://canary.discordapp.com/api/webhooks/x/x";
	$dataArray = array('content' => "[Username (assumed): **".$result['username']."**] ".$message, 
						'username' => "Exploiter Alert");
	
	$httpOptions = array(
		'http' => array (
			'header' => "Graphictoria-Server",
			'content-type' => 'multipart/form-data',
			'method' => "POST",
			'content' => http_build_query($dataArray)
		)
	);
	
	$context = stream_context_create($httpOptions);
	$result = @file_get_contents($url, false, $context);
	
	echo 'success';
	$dbcon = null;
?>
