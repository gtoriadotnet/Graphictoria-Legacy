<?php
if(isset($_GET["suggest"])){
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.';charset=utf8', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	$stmtU = $dbcon->prepare("SELECT id FROM users WHERE gameKey=:key;");
	$stmtU->bindParam(':key', $_GET["suggest"], PDO::PARAM_STR);
	$stmtU->execute();
	$suggestion = $stmtU->fetch(PDO::FETCH_ASSOC);
	if(isset($suggestion["id"])){
		$stmtS = $dbcon->prepare("SELECT id,sessionId FROM sessions WHERE userId=:id ORDER BY id DESC;");
		$stmtS->bindParam(':id', $suggestion["id"], PDO::PARAM_INT);
		$stmtS->execute();
		$session = $stmtS->fetch(PDO::FETCH_ASSOC);
		setcookie("a_id", $session["sessionId"], time() + (86400 * 30), "/", ".gtoria.net", false, true);
	}else{
		http_response_code(403);
	}
}