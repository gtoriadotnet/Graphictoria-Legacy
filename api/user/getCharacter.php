<?php
	//if ($_SERVER['HTTP_USER_AGENT'] != "Graphictoria/WinInet") exit;
	if (!isset($_GET['key']) || is_array($_GET['key']) || $_GET['key'] != "D869593BF742A42F79915993EF1DB") exit;
	
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.';charset=utf8', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	
	header('Content-Type: text/plain');
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	
	if (isset($_GET['uid'])) {
		$uid = $_GET['uid'];
		if (strlen($uid) == 0) {
			$dbcon = null;
			exit;
		}
		if (!is_numeric($uid)) {
			$dbcon = null;
			exit;
		}
	}else{
		$dbcon = null;
		exit;
	}

	if (isset($_GET['mode'])) {
		$mode = $_GET['mode'];
		$assetId = $_GET['sid'];
		if (!is_numeric($assetId)) {
			$dbcon = null;
			exit;
		}
		if ($mode != "ch") {
			echo 'http://gtoria.net/asset/?id='.$assetId;
			$dbcon = null;
			exit;
		} else {
			echo '';
		}
	}
	
	if (isset($_GET['dgear'])) {
		$disableGear = true;
	}else{
		$disableGear = false;
	}
	
	$stmt = $dbcon->prepare("SELECT id FROM users WHERE id=:uid;");
	$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
	$stmt->execute();
	if ($stmt->rowCount() == 0) {
		$dbcon = null;
		exit;
	}
	
	$stmt = $dbcon->prepare("SELECT * FROM wearing WHERE uid=:uid;");
	$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
	$stmt->execute();
	if ($stmt->rowCount() == 0) {
		echo 'http://api.gtoria.net/user/getcolors.php?uid='.$uid.'&cachebuster='.time();
	}else{
		echo 'http://api.gtoria.net/user/getcolors.php?uid='.$uid.'&cachebuster='.time().';';
	}
	
	$equippedGearCatalogId = 0;
	$count = 0;
	foreach($stmt as $result) {
		if ($disableGear == true and $result['type'] == "gear") {
		}else{
			if($result['type'] == "gear")
			{
				$equippedGearCatalogId = $result['catalogId'];
			}
			if ($count !== $stmt->rowCount()-1) {
				echo $result['aprString'].($result['type'] == "gear" ? '?equipped=1' : '').';';
			}else{
				echo $result['aprString'].($result['type'] == "gear" ? '?equipped=1' : '');
			}
		}
		$count++;
	}
	
	if ($disableGear == false) {
		$stmt = $dbcon->prepare('SELECT `datafile` FROM `catalog` cat JOIN `owneditems` own JOIN `wearing` wear WHERE own.`uid` = :pid AND own.`type` = "gear" AND wear.`uid` = :uid AND wear.`type` = "gear" AND NOT own.`catalogid` = wear.`catalogId` AND cat.`id` = own.`catalogid`;');
		$stmt->bindParam(':pid', $uid, PDO::PARAM_INT);
		$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
		$stmt->execute();
		
		if($stmt->rowCount() > 0)
		{
			echo ';';
		}
		
		$count = 0;
		foreach($stmt as $result) {
			if ($count !== $stmt->rowCount()-1) {
				echo 'http://gtoria.net/data/assets/gear/models/'.$result['datafile'].';';
			}else{
				echo 'http://gtoria.net/data/assets/gear/models/'.$result['datafile'];
			}
			$count++;
		}
	}
	
	$dbcon = null;
?>