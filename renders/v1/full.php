<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/v1/infra/global.php');

if(!(isset($_SERVER['HTTP_ACCESSKEY']) && $_SERVER['HTTP_ACCESSKEY'] === $GLOBALS['ApiKey'])) ReturnError(404);

$type = (isset($_GET['type']) ? $_GET['type'] : null );
$requiresLookup = (isset($_GET['username']) && !isset($_GET['itemid']) && (strtolower($type) == 'character' || strtolower($type) == 'headshot'));
$itemId = (isset($_GET['itemid']) ? $_GET['itemid'] : null );

if(
	(!$requiresLookup && $itemId == null) ||
	($type == null)
) {
	ReturnError(400);
};

if(
	preg_match('/[^A-Za-z0-9\-]/', $type) ||
	!file_exists($_SERVER['DOCUMENT_ROOT'] . '/v1/infra/scripts/' . strtolower($type) . '.txt')
) {
	ReturnError(400);
}

if($requiresLookup) {
	$userName = $_GET['username'];
	$stmt = $GLOBALS['dbcon']->prepare("SELECT `id` FROM `users` WHERE `username`=:name;");
	$stmt->bindParam(':name', $userName, PDO::PARAM_STR);
	$stmt->execute();
	
	if ($stmt->rowCount() == 0) {
		ReturnError(400);
	}
	
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$itemId = $result['id'];
}

$scriptHeader = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/v1/infra/scripts/shared.txt');
$scriptBody = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/v1/infra/scripts/' . strtolower($type) . '.txt');

$script  = '-----------------------------------"CUSTOM" SHARED CODE----------------------------------';
$script .= "\n\n";
$script	.= $scriptHeader;
$script .= "\n\n";
$script .= '-----------------------------------START RENDER SCRIPT-----------------------------------';
$script .= "\n\n";
$script .= $scriptBody;

$script = str_replace('%ITEMID%', '"' . strval($itemId) . '"', $script);
$script = str_replace('%POSE%', (isset($_GET['pose']) ? strval($_GET['pose']) : 0), $script);
$script = str_replace('%HASGEAR%', (isset($_GET['hasgear']) && $_GET['hasgear'] == 1 ? 'true' : 'false'), $script);

$connection = new Roblox\Grid\Rcc\RCCServiceSoap('127.0.0.1', 64989);
$job = new Roblox\Grid\RCC\Job(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)));
$jobScript = new Roblox\Grid\RCC\ScriptExecution('render', $script);

$startTime = microtime(true);

$batch = $connection->BatchJob($job, $jobScript);

header('Content-Type: image/png');
exit(base64_decode($batch[0]));

// EOF