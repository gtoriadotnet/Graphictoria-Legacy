<?php
	if (isset($_GET['uid'])) {
		$uid = $_GET['uid'];
		if (strlen($uid == 0)) {
			exit;
		}
		if (!is_numeric($uid)) exit;
	}else{
		exit;
	}
	
	header('Content-Type: text/plain');
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
		
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.';charset=utf8', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	
	$stmt = $dbcon->prepare("SELECT * FROM characterColors WHERE uid=:id AND type='head';");
	$stmt->bindParam(':id', $uid, PDO::PARAM_INT);
	$stmt->execute();
	$head = $stmt->fetch(PDO::FETCH_ASSOC);
	$headColor = true;
	if ($stmt->rowCount() == 0) {
		$headColor = false;
	}
	
	$stmt = $dbcon->prepare("SELECT * FROM characterColors WHERE uid=:id AND type='torso';");
	$stmt->bindParam(':id', $uid, PDO::PARAM_INT);
	$stmt->execute();
	$torso = $stmt->fetch(PDO::FETCH_ASSOC);
	$torsoColor = true;
	if ($stmt->rowCount() == 0) {
		$torsoColor = false;
	}
	
	$stmt = $dbcon->prepare("SELECT * FROM characterColors WHERE uid=:id AND type='rightarm';");
	$stmt->bindParam(':id', $uid, PDO::PARAM_INT);
	$stmt->execute();
	$rightarm = $stmt->fetch(PDO::FETCH_ASSOC);
	$rightarmColor = true;
	if ($stmt->rowCount() == 0) {
		$rightarmColor = false;
	}
	
	$stmt = $dbcon->prepare("SELECT * FROM characterColors WHERE uid=:id AND type='rightleg';");
	$stmt->bindParam(':id', $uid, PDO::PARAM_INT);
	$stmt->execute();
	$rightleg = $stmt->fetch(PDO::FETCH_ASSOC);
	$rightlegColor = true;
	if ($stmt->rowCount() == 0) {
		$rightlegColor = false;
	}
	
	$stmt = $dbcon->prepare("SELECT * FROM characterColors WHERE uid=:id AND type='leftarm';");
	$stmt->bindParam(':id', $uid, PDO::PARAM_INT);
	$stmt->execute();
	$leftarm = $stmt->fetch(PDO::FETCH_ASSOC);
	$leftarmColor = true;
	if ($stmt->rowCount() == 0) {
		$leftarmColor = false;
	}
	
	$stmt = $dbcon->prepare("SELECT * FROM characterColors WHERE uid=:id AND type='leftleg';");
	$stmt->bindParam(':id', $uid, PDO::PARAM_INT);
	$stmt->execute();
	$leftleg = $stmt->fetch(PDO::FETCH_ASSOC);
	$leftlegColor = true;
	if ($stmt->rowCount() == 0) {
		$leftlegColor = false;
	}
?>
<?xml version="1.0" encoding="utf-8"?>
<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="" version="4">
    <External>null</External>
    <External>nil</External>
    <Item class="BodyColors">
        <Properties>
			<?php
				if ($headColor == true) {
					echo '<int name="HeadColor">'.$head['color'].'</int>';
				}else{
					echo '<int name="HeadColor">1</int>';
				}
				if ($leftarmColor == true) {
					echo '<int name="LeftArmColor">'.$leftarm['color'].'</int>';
				}else{
					echo '<int name="LeftArmColor">1</int>';
				}
				if ($leftlegColor == true) {
					echo '<int name="LeftLegColor">'.$leftleg['color'].'</int>';
				}else{
					echo '<int name="LeftLegColor">21</int>';
				}
				if ($rightarmColor == true) {
					echo '<int name="RightArmColor">'.$rightarm['color'].'</int>';
				}else{
					echo '<int name="RightArmColor">1</int>';
				}
				if ($rightlegColor == true) {
					echo '<int name="RightLegColor">'.$rightleg['color'].'</int>';
				}else{
					echo '<int name="RightLegColor">21</int>';
				}
				if ($torsoColor == true) {
					echo '<int name="TorsoColor">'.$torso['color'].'</int>';
				}else{
					echo '<int name="TorsoColor">26</int>';
				}
			?>
            <bool name="archivable">true</bool>
        </Properties>
    </Item>
</roblox>
<?php
	$dbcon = null;
?>