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
		if ($stmt->rowCount() == 0) die("Forum not found");
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if($result['deleted'] === 1)
		{
			exit('This post has been moderated.');
		}
		else if($result['author_uid'] == $GLOBALS['userTable']['id'] || $GLOBALS['userTable']['rank'] > 0)
		{
			echo '<h3>Editing post '.context::secureString($result['title']).'</h3>';
			include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/api/forum/views/editPost.php';
		}
		else
		{
			echo 'You can\'t edit this post';
		}
	}else{
		echo 'An error occurred';
	}
?>