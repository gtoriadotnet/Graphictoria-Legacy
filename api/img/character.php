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
	$dbcon = null;
?>
game.Lighting.TimeOfDay = "12"
local player = game.Players:CreateLocalPlayer(0)
player.CharacterAppearance = "http://api.xdiscuss.net/user/getCharacter.php?uid=<?php echo $userid;?>&mode=ch&sid=1&key=D869593BF742A42F79915993EF1DB&tick=" .. tick()

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
	<?php
		if ($result['charap'] == 1) {
			echo 'player.Character.Torso.Anchored = true
	game:GetService("RunService"):Run()
	wait(0.5)
	player.Character:findFirstChild("Left Leg").Anchored = true
	wait(0.5)
	player.Character:findFirstChild("Left Leg").Anchored = false
	';
		}elseif($result['charap'] == 2) {
			echo 'player.Character.Humanoid.Sit = true
	game:GetService("RunService"):Run()
	wait(0.25)
	player.Character.Torso.Anchored = true
	';
		}elseif($result['charap'] == 3) {
			echo "player.Character.Torso['Left Shoulder'].C0=CFrame.new(-1, 0.5, 0, -4.37113883e-08, 0, -1, 0, 0.99999994, 0, 1, 0, -4.37113883e-08);
player.Character.Torso['Left Shoulder'].C1=CFrame.new(0.49999997, 0.49999997, 4.47034836e-08, 0.163175777, -0.229498923, -0.959533036, -0.33284384, 0.90274477, -0.272519022, 0.928756475, 0.363843203, 0.0709187835);
player.Character.Torso['Right Shoulder'].C0=CFrame.new(1, 0.5, 0, -4.37113883e-08, 0, 1, -0, 0.99999994, 0, -1, 0, -4.37113883e-08);
player.Character.Torso['Right Shoulder'].C1=CFrame.new(-0.5, 0.5, 0, 0.163175479, 0.229498848, 0.959533155, 0.332843512, 0.902745068, -0.272518843, -0.928756654, 0.363842756, 0.0709186569);";
		}
	?>
end)
 
coroutine.resume(loadCharacter)