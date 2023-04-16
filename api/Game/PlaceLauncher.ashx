<?php
exit('disabled');
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.';charset=utf8', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	$json = ["status"=>0, "authenticationUrl"=>null, "authenticationTicket"=>null, "joinScriptUrl"=>null];
	header("Content-Type: text/plain");
	if(!isset($_COOKIE["a_id"])){
		http_response_code(401);
		exit(json_encode($json));
	}
	if(!isset($_GET["placeId"]) || (int)$_GET["placeId"] != $_GET["placeId"]){
		http_response_code(403);
		exit(json_encode($json));
	}
	
	$stmtUid = $dbcon->prepare("SELECT userId FROM sessions WHERE sessionId=:id;");
	$stmtUid->bindParam(':id', $_COOKIE["a_id"], PDO::PARAM_STR);
	$stmtUid->execute();
	$rUserId = $stmtUid->fetch(PDO::FETCH_ASSOC);
	
	// User row
	$stmtU = $dbcon->prepare("SELECT * FROM users WHERE id=:id;");
	$stmtU->bindParam(':id', $rUserId["userId"], PDO::PARAM_INT);
	$stmtU->execute();
	$rUser = $stmtU->fetch(PDO::FETCH_ASSOC);
	
	// Game row
	$stmtG = $dbcon->prepare("SELECT * FROM games WHERE id=:id;");
	$stmtG->bindParam(':id', $_GET["placeId"], PDO::PARAM_INT);
	$stmtG->execute();
	$rGame = $stmtG->fetch(PDO::FETCH_ASSOC);
	
	if ($stmtU->rowCount() == 0 or $stmtG->rowCount() == 0){
		http_response_code(403);
		exit(json_encode($json));
	}
	
	if ($rUser['publicBan'] == 1){
		$json["status"]=6;
		exit(json_encode($json));
	}
	
	if ($rGame['public'] == 0) {
		if(!isset($_GET["key"])){
			$json["status"]=6;
			exit(json_encode($json));
		}
		$gameKey = $rGame['key'];
		$stmtU = $dbcon->prepare("SELECT * FROM gameKeys WHERE userid=:id AND `key` = :key;");
		$stmtU->bindParam(':id', $rUserId["userId"], PDO::PARAM_INT);
		$stmtU->bindParam(':key', $_GET["key"], PDO::PARAM_STR);
		$stmtU->execute();
		if ($stmtU->rowCount() == 0 and $rGame['creator_uid'] != $rUserId["userId"] and $rUser['rank'] == 0){
			$json["status"]=6;
			exit(json_encode($json));
		}
	}
	
	$json["status"] = 2;
	$json["authenticationUrl"] = "http://api.graphictoria.cf/Login/Negotiate.ashx";
	$json["authenticationTicket"] = $rUser["gameKey"];
	$json["joinScriptUrl"] = "http://api.graphictoria.cf/Game/Join.ashx?gID=" . $_GET["placeId"];
	exit(json_encode($json, JSON_UNESCAPED_SLASHES));
?>