<?php
	exit('disabled');
	if ($_GET['key'] != "894cfcdf-7714-4fea-a3f1-436d711a462b") exit;
	if (!isset($_GET['hash'])) exit;
	$placeHash = $_GET['hash'];
	if (strpos($placeHash, 'xdiscuss.net') !== false) die("preset");
	@unlink("/var/www/graphictoria/data/assets/uploads/".$placeHash);
	
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		echo $e->getMessage();
	}
	
	$aa = '%'.$placeHash.'%';
	$stmt = $dbcon->prepare("SELECT * FROM games WHERE `placeURL` LIKE :aa ORDER BY id DESC LIMIT 1;");
	$stmt->bindParam(':aa', $aa, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$id = $result['id'];
	
	$stmt = $dbcon->prepare("DELETE FROM renders WHERE render_id = :key AND type = 'server';");
	$stmt->bindParam(':key', $id, PDO::PARAM_STR);
	$stmt->execute();
	$dbcon = null;
	
	echo 'success';
?>