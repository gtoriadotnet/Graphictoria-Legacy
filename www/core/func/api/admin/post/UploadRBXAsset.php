<?php
	if (isset($_POST['csrf']) and isset($_POST['assetId']) and isset($_POST['name']) and isset($_POST['description']) and isset($_POST['dataFile']) and isset($_POST['currencyType']) and isset($_POST['price']) and isset($_POST['isOnSale'])) {
		include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
		$csrf = $_POST['csrf'];
		if ($csrf != $GLOBALS['csrf_token'] or $GLOBALS['loggedIn'] == false or $GLOBALS['userTable']['rank'] == 0) {
			exit('error');
		}
		
		$assetId = $_POST['assetId'];
		$name = $_POST['name'];
		$description = $_POST['description'];
		$dataFile = $_POST['dataFile'];
		$currencyType = $_POST['currencyType'];
		$price = $_POST['price'];
		$isOnSale = $_POST['isOnSale'];
		
		if($assetId == '' || $name == '' || $description == '' || $dataFile == '' || $currencyType == '' || $price == '' || $isOnSale == '') exit('missing-info');
		
		$assetType = false;
		$assetPaths = [
			'MeshId' => 'mesh',
			'SoundId' => 'sound',
			'TextureId' => 'texture'
		];
		
		$assets = [];
		
		$assetInformation = json_decode(file_get_contents('https://api.roblox.com/Marketplace/ProductInfo?assetId=' . intval($assetId)), true);
		if(isset($assetInformation['AssetTypeId']))
		{
			if ($assetInformation['AssetTypeId'] == 8 || ($assetInformation['AssetTypeId'] >= 41 && $assetInformation['AssetTypeId'] <= 47)) {
				$assetType = 'hats';
				
				$assetPaths['MeshId'] = 'mesh';
				$assetPaths['SoundId'] = 'sound';
				$assetPaths['TextureId'] = 'texture';
				
			} elseif ($assetInformation['AssetTypeId'] == 19) {
				$assetType = 'gear';
				
				$assetPaths['MeshId'] = 'meshes';
				$assetPaths['SoundId'] = 'sounds';
				$assetPaths['TextureId'] = 'textures';
				
			}
			
			foreach($assetPaths as $key => $folder) {
				$assets[$folder] = [];
			}
		}
		
		if(!$assetType) {
			exit('error');
		}
		
		$isOnSale = ($_POST['isOnSale'] == 'true');
		
		if(
			preg_match('/^[a-zA-Z0-9]+$/', $dataFile) != 1 ||
			preg_match('/[\r\n]+/', $dataFile) > 0
		) exit('invalid-datafile');
		
		if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/data/assets/' . $assetType . '/models/' . $dataFile)) exit('already-exists');
		
		if(strlen($name) < 3) exit('invalid-length');
		
		if(intval($price) != $price || intval($price) < 0) exit('invalid-price');
		
		if(intval($currencyType) != 0 && intval($currencyType) != 1) exit('invalid-price');
		
		$data = file_get_contents('https://assetdelivery.roblox.com/v1/asset/?id=' . intval($assetId));
		
		$decoded = @gzdecode($data);
		if($decoded) $data = $decoded;
		
		$assetContent = simplexml_load_string($data, null, LIBXML_NOXMLDECL);
		if($assetContent == false) exit('no-xml');
		
		$items = $assetContent->xpath('//Item');
		foreach($items as $item)
		{
			if(isset($item['class']) && (string) $item['class'] == 'SpecialMesh' || (string) $item['class'] == 'Sound')
			{
				$contentProperties = $item[0]->Properties->Content;
				foreach($contentProperties as $content)
				{
					$type = $assetPaths[(string)$content['name']];
					
					$ogUrl = (string)$content->url;
					
					$url = str_replace('rbxassetid://', 'https://www.roblox.com/asset/?id=', $ogUrl);
					$url = str_replace('http:', 'https:', $url);
					$url = str_replace('www.', '', $url);
					$url = str_replace('roblox.com/asset', 'roblox.com/v1/asset', $url);
					$url = str_replace('://', '://assetdelivery.', $url);
					
					$content->url = $url;
					
					array_push($assets[$type], $content);
				}
			}
		}
		
		$opts = [
			'http' => [
				'method' => 'GET',
				'header' => 'User-Agent: Roblox/Graphictoria\r\n'
			]
		];

		$context = stream_context_create($opts);
		
		foreach($assets as $type => $value)
		{
			if(count($value) != 0)
			{
				$doIncrement = (count($value) > 1);
				foreach($value as $index => $asset)
				{
					$download = file_get_contents((string)$asset->url, false, $context);
					
					if(@gzdecode($download)) $download=gzdecode($download);
					
					$fileName = $dataFile . ($doIncrement ? '_' . ($index+1) : '');
					$asset->url = 'http://gtoria.net/data/assets/' . $assetType . '/' . $type . '/' . $fileName;
					
					file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/assets/' . $assetType . '/' . $type . '/' . $fileName, $download);
				}
			}
		}
		
		file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/assets/' . $assetType . '/models/' . $dataFile, dom_import_simplexml($assetContent)->ownerDocument->saveXML(null, LIBXML_NOEMPTYTAG));
		
		$stmt = $dbcon->prepare("INSERT INTO `catalog` (`price`, `currencyType`, `creator_uid`, `name`, `description`, `type`, `approved`, `datafile`, `buyable`, `rbxasset`) VALUES (:price, :ctype, 15, :name, :description, '" . $assetType . "', 1, :datafile, :buyable, 1);");
		$stmt->bindParam(':price', $price, PDO::PARAM_INT);
		$stmt->bindParam(':ctype', $currencyType, PDO::PARAM_INT);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':description', $description, PDO::PARAM_STR);
		$stmt->bindParam(':datafile', $dataFile, PDO::PARAM_STR);
		$stmt->bindParam(':buyable', $isOnSale, PDO::PARAM_INT);
		$stmt->execute();
		
		$stmt = $dbcon->prepare('INSERT INTO `owneditems`(`uid`, `catalogid`, `type`, `rbxasset`) SELECT :user, `id`, "' . $assetType . '", 1 FROM `catalog` WHERE `catalog`.`datafile` = :datafile;');
		$stmt->bindParam(':user', $GLOBALS['userTable']['id'], PDO::PARAM_INT);
		$stmt->bindParam(':datafile', $dataFile, PDO::PARAM_STR);
		$stmt->execute();
		
		context::requestImage($dataFile, $assetType);
		
		exit('success');
	}else{
		exit('error');
	}
?>