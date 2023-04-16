<?php
	$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'].'/../www';
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
	header("Content-Type: text/plain; charset=utf-8");
	ob_start();
	
	$username = 'Player';
	$userId = 2;
	$charappId = 3853;
	
	if($GLOBALS['loggedIn'])
	{
		$username = $GLOBALS['userTable']['username'];
		$userId = $GLOBALS['userTable']['id'];
		$charappId = $userId;
	}
	
	$placeId = intval($_GET['PlaceID']);
	$template = (isset($_GET['TemplateName']) ? $_GET['TemplateName'] : null);
	
	if($placeId==0 && !$template)
	{
		http_response_code(400);
		exit;
	}
	
	if($template)
	{
		$placeId = 0;
	}
?>

-- Prepended to Edit.lua and Visit.lua and Studio.lua--

function ifSeleniumThenSetCookie(key, value)
	if false then
		game:GetService("CookiesService"):SetCookieValue(key, value)
	end
end

ifSeleniumThenSetCookie("SeleniumTest1", "Inside the visit lua script")

pcall(function() game:SetPlaceID(<?= $placeId ?>) end)

visit = game:GetService("Visit")

local message = Instance.new("Message")
message.Parent = workspace
message.archivable = false

game:GetService("ScriptInformationProvider"):SetAssetUrl("http://assetgame.gtoria.net/Asset/")
game:GetService("ContentProvider"):SetThreadPool(16)
pcall(function() game:GetService("InsertService"):SetFreeModelUrl("http://assetgame.gtoria.net/Game/Tools/InsertAsset.ashx?type=fm&q=%s&pg=%d&rs=%d") end) -- Used for free model search (insert tool)
pcall(function() game:GetService("InsertService"):SetFreeDecalUrl("http://assetgame.gtoria.net/Game/Tools/InsertAsset.ashx?type=fd&q=%s&pg=%d&rs=%d") end) -- Used for free decal search (insert tool)

ifSeleniumThenSetCookie("SeleniumTest2", "Set URL service")

settings().Diagnostics:LegacyScriptMode()

game:GetService("InsertService"):SetBaseSetsUrl("http://assetgame.gtoria.net/Game/Tools/InsertAsset.ashx?nsets=10&type=base")
game:GetService("InsertService"):SetUserSetsUrl("http://assetgame.gtoria.net/Game/Tools/InsertAsset.ashx?nsets=20&type=user&userid=%d")
game:GetService("InsertService"):SetCollectionUrl("http://assetgame.gtoria.net/Game/Tools/InsertAsset.ashx?sid=%d")
game:GetService("InsertService"):SetAssetUrl("http://assetgame.gtoria.net/Asset/?id=%d")
game:GetService("InsertService"):SetAssetVersionUrl("http://assetgame.gtoria.net/Asset/?assetversionid=%d")

pcall(function() game:GetService("SocialService"):SetFriendUrl("http://assetgame.gtoria.net/Game/LuaWebService/HandleSocialRequest.ashx?method=IsFriendsWith&playerid=%d&userid=%d") end)
pcall(function() game:GetService("SocialService"):SetBestFriendUrl("http://assetgame.gtoria.net/Game/LuaWebService/HandleSocialRequest.ashx?method=IsBestFriendsWith&playerid=%d&userid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupUrl("http://assetgame.gtoria.net/Game/LuaWebService/HandleSocialRequest.ashx?method=IsInGroup&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupRankUrl("http://assetgame.gtoria.net/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRank&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupRoleUrl("http://assetgame.gtoria.net/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRole&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("GamePassService"):SetPlayerHasPassUrl("http://assetgame.gtoria.net/Game/GamePass/GamePassHandler.ashx?Action=HasPass&UserID=%d&PassID=%d") end)
pcall(function() game:GetService("MarketplaceService"):SetProductInfoUrl("https://api.gtoria.net/marketplace/productinfo?assetId=%d") end)
pcall(function() game:GetService("MarketplaceService"):SetDevProductInfoUrl("https://api.gtoria.net/marketplace/productDetails?productId=%d") end)
pcall(function() game:GetService("MarketplaceService"):SetPlayerOwnsAssetUrl("https://api.gtoria.net/ownership/hasasset?userId=%d&assetId=%d") end)
pcall(function() game:SetCreatorID(<?= $userId ?>, Enum.CreatorType.User) end)

ifSeleniumThenSetCookie("SeleniumTest3", "Set creator ID")

pcall(function() game:SetScreenshotInfo("Graphictoria+Place") end)
pcall(function() game:SetVideoInfo("") end)

function registerPlay(key)
	if true and game:GetService("CookiesService"):GetCookieValue(key) == "" then
		game:GetService("CookiesService"):SetCookieValue(key, "{ \"userId\" : <?= $userId ?>, \"placeId\" : <?= $placeId ?>, \"os\" : \"" .. settings().Diagnostics.OsPlatform .. "\"}")
	end
end

pcall(function()
	registerPlay("rbx_evt_ftp")
	delay(60*5, function() registerPlay("rbx_evt_fmp") end)
end)

ifSeleniumThenSetCookie("SeleniumTest4", "Exiting SingleplayerSharedScript")-- SingleplayerSharedScript.lua inserted here --

message.Text = "Loading Place. Please wait..." 
coroutine.yield() 
game:Load("<?= $template ? 'http://www.gtoria.net/data/templates/' . strtolower($template) . '.rbxl' : 'http://www.gtoria.net/Asset/?id=' . $placeId ?>") 

if #"" > 0 then
	visit:SetUploadUrl("")
end

message.Parent = nil

game:GetService("ChangeHistoryService"):SetEnabled(true)

visit:SetPing("http://assetgame.gtoria.net/Game/ClientPresence.ashx?version=old&PlaceID=<?= $placeId ?>&LocationType=Studio", 120)
game:HttpGet("http://assetgame.gtoria.net/Game/Statistics.ashx?UserID=&AssociatedCreatorID=<?= $userId ?>&AssociatedCreatorType=User&AssociatedPlaceID=<?= $placeId ?>")

<?php
	$data = ob_get_clean();

	$signature;
	$key = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/../test.pem");
	openssl_sign($data, $signature, $key, OPENSSL_ALGO_SHA1);
	exit(sprintf("%s%%%s%%%s", "--rbxsig", base64_encode($signature), $data));
?>