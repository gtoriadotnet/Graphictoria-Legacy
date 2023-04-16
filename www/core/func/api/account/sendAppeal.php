<?php
	if (isset($_POST['csrf'])) {
		$GLOBALS['bypassRedirect'] = true;
		include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
		$csrf_token = $_POST['csrf'];
		if ($csrf_token != $GLOBALS['csrf_token'] or $GLOBALS['loggedIn'] == false or $GLOBALS['userTable']['banned'] == 0 or $GLOBALS['userTable']['appealStatus'] != 0) die("error");
		if(!($GLOBALS['userTable']['rank'] > 0))
		{
			exit('unfinished');
		}
		
		exit('appeal-error');
	}else{
		die("error");
	}
?>