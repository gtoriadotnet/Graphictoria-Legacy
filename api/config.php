<?php
	if (strpos($_SERVER['SCRIPT_NAME'], "config.php")) {
		header("Location: /");
		exit;
	}
	
	$db_host = "127.0.0.1";
	$db_user = "";
	$db_name = "";
	$db_passwd = "";
	$db_port = 3306;
	
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name, $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
?>
