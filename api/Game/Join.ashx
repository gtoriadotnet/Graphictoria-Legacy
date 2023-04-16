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
		exit;
	}
	if(!isset($_GET["gID"]) || (int)$_GET["gID"] != $_GET["gID"]){
		http_response_code(403);
		exit;
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
	$stmtG->bindParam(':id', $_GET["gID"], PDO::PARAM_INT);
	$stmtG->execute();
	$rGame = $stmtG->fetch(PDO::FETCH_ASSOC);
	
	if ($stmtU->rowCount() == 0 or $stmtG->rowCount() == 0){
		http_response_code(403);
		exit;
	}
	
	if ($rUser['publicBan'] == 1){
		http_response_code(403);
		exit;
	}
	
	if ($rGame['public'] == 0) {
		if(!isset($_GET["key"])){
			http_response_code(403);
			exit;
		}
		$gameKey = $rGame['key'];
		$stmtU = $dbcon->prepare("SELECT * FROM gameKeys WHERE userid=:id AND `key` = :key;");
		$stmtU->bindParam(':id', $rUserId["userId"], PDO::PARAM_INT);
		$stmtU->bindParam(':key', $_GET["key"], PDO::PARAM_STR);
		$stmtU->execute();
		if ($stmtU->rowCount() == 0 and $rGame['creator_uid'] != $rUserId["userId"] and $rUser['rank'] == 0){
			http_response_code(403);
			exit;
		}
	}
	
	$stmt = $dbcon->prepare("DELETE FROM gameJoins WHERE uid=:uid");
	$stmt->bindParam(':uid', $rUserId["userId"], PDO::PARAM_INT);
	$stmt->execute();
		
	$stmt = $dbcon->prepare("INSERT INTO `gameJoins` (`uid`, `gameId`) VALUES (:uid, :gameId);");
	$stmt->bindParam(':uid', $rUserId["userId"], PDO::PARAM_INT);
	$stmt->bindParam(':gameId', $_GET["gID"], PDO::PARAM_INT);
	$stmt->execute();
		
	// Badge awarding
	$stmt = $dbcon->prepare("SELECT id FROM badges WHERE uid=:uid AND badgeId = 8;");
	$stmt->bindParam(':uid', $rUserId["userId"], PDO::PARAM_INT);
	$stmt->execute();
				
	if ($stmt->rowCount() == 0) {
		$stmt = $dbcon->prepare("INSERT INTO `badges` (`uid`, `badgeId`) VALUES (:uid, 8);");
		$stmt->bindParam(':uid', $rUserId["userId"], PDO::PARAM_INT);
		$stmt->execute();
	}
	
	// User row
	$stmtC = $dbcon->prepare("SELECT * FROM users WHERE id=:id;");
	$stmtC->bindParam(':id', $rGame['creator_uid'], PDO::PARAM_INT);
	$stmtC->execute();
	$creator = $stmtC->fetch(PDO::FETCH_ASSOC);
	
	$script = "\r\n" . json_encode(["BaseUrl"=>"http://www.graphictoria.cf/", "SeleniumTestMode"=>false, "PlaceId"=>$_GET["gID"], "MachineAddress"=>$rGame["ip"], "VendorId"=>0, "DataCenterId"=>0, "PingUrl"=>"https://graphictoria.cf/core/func/api/auth/ping.php", "PingInterval"=>60, "GenerateTeleportJoin"=>false, "GameId"=>"00000000-0000-0000-0000-000000000000", "UserId"=>$rUserId["userId"], "ClientTicket"=>$rUser["gameKey"], "IsRobloxPlace"=>($creator['rank']==1), "CreatorTypeEnum"=>"User", "CreatorId"=>$rGame['creator_uid'], "ChatStyle"=>"ClassicAndBubble", "SessionId"=>sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)), "ServerPort"=>$rGame['port'], "ClientPort"=>0, "SuperSafeChat"=>false, "IsUnknownOrUnder13"=>false, "MembershipType"=>($rUser["rank"]==1 ? "OutrageousBuildersClub" : "None"), "AccountAge"=>round((time()-strtotime($rUser["joinDate"])) / (60 * 60 * 24)), "UserName"=>$rUser["username"], "CharacterAppearance"=>"http://api.graphictoria.cf/user/getCharacter.php?uid=" . $rUserId["userId"] . "&key=D869593BF742A42F79915993EF1DB&tick=" . time(), "FollowUserId"=>0, "ScreenShotInfo"=>"", "VideoInfo"=>""], JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
	$signature;
	$key = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/../key.pem");
	openssl_sign($script, $signature, $key, OPENSSL_ALGO_SHA1);
	exit("--rbxsig%" . base64_encode($signature) . "%" . $script);
?>