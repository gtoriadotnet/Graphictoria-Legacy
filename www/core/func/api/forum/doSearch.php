<?php
	if (isset($_GET['id'])) {
		$forumId = $_GET['id'];
		if (is_array($forumId)) exit;
		include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
		if($forumId !== 'my-posts')
		{
			$stmt = $GLOBALS['dbcon']->prepare('SELECT name, id FROM forums WHERE id = :id;');
			$stmt->bindParam(':id', $forumId, PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() == 0) exit;
		}
		echo '<script>$(".modalUsername").html("Search in '.($forumId === 'my-posts' ? 'Your Topics' : context::secureString($result['name'])).'")</script>';
		echo '<div id="searchError"></div>';
		echo '<div class="form-group"><div class="input-group"><input type="text" class="form-control" id="searchboxValue" placeholder="Enter something"></input><span class="input-group-btn"><button class="btn btn-primary" type="button" onclick="doSearch('.($forumId === 'my-posts' ? '\'my-posts\'' : $result['id']).');">Search</button></span></div></div>';
		echo '<p>Using this utility, you can search for posts. Just enter something and our system will search for you</p>';
		if($GLOBALS['loggedIn'] && $GLOBALS['userTable']['rank'] > 0)
		{
			echo '<b style="margin-top:40px">-ADMIN ONLY-(doesnt work yet)</b><p>Search by Username</p>';
			echo '<div class="form-group"><div class="input-group"><input type="text" class="form-control" id="usernameSearchboxValue" placeholder="Enter something"></input><span class="input-group-btn"><button class="btn btn-primary" type="button" onclick="doSearchByUser('.($forumId === 'my-posts' ? '\'my-posts\'' : $result['id']).');">Search</button></span></div></div>';
			echo '<button class="btn btn-danger" onclick="showDeletedPosts('.($forumId === 'my-posts' ? '\'my-posts\'' : $result['id']).')">Deleted Posts</button>';
		}
	}else{
		echo 'An error occurred';
	}
?>