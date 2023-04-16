<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
	
	function getCdnUrl($hash)
	{
		$st = 31;
		for($i = 0; $i < 32; $i++)
		{
			$st ^= ord($hash[$i]);
		}
	
		return 'https://c' . strval($st % 8) . '.rbxcdn.com/' . $hash;
	}
	
	$get = array_change_key_case($_GET, CASE_LOWER);
	
	$id = 0;
	$version = 0;
	
	if(isset($get['id']))
	{
		$id = (int)$get['id'];
	}
	else
	{
		http_response_code(404);
		exit;
	}
	
	if(isset($get['version']))
	{
		$version = (int)$get['version'];
	}
	
	$stmt = $GLOBALS['dbcon']->prepare('SELECT `creator_uid`, `buyable`, `deleted`, `approved`, `type`, `fileHash`, `assetid`, `datafile` FROM `catalog` WHERE `id`=:id LIMIT 1;');
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	
	if($stmt->rowCount() === 0)
	{
		if(isset($_SERVER['HTTP_USER_AGENT']) && str_starts_with(strtolower($_SERVER['HTTP_USER_AGENT']), 'roblox/'))
		{
			$stmt = $GLOBALS['dbcon']->prepare('SELECT `id`, `filehash` FROM `rbxassets` WHERE `rbxassetid`=:id AND `version`=:version LIMIT 1;');
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->bindParam(':version', $version, PDO::PARAM_INT);
			$stmt->execute();
			
			$rows = $stmt->rowCount();
			
			if($rows == 0 || $version == 0)
			{
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_USERAGENT, 'Roblox/Graphictoria');
				curl_setopt($ch, CURLOPT_URL, 'https://platinum.roblox.com/v1/asset/?id=' . $id . '&version=' . $version);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('host: assetdelivery.roblox.com'));
				curl_setopt($ch, CURLOPT_HEADER, 1);
				curl_setopt($ch, CURLOPT_NOBODY, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
				$result = curl_exec($ch);
				curl_close($ch);
				
				$responseCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
				
				switch($responseCode)
				{
					case 403:
					case 404:
						if($stmt->rowCount() != 0)
						{
							$asset = $stmt->fetch(PDO::FETCH_ASSOC);
							
							http_response_code(301);
							header('location: ' . getCdnUrl($asset['filehash']));
							exit;
						}
						break;
					default:
						break;
				}
				
				switch($responseCode)
				{
					case 403:
						http_response_code(403);
						exit;
						break;
					case 404:
						http_response_code(404);
						exit;
						break;
					default:
						break;
				}
				
				$headers = [];
				
				foreach(explode("\r\n", $result) as $header)
				{
					$parsed = explode(': ', $header);
					
					if(isset($parsed[1]))
						$headers[$parsed[0]] = $parsed[1];
				}
				
				if(isset($headers['location']))
				{
					$hash = substr($headers['location'], strrpos($headers['location'], '/') + 1);
					
					if($stmt->rowCount() == 0)
					{
						$stmt = $GLOBALS['dbcon']->prepare('INSERT INTO `rbxassets` (`rbxassetid`, `version`, `filehash`) VALUES(:id, :version, :hash);');
						$stmt->bindParam(':id', $id, PDO::PARAM_INT);
						$stmt->bindParam(':version', $version, PDO::PARAM_INT);
						$stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
						$stmt->execute();
					}
					else
					{
						$tableid = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
						
						$stmt = $GLOBALS['dbcon']->prepare('UPDATE `rbxassets` SET `rbxassetid`=:id, `version`=:version, `filehash`=:hash WHERE `id`=:tbid;');
						$stmt->bindParam(':id', $id, PDO::PARAM_INT);
						$stmt->bindParam(':tbid', $id, PDO::PARAM_INT);
						$stmt->bindParam(':version', $version, PDO::PARAM_INT);
						$stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
						$stmt->execute();
					}
					
					http_response_code(301);
					header('location: ' . getCdnUrl($hash));
					exit;
				}
				elseif($rows != 0)
				{
					$asset = $stmt->fetch(PDO::FETCH_ASSOC);
					
					http_response_code(301);
					header('location: ' . getCdnUrl($asset['filehash']));
					exit;
				}
				
				http_response_code(404);
				exit;
			}
			else
			{
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				
				http_response_code(301);
				header('location: ' . getCdnUrl($result['filehash']));
				exit;
			}
		}
		
		http_response_code(404);
		exit;
	}
	
	$asset = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($asset['deleted'] == 1 || $asset['approved'] == 0)
	{
		http_response_code(403);
		exit;
	}
	
	http_response_code(301);
	switch($asset['type'])
	{
		case 'heads':
		case 'faces':
		case 'gear':
		case 'hats':
			header('location: https://www.gtoria.net/data/assets/' . $asset['type'] . '/models/' . $asset['datafile']);
			break;
		case 'tshirts':
		case 'pants':
		case 'shirts':
			header('location: https://www.gtoria.net/data/assets/' . $asset['type'] . '/models/get.php?id=' . $asset['assetid']);
			break;
		case 'decals':
			header('location: https://www.gtoria.net/data/assets/uploads/' . $asset['fileHash']);
			break;
		default:
			http_response_code(400);
			break;
	}