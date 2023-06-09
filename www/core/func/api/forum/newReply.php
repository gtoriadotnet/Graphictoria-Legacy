<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		if (is_array($id)) {
			exit;
		}
		include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
		if (!$GLOBALS['loggedIn']) {
			echo 'Something went wrong';
			exit;
		}
		$stmt = $GLOBALS['dbcon']->prepare("SELECT * FROM topics WHERE id = :fId AND developer = 0");
		$stmt->bindParam(':fId', $id, PDO::PARAM_INT);
		$stmt->execute();
		if ($stmt->rowCount() == 0) {
			echo 'Post could not be found';
			exit;
		}
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result['deleted'] === 1 && $GLOBALS['userTable']['rank'] == 0)
		{
			exit('This post has been moderated.');
		}
		else if($result['locked'] == 0 || $GLOBALS['userTable']['rank'] > 0)
		{
			echo '<h3>Replying to '.context::secureString($result['title']).'</h3>';
			include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/api/forum/views/newReply.php';
		}
		else
		{
			echo 'This post is locked';
			exit;
		}
	}else{
		echo 'An error occurred';
	}
?>