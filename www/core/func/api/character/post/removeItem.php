<?php
	if (isset($_POST['csrf']) and isset($_POST['itemId'])) {
		include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
		if ($_POST['csrf'] != $GLOBALS['csrf_token'] or $GLOBALS['loggedIn'] == false) exit;
		
		$catalogId = $_POST['itemId'];
		if (is_array($catalogId)) exit;
		if (strlen($catalogId) == 0) exit;
		if (is_numeric($catalogId) == false) exit;
		
		$stmt = $GLOBALS['dbcon']->prepare("DELETE FROM wearing WHERE catalogId=:id AND uid=:user");
		$stmt->bindParam(':user', $GLOBALS['userTable']['id'], PDO::PARAM_INT);
		$stmt->bindParam(':id', $catalogId, PDO::PARAM_INT);
		$stmt->execute();
		
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
	}
?>