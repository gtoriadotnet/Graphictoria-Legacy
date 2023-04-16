<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		if (is_array($id)) exit;
		
		include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
		
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			if (is_numeric($page) == false) exit;
		}else{
			$page = 0;
		}
		if (is_array($page)) die("Something went wrong");
		
		if (isset($_GET['keyword']) && strlen($_GET['keyword']) > 0) {
			$keyword = $_GET['keyword'];
			if (is_array($keyword)) exit;
			$searchTermSQL = '%'.$keyword.'%';
		}
		
		$offset = $page*25;
		//include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
		if ($page == 0) {
			$query = 'SELECT `id`, `posts`, `replies`, `name`, `description`, `locked` FROM `forums` WHERE `id` = :fId AND `developer` = 0;';
			if($id==='my-posts')
				$query = 'SELECT `posts` FROM `users` WHERE `id` = :uid LIMIT 1;';
			$stmt = $GLOBALS['dbcon']->prepare($query);
			if($id==='my-posts')
			{
				$stmt->bindParam(':uid', $GLOBALS['userTable']['id'], PDO::PARAM_INT);
			}
			else
			{
				$stmt->bindParam(':fId', $id, PDO::PARAM_INT);
			}
			$stmt->execute();
			if($id==='my-posts')
			{
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				if($result['posts'] === 0)
				{
					exit('You haven\'t posted on the forums yet. When you make a post, it\'ll appear here!');
				}
				echo '<div class="nav navbar-nav navbar-right">';
				echo '<b>Your Posts</b>: '.$result['posts'].'&nbsp;&nbsp;&nbsp;';
				echo '</div>';
				echo '<h3>Your Topics</h3>';
				echo '<div class="nav navbar-nav navbar-right" style="margin-right:15px;">';
				if (!isset($keyword) && $GLOBALS['loggedIn']) echo '<button class="btn btn-primary" style="margin:-10px -15px 0px;" onclick="search(\'my-posts\')">Search</button>';
				if (!isset($keyword) && $GLOBALS['loggedIn'] == false) echo '<button class="btn btn-primary" style="margin:-10px -15px 0px;" onclick="search(\'my-posts\')">Search</button>';
				if (isset($keyword) && $GLOBALS['loggedIn']) echo '<button class="btn btn-primary" style="margin:-10px -15px 0px;" onclick="loadForum(\'my-posts\')">Reset</button>';
				if (isset($keyword) && $GLOBALS['loggedIn'] == false) echo '<button class="btn btn-primary" style="margin:-10px -15px 0px;" onclick="loadForum(\'my-posts\')">Reset</button>';
				echo '</div>';
				if (!isset($keyword)) echo '<p>View all of your Graphictoria posts.</p>';
				if (isset($keyword)) echo '<p><b>Searching by name</b>: '.context::secureString($_GET['keyword']).'</p>';
			}
			else
			{
				if ($stmt->rowCount() == 0) {
					echo 'Forum not found';
					exit;
				}
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$id = $result['id'];
				echo '<div class="nav navbar-nav navbar-right" style="margin-right:15px;">';
				echo '<b>Posts</b>: '.$result['posts'].'&nbsp;&nbsp;&nbsp;';
				echo '<b>Replies</b>: '.$result['replies'];
				echo '</div>';
				echo '<h3>'.context::secureString($result['name']).'</h3>';
				echo '<div class="nav navbar-nav navbar-right" style="margin-right:15px;">';
				if (!isset($keyword) && $GLOBALS['loggedIn']) echo '<button class="btn btn-primary" style="margin:-10px 20px 0px;" onclick="search('.$result['id'].')">Search</button>';
				if (!isset($keyword) && $GLOBALS['loggedIn'] == false) echo '<button class="btn btn-primary" style="margin:-10px -15px 0px;" onclick="search('.$result['id'].')">Search</button>';
				if (isset($keyword) && $GLOBALS['loggedIn']) echo '<button class="btn btn-primary" style="margin:-10px 20px 0px;" onclick="loadForum('.$result['id'].')">Reset</button>';
				if (isset($keyword) && $GLOBALS['loggedIn'] == false) echo '<button class="btn btn-primary" style="margin:-10px -15px 0px;" onclick="loadForum('.$result['id'].')">Reset</button>';
				if ($GLOBALS['loggedIn']) {
					if ($result['locked'] == 0) {
						echo '<button class="btn btn-primary" style="margin:-10px -15px 0px;" onclick="newPost('.$result['id'].')">New Post</button>';
					}else{
						if ($GLOBALS['userTable']['rank'] == 1) {
							echo '<button class="btn btn-primary" style="margin:-10px -15px 0px;" onclick="newPost('.$result['id'].')">New Post</button>';
						}
					}
				}
				echo '</div>';
				if (!isset($keyword)) echo '<p>'.context::secureString($result['description']).'</p>';
				if (isset($keyword)) echo '<p><b>Searching by name</b>: '.context::secureString($_GET['keyword']).'</p>';
			}
		}else{
			if($id !== 'my-posts')
			{
				$stmt = $GLOBALS['dbcon']->prepare("SELECT * FROM forums WHERE id = :fId");
				$stmt->bindParam(':fId', $id, PDO::PARAM_INT);
				$stmt->execute();
				if ($stmt->rowCount() == 0) {
					echo 'Forum not found';
					exit;
				}
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$id = $result['id'];
			}
		}
		
		function showLockedStatus($locked) {
			if ($locked == 1) {
				return '<span class="fa fa-lock"></span>';
			}
		}
		
		function showPinStatus() {
			return '<span class="fa fa-thumb-tack"></span>';
		}
		
		
		// Pinned posts
		if ($page == 0 && !isset($keyword)) {
			$query = "SELECT id, locked, deleted, author_uid, postTime, lastActivity, views, replies, title FROM topics WHERE forumId = :fId AND pinned = 1".(!$GLOBALS['loggedIn'] || $GLOBALS['userTable']['rank'] === 0 ? ' AND deleted = 0' : '')." ORDER BY lastActivity ASC;";
			if($id==='my-posts')
				$query = 'SELECT `id`, `locked`, `deleted`, `author_uid`, `postTime`, `lastActivity`, `views`, `replies`, `title`, `forumId` FROM `topics` WHERE `author_uid` = :uid AND `pinned` = 1'.(!$GLOBALS['loggedIn'] || $GLOBALS['userTable']['rank'] === 0 ? ' AND `deleted` = 0' : '').' ORDER BY `lastActivity` ASC;';
			$stmt = $GLOBALS['dbcon']->prepare($query);
			if($id==='my-posts')
			{
				$stmt->bindParam(':uid', $GLOBALS['userTable']['id'], PDO::PARAM_INT);
			}
			else
			{
				$stmt->bindParam(':fId', $id, PDO::PARAM_INT);
			}
			$stmt->execute();
			echo '<div class="list-group" style="margin-bottom:0px;">';
			$count = 0;
			foreach($stmt as $result) {
				$count++;
				if ($count < 25) {
					$userSheet = context::getUserSheetByIDForum($result['author_uid']);
					if ($userSheet['rank'] == 0) {
						$usern = $userSheet['username'];
					}elseif ($userSheet['rank'] == 1) {
						$usern = '<b style="color:#158cba"><span class="fa fa-bookmark"></span> '.$userSheet['username'].'</b>';
					}elseif ($userSheet['rank'] == 2) {
						$usern = '<b style="color:#28b62c"><span class="fa fa-gavel"></span> '.$userSheet['username'].'</b>';
					}
					echo '<div class="list-group-item" style="border:none;border-bottom:2px solid #eeeeee">';
					echo '<div class="row"><div class="col-xs-1"><div style="position: relative;border:solid 1px #158cba;height:50px;width:50px;height:50px;border-radius:50%;overflow: hidden;" class="img-circle"><img style="position: absolute" src="'.context::getUserHeadshotImage($userSheet).'" height="50"></div></div>';
					echo '<div class="col-xs-11"><h4 class="list-group-item-heading" onclick="loadPost('.$result['id'].')" style="word-wrap:break-word;display:inline;cursor:pointer'.($result['deleted']===1 ? ';color:red' : '').'">'.showPinStatus().($result['locked'] ? ' '.showLockedStatus(1).' ': ' ').($result['deleted']===1 ? '<span class="fa fa-trash-o"></span> ' : '').context::secureString($result['title']).'</h4>';
					//echo '<div class="col-xs-11"><h4 class="list-group-item-heading" onclick="loadPost('.$result['id'].')" style="word-wrap:break-word;display:inline;cursor:pointer">'.showPinStatus().' '.context::secureString($result['title']).'</h4>';
					echo '<div class="nav navbar-nav navbar-right" style="margin-right:0px;">';
					echo '</div>';
					echo '<p class="list-group-item-text">Posted by <a class="forum-clickable" onclick="loadMiniProfile(\''.$userSheet['username'].'\');">'.$usern.'</a></p>';
					if($id==='my-posts')
						echo '<div class="nav navbar-nav navbar-right" style="margin-right:0px;display:inline;margin:-39px 0px 0px;text-align:right;">';
					else
						echo '<div class="nav navbar-nav navbar-right" style="margin-right:0px;display:inline;margin:-26px 0px 0px;">';
					echo '<b>Started: </b>'.context::humanTimingSince(strtotime($result['postTime'])).' ago<br>';
					if($id==='my-posts')
					{
						$stmt = $GLOBALS['dbcon']->prepare('SELECT `name` FROM `forums` WHERE `id`=:fId;');
						$stmt->bindParam(':fId', $result['forumId'], PDO::PARAM_INT);
						$stmt->execute();
						$forumResult = $stmt->fetch(PDO::FETCH_ASSOC);
						echo '<b>Posted in: </b><a onclick="loadForum(' . $result['forumId'] .  ');">' . $forumResult['name'] . '</a></br>';
					}
					echo '<b>Views: </b>'.$result['views'].'&nbsp;&nbsp;&nbsp;';
					echo '<b>Replies: </b>'.$result['replies'].'&nbsp;&nbsp;&nbsp;';
					echo '</div>';
					// Get last poster
					$stmtr = $GLOBALS['dbcon']->prepare("SELECT author_uid FROM `replies` WHERE `postId` = :id ORDER BY id DESC LIMIT 1;");
					$stmtr->bindParam(':id', $result['id'], PDO::PARAM_INT);
					$stmtr->execute();
					$resultReplyer = $stmtr->fetch(PDO::FETCH_ASSOC);
					if ($stmtr->rowCount() > 0) {
						$userID = $resultReplyer['author_uid'];
					}else{
						$userID = $result['author_uid'];
					}
					$userSheetLast = context::getUserSheetByID($userID);
					if ($userSheetLast['rank'] == 0) {
						$usern = $userSheetLast['username'];
					}elseif ($userSheetLast['rank'] == 1) {
						$usern = '<b style="color:#158cba"><span class="fa fa-bookmark"></span> '.$userSheetLast['username'].'</b>';
					}elseif ($userSheetLast['rank'] == 2) {
						$usern = '<b style="color:#28b62c"><span class="fa fa-gavel"></span> '.$userSheetLast['username'].'</b>';
					}
					echo '<b>Last Post: </b>'.context::humanTimingSince(strtotime($result['lastActivity'])).' ago by <a class="forum-clickable" onclick="loadMiniProfile(\''.$userSheetLast['username'].'\');">'.$usern.'</a>';
					echo '</div></div></div>';
				}
			}
		}
		
		if (!isset($keyword))
		{
			$query = "SELECT id, deleted, author_uid, locked, postTime, lastActivity, views, replies, title FROM topics WHERE forumId = :fId AND pinned = 0".(!$GLOBALS['loggedIn'] || $GLOBALS['userTable']['rank'] === 0  ? ' AND `deleted` = 0' : '')." ORDER BY lastActivity DESC LIMIT 26 OFFSET :offset";
			if($id === 'my-posts')
				$query = 'SELECT `id`, `deleted`, `forumId`, `author_uid`, `locked`, `postTime`, `lastActivity`, `views`, `replies`, `title` FROM `topics` WHERE `author_uid` = :uid AND `pinned` = 0'.(!$GLOBALS['loggedIn'] || $GLOBALS['userTable']['rank'] === 0  ? ' AND `deleted` = 0' : '').' ORDER BY `lastActivity` DESC LIMIT 26 OFFSET :offset';
			$stmt = $GLOBALS['dbcon']->prepare($query);
		}
		if (isset($keyword))
		{
			$query = "SELECT id, deleted, author_uid, locked, postTime, lastActivity, views, replies, title FROM topics WHERE forumId = :fId".(!$GLOBALS['loggedIn'] || $GLOBALS['userTable']['rank'] === 0  ? ' AND `deleted` = 0' : '')." AND title LIKE :term ORDER BY lastActivity DESC LIMIT 26 OFFSET :offset";
			if($id === 'my-posts')
				$query = 'SELECT `id`, `deleted`, `forumId`, `author_uid`, `locked`, `postTime`, `lastActivity`, `views`, `replies`, `title` FROM `topics` WHERE `author_uid` = :uid'.(!$GLOBALS['loggedIn'] || $GLOBALS['userTable']['rank'] === 0  ? ' AND `deleted` = 0' : '').' AND `title` LIKE :term ORDER BY `lastActivity` DESC LIMIT 26 OFFSET :offset';
			$stmt = $GLOBALS['dbcon']->prepare($query);
			$stmt->bindParam(':term', $searchTermSQL, PDO::PARAM_STR);
		}
		if($id === 'my-posts')
			$stmt->bindParam(':uid', $GLOBALS['userTable']['id'], PDO::PARAM_INT);
		else
			$stmt->bindParam(':fId', $id, PDO::PARAM_INT);
		$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
		$stmt->execute();
		echo '<div class="list-group" style="margin-bottom:0px;">';
		$count = 0;
		foreach($stmt as $result) {
			$count++;
			if ($count < 25) {
				$userSheet = context::getUserSheetByIDForum($result['author_uid']);
				if ($userSheet['rank'] == 0) {
					$usern = $userSheet['username'];
				}elseif ($userSheet['rank'] == 1) {
					$usern = '<b style="color:#158cba"><span class="fa fa-bookmark"></span> '.$userSheet['username'].'</b>';
				}elseif ($userSheet['rank'] == 2) {
					$usern = '<b style="color:#28b62c"><span class="fa fa-gavel"></span> '.$userSheet['username'].'</b>';
				}
				echo '<div class="list-group-item" style="border:none;border-bottom:2px solid #eeeeee">';
				echo '<div class="row"><div class="col-xs-1"><div style="position: relative;border:solid 1px #158cba;height:50px;width:50px;height:50px;border-radius:50%;overflow: hidden;" class="img-circle"><img style="position: absolute" src="'.context::getUserHeadshotImage($userSheet).'" height="50"></div></div>';
				echo '<div class="col-xs-11"><h4 class="list-group-item-heading" onclick="loadPost('.$result['id'].')" style="word-wrap:break-word;display:inline;cursor:pointer'.($result['deleted']===1 ? ';color:red' : '').'">'.showLockedStatus($result['locked']).' '.($result['deleted']===1 ? '<span class="fa fa-trash-o"></span> ' : '').context::secureString($result['title']).'</h4>';
				echo '<div class="nav navbar-nav navbar-right" style="margin-right:0px;">';
				echo '</div>';
				echo '<p class="list-group-item-text">Posted by <a class="forum-clickable" onclick="loadMiniProfile(\''.$userSheet['username'].'\');">'.$usern.'</a></p>';
				if($id==='my-posts')
					echo '<div class="nav navbar-nav navbar-right" style="margin-right:0px;display:inline;margin:-39px 0px 0px;text-align:right;">';
				else
					echo '<div class="nav navbar-nav navbar-right" style="margin-right:0px;display:inline;margin:-26px 0px 0px;">';
				echo '<b>Started: </b>'.context::humanTimingSince(strtotime($result['postTime'])).' ago<br>';
				if($id==='my-posts')
				{
					$stmt = $GLOBALS['dbcon']->prepare('SELECT `name` FROM `forums` WHERE `id`=:fId;');
					$stmt->bindParam(':fId', $result['forumId'], PDO::PARAM_INT);
					$stmt->execute();
					$forumResult = $stmt->fetch(PDO::FETCH_ASSOC);
					echo '<b>Posted in: </b><a onclick="loadForum(' . $result['forumId'] .  ');">' . $forumResult['name'] . '</a></br>';
				}
				echo '<b>Views: </b>'.$result['views'].'&nbsp;&nbsp;&nbsp;';
				echo '<b>Replies: </b>'.$result['replies'].'&nbsp;&nbsp;&nbsp;';
				echo '</div>';
				// Get last poster
				$stmtr = $GLOBALS['dbcon']->prepare("SELECT author_uid FROM `replies` WHERE `postId` = :id ORDER BY id DESC LIMIT 1;");
				$stmtr->bindParam(':id', $result['id'], PDO::PARAM_INT);
				$stmtr->execute();
				$resultReplyer = $stmtr->fetch(PDO::FETCH_ASSOC);
				if ($stmtr->rowCount() > 0) {
					$userID = $resultReplyer['author_uid'];
				}else{
					$userID = $result['author_uid'];
				}
				$userSheetLast = context::getUserSheetByID($userID);
				if ($userSheetLast['rank'] == 0) {
					$usern = $userSheetLast['username'];
				}elseif ($userSheetLast['rank'] == 1) {
					$usern = '<b style="color:#158cba"><span class="fa fa-bookmark"></span> '.$userSheetLast['username'].'</b>';
				}elseif ($userSheetLast['rank'] == 2) {
					$usern = '<b style="color:#28b62c"><span class="fa fa-gavel"></span> '.$userSheetLast['username'].'</b>';
				}
				echo '<b>Last Post: </b>'.context::humanTimingSince(strtotime($result['lastActivity'])).' ago by <a class="forum-clickable" onclick="loadMiniProfile(\''.$userSheetLast['username'].'\');">'.$usern.'</a>';
				echo '</div></div></div>';
			}
		}
		if ($stmt->rowCount() == 0) {
			echo 'There seems to be no posts in this subforum. You could start the first one!';
		}
		if ($count > 25) {
			if (!isset($keyword)) echo '<button class="btn btn-primary fullWidth loadMore darkerButton" onclick="loadMoreForum(page, '.($id==='my-posts' ? '\'my-posts\'' : $id).')">Load more</button><script>page++;</script>';
			if (isset($keyword)) echo '<button class="btn btn-primary fullWidth loadMore darkerButton" onclick="loadMoreForumSearch(page, '.$id.', \''.context::secureString($keyword).'\')">Load more</button><script>page++;</script>';
		}
		echo '</div>';
	}else{
		echo 'An error occurred';
	}
?>