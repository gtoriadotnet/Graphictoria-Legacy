<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';

if(isset($_GET['uname']))
{
	$Username = $_GET['uname'];
	
	if($Username == '')
	{
		$ImageLocation = (isset($_GET['headshot']) ? $_SERVER['DOCUMENT_ROOT'] . '/../api/imageServer/user/headshot/def2.png' : $_SERVER['DOCUMENT_ROOT'] . '/../api/imageServer/user/def2.png');
	
		http_response_code(200);
		header('Cache-control: max-age='.(60*60*24*365));
		header('Expires: '.gmdate(DATE_RFC1123,time()+60*60*24*365));
		header('Content-Type: image/png');
		header('Last-Modified: '.gmdate(DATE_RFC1123,filemtime($ImageLocation)));
		exit(file_get_contents($ImageLocation));
	}
	
	$UserQuery = $GLOBALS['dbcon']->prepare('SELECT `id`, `thumbnailHash`, `headshotHash` FROM `users` WHERE `username` = :uname;');
	$UserQuery->bindParam(':uname', $_GET['uname'], PDO::PARAM_STR);
	$UserQuery->execute();
	
	if($UserQuery->rowCount() == 0)
	{
		header('Content-Type: application/json');
		http_response_code(400);
		exit(
			json_encode(
				[
					'errors' => [
						'Unknown user.'
					]
				],
				JSON_UNESCAPED_SLASHES
			)
		);
	}
	
	$Result = $UserQuery->fetch(PDO::FETCH_ASSOC);
	
	if(isset($_GET['headshot'])) {
		header('location: ' . context::getUserHeadshotImage($Result));
		exit;
	} else {
		header('location: ' . context::getUserImage($Result));
		exit;
	}
}
else
{
	header('Content-Type: application/json');
	http_response_code(400);
	exit(
		json_encode(
			[
				'errors' => [
					'Request is malformed. Check your query and try again.'
				]
			],
			JSON_UNESCAPED_SLASHES
		)
	);
}