<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		echo $e->getMessage();
	}
	
	if (isset($_GET['renderid']) and isset($_GET['type']) and isset($_GET['apiKey']) and isset($_GET['version'])) {
		$renderId = $_GET['renderid'];
		$type = $_GET['type'];
		$apiKey = $_GET['apiKey'];
		$version = $_GET['version'];
		
		if ($apiKey == "edrherhesrhserhserhrse") {
			if ($type == "character") {
				$time = time();
				if ($version == 1) {
					$stmt = $dbcon->prepare("UPDATE users SET imgTime = :time WHERE id=:id");
					$stmt->bindParam(':id', $renderId, PDO::PARAM_INT);
					$stmt->bindParam(':time', $time, PDO::PARAM_INT);
					$stmt->execute();
				}
				if ($version == 2) {
					$stmt = $dbcon->prepare("UPDATE users SET imgTime2008 = :time WHERE id=:id");
					$stmt->bindParam(':id', $renderId, PDO::PARAM_INT);
					$stmt->bindParam(':time', $time, PDO::PARAM_INT);
					$stmt->execute();
				}
			}elseif ($type == "hats" || $type == "heads" || $type == "gear") {
				$stmt = $dbcon->prepare("UPDATE catalog SET imgTime = NOW() WHERE datafile=:id");
				$stmt->bindParam(':id', $renderId, PDO::PARAM_STR);
				$stmt->execute();
			}elseif ($type == "server") {
				$stmt = $dbcon->prepare("UPDATE games SET imgTime = NOW() WHERE id=:id");
				$stmt->bindParam(':id', $renderId, PDO::PARAM_STR);
				$stmt->execute();
			}
			$stmt = $dbcon->prepare('DELETE FROM renders WHERE render_id = :rid AND type = :type AND version = :version;');
			$stmt->bindParam(':rid', $renderId, PDO::PARAM_INT);
			$stmt->bindParam(':version', $version, PDO::PARAM_INT);
			$stmt->bindParam(':type', $type, PDO::PARAM_STR);
			$stmt->execute();
		}
	}

	$dbcon = null;
?>