<?php
	if (isset($_POST['csrf']) and isset($_POST['pose'])) {
		include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
		$csrf = $_POST['csrf'];
		$pose = $_POST['pose'];
		if ($csrf != $GLOBALS['csrf_token'] or $GLOBALS['loggedIn'] == false or strlen($pose) == 0) die("error");
		
		$poseID = 0;
		if ($pose == "walking") $poseID = 1;
		if ($pose == "sitting") $poseID = 2;
		if ($pose == "overlord") $poseID = 3;
		if ($pose == "normal") $poseID = 0;
		
		$uid = $GLOBALS['userTable']['id'];
		
		$query = "UPDATE users SET charap = :pose WHERE id = :uid";
		$stmt = $dbcon->prepare($query);
		$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
		$stmt->bindParam(':pose', $poseID, PDO::PARAM_INT);
		$stmt->execute();
		
		$stmt = $GLOBALS['dbcon']->prepare("SELECT `id` FROM `wearing` WHERE `uid`=:uid AND `type`=\"gear\";");
		$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
		$stmt->execute();
		$hasGear = (($stmt->rowCount() > 0) ? 1 : 0);
		
		context::requestImage($uid, "headshot", $poseID, $hasGear);
		context::requestImage($uid, "character", $poseID, $hasGear);
	}else{
		echo 'error';
	}
?>