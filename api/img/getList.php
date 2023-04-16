<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		echo $e->getMessage();
	}
	
	$stmt = $dbcon->prepare('SELECT render_id, type, version FROM renders ORDER BY id ASC LIMIT 1;');
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($stmt->rowCount() == 0) {
		echo 'no-render';
	}else{
		echo $result['render_id'].'-'.$result['type'].'-'.$result['version'];
	}
	$dbcon = null;
?>