<?php
	if (isset($_POST['csrf'])) {
		include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
		$csrf = $_POST['csrf'];
		if ($csrf != $GLOBALS['csrf_token'] or $GLOBALS['loggedIn'] == false) die("error");
		
		$uid = $GLOBALS['userTable']['id'];
		
		$stmt = $GLOBALS['dbcon']->prepare("SELECT `id`, `charap` AS `pose` FROM `users` WHERE `id`=:uid;");
		$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$pose = $result['pose'];
		
		$stmt = $GLOBALS['dbcon']->prepare("SELECT `id` FROM `wearing` WHERE `uid`=:uid AND `type`=\"gear\";");
		$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
		$stmt->execute();
		$hasGear = (($stmt->rowCount() > 0) ? 1 : 0);
		
		context::requestImage($uid, "headshot", $pose, $hasGear);
		context::requestImage($uid, "character", $pose, $hasGear);
	}else{
		echo 'error';
	}
?>