<?php
	if (isset($_GET['id'])) {
		$userid = $_GET['id'];
		if (filter_var($userid, FILTER_VALIDATE_INT) == false) {
			exit;
		}
	}else{
		exit;
	}
?>
local player = game.Players:CreateLocalPlayer(0)
game.Lighting.TimeOfDay = "12"
player.CharacterAppearance = "http://api.xdiscuss.net/user/getCharacter.php?uid=1&key=D869593BF742A42F79915993EF1DB&mode=shirts&sid=<?php echo $userid;?>&tick=" .. tick()
local loadCharacter = coroutine.create(function()
	wait(0.5)
    player:LoadCharacter()
	wait(0.5)
	player:LoadCharacter()
	
	local p = player.Character:GetChildren()
	for i = 1, #p do
	if p[i].className == "Part" then
	p[i].BrickColor = BrickColor.new("White")
	end
	end
end)
 
coroutine.resume(loadCharacter)