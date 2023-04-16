<?php
	if (isset($_GET['id'])) {
		$gameID = $_GET['id'];
	}else{
		exit;
	}
	
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.';charset=utf8', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	
	$stmt = $dbcon->prepare("SELECT placeURL, dedi FROM games WHERE id=:id");
	$stmt->bindParam(':id', $gameID, PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($result['dedi'] == 1) echo 'game:Load("'.htmlentities($result['placeURL'], ENT_QUOTES, "UTF-8").'");';
	$dbcon = null;
?>
local p = game.StarterPack:GetChildren()
for i = 1, #p do
	p[i].Parent = nil
end
local p = game.Workspace:GetChildren()
for i = 1, #p do
	if p[i].className == "Message" then
		p[i].Parent = nil
	end
	if p[i].className == "Hint" then
		p[i].Parent = nil
	end
end
<?php
	//if (isset($_GET['version']) && $_GET['version'] == 2) exit;
?>
local p = game.StarterGui:GetChildren()
for i = 1, #p do
	p[i].Parent = nil
end