<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
	if ($GLOBALS['loggedIn'] == false) {
		exit;
	}
	if ($GLOBALS['userTable']['rank'] == 0) {
		exit;
	}
	
	if(!isset($_GET['assetId']) || strlen($_GET['assetId']) < 1) exit('missing-info');
	
	$assetId = intval($_GET['assetId']);
	
	if(strval($assetId) != $assetId) exit('error');
	
	$assetInformation = json_decode(file_get_contents('https://api.roblox.com/Marketplace/ProductInfo?assetId=' . intval($assetId)), true);
	
	if(
		isset($assetInformation['AssetTypeId']) &&
		(
			$assetInformation['AssetTypeId'] == 8 ||
			(
				$assetInformation['AssetTypeId'] >= 41 &&
				$assetInformation['AssetTypeId'] <= 47
			) ||
			$assetInformation['AssetTypeId'] == 19
		)
	)
	{
		$thumb = json_decode(file_get_contents('https://thumbnails.roblox.com/v1/assets?assetIds=' . $assetId . '&size=250x250&format=Png&isCircular=false'), true)['data'][0];
		
		exit(
			json_encode(
				[
					'Name' => $assetInformation['Name'],
					'Image' => $thumb['imageUrl'],
					'Description' => $assetInformation['Description'],
					'Price' => $assetInformation['PriceInRobux'],
					'OnSale' => $assetInformation['IsForSale']
				]
			)
		);
	}
	else
	{
		exit('invalid-type');
	}
?>