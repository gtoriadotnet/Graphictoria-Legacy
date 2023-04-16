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

$image = imagecreatefromstring(base64_decode($batch[0]));

$newImage = imagecreatetruecolor(300, 300);
imagealphablending($newImage, false);
imagesavealpha($newImage, true);
$transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
imagefilledrectangle($newImage, 0, 0, 300, 300, $transparent);
imagecopyresampled($newImage, $image, 0, 0, 0, 0, 300, 300, 840, 840);

ob_start();

imagepng($newImage, null, 9);

$result = ob_get_contents();
ob_end_clean();

$hash = md5($result . 'GT{04b8ba82-8e81-4428-b1ea-af1c76c9be1c}');
$cdnResult = GetCdnUrl($hash);
$fileLocation = $cdnResult[0];
$fileUrl = $cdnResult[1];

file_put_contents($fileLocation, $result);

if(strtolower($type) == 'character') {
	$stmt = $GLOBALS['dbcon']->prepare("UPDATE `users` SET `thumbnailHash`=:hash WHERE `id`=:id;");
	$stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
	$stmt->bindParam(':id', $itemId, PDO::PARAM_INT);
	$stmt->execute();
} elseif (strtolower($type) == 'headshot') {
	$stmt = $GLOBALS['dbcon']->prepare("UPDATE `users` SET `headshotHash`=:hash WHERE `id`=:id;");
	$stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
	$stmt->bindParam(':id', $itemId, PDO::PARAM_INT);
	$stmt->execute();
} elseif (strtolower($type) == 'hats' || strtolower($type) == 'shirts' || strtolower($type) == 'tshirts' || strtolower($type) == 'pants' || strtolower($type) == 'heads' || strtolower($type) == 'gear') {
	$stmt = $GLOBALS['dbcon']->prepare("UPDATE `catalog` SET `thumbnailHash`=:hash WHERE `id`=:id;");
	$stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
	$stmt->bindParam(':id', $itemId, PDO::PARAM_STR);
	$stmt->execute();
}

header('Content-Type: application/json');
exit(json_encode(['url' => $fileUrl, 'delta' => microtime(true) - $startTime, 'dependencies' => $batch[1]], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

// EOF