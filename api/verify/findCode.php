<?php
exit('disabled');
	// Check if everything exists and is valid
	if (!isset($_GET['username'])) die("bad");
	if (is_array($_GET['username'])) die("bad");
	$username = $_GET['username'];
	
	if (!isset($_GET['key'])) die("bad-key");
	if (is_array($_GET['key'])) die("bad-key");
	if ($_GET['key'] != "hhXPjR5dOEPKeIkktLfW2PRlQh8aAWDr") die("bad-key");
	
	if (!isset($_GET['code'])) die("bad-code");
	if (is_array($_GET['code'])) die("bad-code");
	if (!is_numeric($_GET['code'])) die("bad-code");
	$code = $_GET['code'];
	
	// Create database connection.
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	
	// Validate everything
	$stmt = $dbcon->prepare("SELECT id, about FROM users WHERE username=:uid;");
	$stmt->bindParam(':uid', $username, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
	// Check if code is found
	if (strpos($result['about'], $code) !== false) {
		echo 'found';
	}else{
		echo 'not-found';
	}
	
	$dbcon = null;
?>