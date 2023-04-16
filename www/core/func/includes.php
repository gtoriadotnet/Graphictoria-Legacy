<?php
	if(isset($_SERVER['HTTP_CF_VISITOR']))
	{
		$scheme = @json_decode($_SERVER['HTTP_CF_VISITOR'], JSON_OBJECT_AS_ARRAY);
		if($scheme)
		{
			if($_SERVER['HTTP_HOST'] != 'assetgame.gtoria.net')
			{
				if($_SERVER['HTTP_HOST'] != 'gtoria.net' && $_SERVER['HTTP_HOST'] != 'www.gtoria.net')
				{
					header('location: https://gtoria.net' . $_SERVER['REQUEST_URI']);
					exit;
				}
				if($scheme['scheme'] == 'http')
				{
					header('location: https://gtoria.net' . $_SERVER['REQUEST_URI']);
					exit;
				}
			}
		}
	}
	
	// Maintenance
	if(false)
	//if($_SERVER['REMOTE_ADDR'] != '127.0.0.1')
	{
		http_response_code(503);
		exit('Graphictoria is currently under maintenance. We expect to be back shortly.');
	}
	
	// Cookie security
	ini_set("session.cookie_httponly", 1);
	
	
	define('IN_PHP', true);
	// This file will include everything required to run this project.
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/config/main.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/connectivity/main.php';
	connectivity::createDatabaseConnection();
	register_shutdown_function('connectivity::closeDatabaseConnection');
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/auth/main.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/user/main.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/render.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/context.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/security.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/mailHandler.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/auth/sessionHandler.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/html/main.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/../SharedCode/Autoloader.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/../SharedCode/php_image_magician.php';
?>