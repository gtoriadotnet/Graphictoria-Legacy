<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';

if($GLOBALS['loggedIn'])
{
	header('content-type: text/plain');
	exit('https://assetgame.gtoria.net/Login/Negotiate');
}