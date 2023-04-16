<?php
	if (isset($_GET['id'])) {
		$userid = $_GET['id'];
	}else{
		exit;
	}
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		echo $e->getMessage();
	}
	$stmt = $dbcon->prepare("SELECT charap, id FROM users WHERE id=:id");
	$stmt->bindParam(':id', $userid, PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$userid = $result['id'];
?>
game.Lighting.TimeOfDay = "12"
local player = game.Players:CreateLocalPlayer(0)
player.CharacterAppearance = "<?php
	$stmt = $dbcon->prepare("SELECT * FROM wearing WHERE uid=:uid;");
	$stmt->bindParam(':uid', $userid, PDO::PARAM_INT);
	$stmt->execute();
	if ($stmt->rowCount() == 0) {
		echo 'http://api.xdiscuss.net/user/getcolors.php?uid='.$userid;
	}else{
		echo 'http://api.xdiscuss.net/user/getcolors.php?uid='.$userid.';';
	}
	$count = 0;
	foreach($stmt as $result) {
		if ($result['type'] == "gear") {
		}else{
			if ($count !== $stmt->rowCount()) {
				if (isset($_GET['mode'])) {
					echo $result['aprString'].';';
				}else{
					echo $result['aprString'].'?tick='.time().';';
				}
			}else{
				echo $result['aprString'];
				if (isset($_GET['mode'])) {
					echo $result['aprString'];
				}else{
					echo $result['aprString'].'?tick='.time();
				}
			}
		}
		$count++;
	}
	$dbcon = null;
?>"

local loadCharacter = coroutine.create(function()
	wait(0.5)
    player:LoadCharacter()
	wait(0.5)
	player:LoadCharacter()
	wait(0.25)
	local count = 0
	local p = player.Backpack:GetChildren()
	for i = 1, #p do
		if p[i].className == "Tool" then
			count = count + 1
			if (count == 1) then
				game.Workspace.Player.Torso:findFirstChild("Right Shoulder").DesiredAngle = 1.58 
				game.Workspace.Player.Torso:findFirstChild("Right Shoulder").CurrentAngle = 1.58
				game.Workspace.Player.Torso.Anchored = true
				wait(0.25)
				p[i].Parent = player.Character
			end
		end
	end
end)
 
coroutine.resume(loadCharacter)