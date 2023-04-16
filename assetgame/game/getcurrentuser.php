<?php
	$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'].'/../www';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
	header("Content-Type: text/plain; charset=utf-8");
	
	$userId = -1;
	
	if($GLOBALS['loggedIn'])
	{
		$userId = $GLOBALS['userTable']['id'];
	}
	else
	{
		exit('null');
	}
	
	exit(strval($userId));
?>