<?php
include 'config.php';

require_once($_SERVER['DOCUMENT_ROOT'].'/../www/core/func/connectivity/main.php');
connectivity::createDatabaseConnection();
register_shutdown_function('connectivity::closeDatabaseConnection');

include_once $_SERVER['DOCUMENT_ROOT'].'/../SharedCode/Autoloader.php';

function ReturnError($httpErrorCode)
{
	http_response_code($httpErrorCode);
	require_once($_SERVER['DOCUMENT_ROOT'] . '/error.php');
	exit;
}

function GetCdnUrl($hash)
{
	$st = 31;
	for($i = 0; $i < 32; $i++)
	{
		$st ^= ord($hash[$i]);
	}

	return [($GLOBALS['ThumbnailDirectory'] . '/' . 't' . strval($st % 8) . '/images/' . $hash . '.png'), ('https://t' . strval($st % 8) . '.gtoria.net/' . $hash)];
}