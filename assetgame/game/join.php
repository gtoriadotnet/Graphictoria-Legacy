<?php
	$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'].'/../www';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
	header("Content-Type: application/json");
	
	$key = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/../test.pem");
	
	$username = 'Player';
	$userId = 2;
	$charappId = 3853;
	$jobId = '';
	
	if($GLOBALS['loggedIn'])
	{
		$username = $GLOBALS['userTable']['username'];
		$userId = $GLOBALS['userTable']['id'];
		$charappId = $userId;
	}
	
	function makeGuid()
	{
		return strtolower(trim(com_create_guid(), '{}'));
	}
	
	function makeTicket($signkey, $userId, $jobId)
	{
		$timestamp = date('n/j/Y h:i:s A');
		
		$signature;
		openssl_sign($userId . "\n" . $jobId . "\n" . $timestamp, $signature, $signkey, OPENSSL_ALGO_SHA1);
		$ticketData = base64_encode($signature);
		
		return $timestamp . ';' . $ticketData;
	}
	
	$data = json_encode(
		[
			"ClientPort" => 0,
			"MachineAddress" => "localhost",
			"ServerPort" => 53640,
			"PingUrl" => "",
			"PingInterval" => 120,
			"UserName" => $username,
			"SeleniumTestMode" => false,
			"UserId" => $userId,
			"SuperSafeChat" => $userId != $charappId,
			"CharacterAppearance" => "http://api.gtoria.net/user/getCharacter.php?uid=" . $charappId . "&key=D869593BF742A42F79915993EF1DB",
			/* Timestamp(n/j/Y h:i:s A);Signature(UserId\nJobId\nTimestamp) */
			"ClientTicket" => makeTicket($key, $userId, $jobId),
			"GameId" => "00000000-0000-0000-0000-000000000000",
			"PlaceId" => 0,
			"MeasurementUrl" => "",
			"WaitingForCharacterGuid" => makeGuid(),
			"BaseUrl" => "http://www.gtoria.net/",
			"ChatStyle" => "ClassicAndBubble",
			"VendorId" => 0,
			"ScreenShotInfo" => "",
			"VideoInfo" => "<?xml version=\"1.0\"?><entry xmlns=\"http://www.w3.org/2005/Atom\" xmlns:media=\"http://search.yahoo.com/mrss/\" xmlns:yt=\"http://gdata.youtube.com/schemas/2007\"><media:group><media:title type=\"plain\"><![CDATA[Graphictoria Place]]></media:title><media:description type=\"plain\"><![CDATA[ For more games visit http://www.gtoria.net]]></media:description><media:category scheme=\"http://gdata.youtube.com/schemas/2007/categories.cat\">Games</media:category><media:keywords>Graphictoria, video, free game, online virtual world</media:keywords></media:group></entry>",
			"CreatorId" => 0,
			"CreatorTypeEnum" => "User",
			"MembershipType" => "None",
			"AccountAge" => 0,
			"CookieStoreFirstTimePlayKey" => "gt_evt_ftp",
			"CookieStoreFiveMinutePlayKey" => "gt_evt_fmp",
			"CookieStoreEnabled" => true,
			"IsGraphictoriaPlace" => false,
			"GenerateTeleportJoin" => false,
			"IsUnknownOrUnder13" => $userId != $charappId,
			/* SESSION_ID|GAME_ID|PLACE_ID|CLIENT_IP|PLATFORM_TYPE_ID|SESSION_STARTED|BROWSER_TRACKER_ID|PARTY_ID|AGE */
			"SessionId" => makeGuid() . '|00000000-0000-0000-0000-000000000000|0|' . auth::getIP() . '|5|' . gmdate('Y-m-d\TH:i:s\Z') . '|0|null|null',
			"DataCenterId" => 0,
			"UniverseId" => 0,
			"BrowserTrackerId" => 0,
			"UsePortraitMode" => false,
			"FollowUserId" => 0,
			"characterAppearanceId" => $charappId
		],
		JSON_UNESCAPED_SLASHES
	);
	$signature;
	$data = "\r\n" . $data;
	openssl_sign($data, $signature, $key, OPENSSL_ALGO_SHA1);
	exit(sprintf("%s%%%s%%%s", "--rbxsig", base64_encode($signature), $data));
?>