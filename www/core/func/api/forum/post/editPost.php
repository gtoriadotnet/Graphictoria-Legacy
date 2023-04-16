<?php
	if (isset($_POST['postContent']) and isset($_POST['csrf']) and isset($_POST['postId'])) {
		include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
		$postContent = $_POST['postContent'];
		$csrf = $_POST['csrf'];
		$postId = $_POST['postId'];
		
		$shortenedContent = preg_replace('/[\r\n]{4,}/', '', $postContent);
		
		$contentCheck = preg_replace('!\s+!', ' ', $postContent);
		$contentCheck = strip_tags($contentCheck);
		$contentCheck = preg_replace("/&#?[a-z0-9]+;/i","", $contentCheck);
		$contentCheck = preg_replace('!\s+!', ' ', $contentCheck);
		$contentCheck = strtolower(preg_replace('|[[\/\!]*?[^\[\]]*?]|si', '', $contentCheck));
		$contentCheck = preg_replace('/\s+/', '', $contentCheck);
		if ($csrf != $GLOBALS['csrf_token'] or $GLOBALS['loggedIn'] == false or strlen($postId) == 0) {
			echo 'error';
			exit;
		}
		
		if (strtolower($postContent) == strtolower($GLOBALS['userTable']['lastForumContent'])) die('<span style="color:red">You have already posted this</span>');
		
		$badwords = array("fucking", "gay", "rape", "incest", "beastiality", "cum", "maggot", "bullshit", "fuck", "penis",
						"dick", "vagina", "vag", "faggot", "fag", "nigger", "asshole", "shit", "bitch", "anal", "stfu",
						"cunt", "pussy", "hump", "meatspin", "redtube", "porn", "kys", "xvideos", "hentai", "gangbang", "milf",
						"n*", "nobelium", "whore", "wtf", "horny", "raping", "s3x", "boob", "nigga", "nlgga", "gt2008",
						"cock", "dicc", "idiot", "nibba", "nibber", "nude", "kesner", "brickopolis", "nobe", "diemauer", "nuts",
						"rhodum", "otorium", ".ga", ".cf", ".gg", ".ml", "brickopolis", "mercury", "polygon", "pizzaboxer",
						"calvy", "tadah", "alphaland", "finalb");
						
		$badwords2 = array("sex", "porn");
		if (context::contains($postContent, $badwords2)) {
			echo '<span style="color:red">This edit contains filtered words.</span>';
			exit;
		}
		
		
		// Check without special characters removed
		if (context::contains($contentCheck, $badwords)) {
			echo '<span style="color:red">This edit contains filtered words.</span>';
			exit;
		}
		
		// Check with special characters removed, except *.
		$contentCheck = preg_replace("/[^A-Za-z0-9*]/", '', $contentCheck);
		if (context::contains($contentCheck, $badwords)) {
			echo '<span style="color:red">This edit contains filtered words.</span>';
			exit;
		}
		
		if (strlen($postContent) < 5 or strlen($contentCheck) < 5) {
			echo 'content-too-short';
			exit;
		}
		
		if (strlen($postContent) > 30000) {
			echo 'content-too-long';
			exit;
		}
		
		if($shortenedContent != $postContent)
		{
			exit('no-newline-spam');
		}
		
		$stmt = $GLOBALS['dbcon']->prepare("SELECT * FROM topics WHERE id = :id AND developer = 0");
		$stmt->bindParam(':id', $postId, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if(($result['author_uid'] === $GLOBALS['userTable']['id'] || $GLOBALS['userTable']['rank'] > 0) && $result['deleted'] === 0)
		{
			$timeSince =  round(abs(strtotime(date('Y-m-d H:i:s')) - strtotime($result['updatedOn'])) / 60,2);
			if ($timeSince < 1 and $GLOBALS['userTable']['rank'] == 0) {
				echo 'rate-limit';
				exit;
			}
			
			if ($stmt->rowCount() == 0) {
				echo 'no-post';
				exit;
			}
			
			$query = "UPDATE `topics` SET `updatedOn`=NOW(), `updatedBy`=:uid, `content`=:content WHERE `id`=:id;";
			$stmt = $GLOBALS['dbcon']->prepare($query);
			$stmt->bindParam(':id', $postId, PDO::PARAM_INT);
			$stmt->bindParam(':uid', $GLOBALS['userTable']['id'], PDO::PARAM_INT);
			$stmt->bindParam(':content', $postContent, PDO::PARAM_STR);
			$stmt->execute();
			
			$query = "DELETE FROM `read` WHERE `postId`=:id";
			$stmt = $GLOBALS['dbcon']->prepare($query);
			$stmt->bindParam(':id', $postId, PDO::PARAM_INT);
			$stmt->execute();
			
			echo '<script>loadPost('.$postId.');</script>';
		} 
		else
		{
			echo 'access-denied';
		}
	}else{
		echo 'error';
	}
?>