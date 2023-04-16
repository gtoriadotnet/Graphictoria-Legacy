<?php
	// Check if key exists and validate it
	if (!isset($_GET['key'])) exit;
	if (is_array($_GET['key'])) exit;
	if ($_GET['key'] != "9cBOle3VIeU0wBfZmkL92qNU63xk8Y90") die("Not being called from an authenticated server.");
	
	// Check if userID exists and assign it
	if (!isset($_GET['userID'])) exit;
	if (is_array($_GET['userID'])) exit;
	if (!is_numeric($_GET['userID'])) exit;
	$userID = $_GET['userID'];
	
	// Check if gameID exists and assign it
	if (!isset($_GET['gameID'])) exit;
	if (is_array($_GET['gameID'])) exit;
	if (!is_numeric($_GET['gameID'])) exit;
	$gameID = $_GET['gameID'];
	
	// Check if player key exists and assign it
	if (!isset($_GET['pkey'])) exit;
	if (is_array($_GET['pkey'])) exit;
	$pkey = $_GET['pkey'];
	
	// Create the database connection
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		exit;
	}
	
	// User row
	$stmtU = $dbcon->prepare("SELECT * FROM users WHERE id=:id;");
	$stmtU->bindParam(':id', $userID, PDO::PARAM_INT);
	$stmtU->execute();
	$rUser = $stmtU->fetch(PDO::FETCH_ASSOC);
	
	// Game row
	$stmtG = $dbcon->prepare("SELECT * FROM games WHERE id=:id;");
	$stmtG->bindParam(':id', $gameID, PDO::PARAM_INT);
	$stmtG->execute();
	$rGame = $stmtG->fetch(PDO::FETCH_ASSOC);
	
	// Throw an error on the client if the game does not exist
	if ($stmtU->rowCount() == 0 or $stmtG->rowCount() == 0) die('game:GetService("NetworkClient") game:GetService("Visit"):SetUploadUrl("") game:SetMessage("Server not found!");');
	
	// Throw an error on the client if the user is not authorized to join the game
	if ($rGame['public'] == 0) {
		$gameKey = $rGame['key'];
		$stmtU = $dbcon->prepare("SELECT * FROM gameKeys WHERE userid=:id AND `key` = :key;");
		$stmtU->bindParam(':id', $userID, PDO::PARAM_INT);
		$stmtU->bindParam(':key', $gameKey, PDO::PARAM_STR);
		$stmtU->execute();
		if ($stmtU->rowCount() == 0 and $rGame['creator_uid'] != $userID and $rUser['rank'] == 0) die('game:GetService("NetworkClient") game:GetService("Visit"):SetUploadUrl("") game:SetMessage("You are not authorized to join this server.");');
	}
	
	// If a special ban is enabled, it will "fail to connect".
	if ($rUser['publicBan'] == 1) die('game:GetService("NetworkClient") game:GetService("Visit"):SetUploadUrl("") game:SetMessage("Unable to connect to Graphictoria");');
	
	// Throw an error if the authentication keys do not match
	if ($pkey != $rUser['gameKey']) die('game:GetService("NetworkClient") game:GetService("Visit"):SetUploadUrl("") game:SetMessage("Authentication has failed.");');
	
	$dbcon = null; // We're done with the database.
?>
game:GetService("RunService"):Run()
local networkClient = game:GetService("NetworkClient")
local visit = game:GetService("Visit")
local player = game:GetService("Players"):CreateLocalPlayer(<?php echo $rUser['id'];?>)
player.Name = "<?php echo $rUser['username'];?>"
game.Players:SetChatStyle(Enum.ChatStyle.ClassicAndBubble)
player.CharacterAppearance = "http://api.xdiscuss.net/user/getCharacter.php?uid=<?php echo $rUser['id'];?>&key=D869593BF742A42F79915993EF1DB&tick=<?php echo time();?>"
networkClient:SetOutgoingKBPSLimit(1)
networkClient:Connect("<?php echo $rGame['ip'];?>", <?php echo $rGame['port'];?>, 0, 20)
visit:SetUploadUrl("")

game:SetMessage("Connecting to Server...")

networkClient.ConnectionAccepted:connect(function(p, replicator)
	local isLoading = true
	game:SetMessageBrickCount()
	
	replicator:SendMarker().Received:connect(function()
		game:SetMessage("Waiting for Character...")
		player.Changed:connect(function(change)
			if (change == "Character") then
				game:ClearMessage()
				local screenGUI = Instance.new("ScreenGui", player.PlayerGui)
				screenGUI.Name = "ResetGUI"
				local resetBtn = Instance.new("TextButton", screenGUI)
				resetBtn.Name = "ResetButton"
				resetBtn.Text = "Reset"
				resetBtn.Position = UDim2.new(0, 300, 0, -20)
				resetBtn.Size = UDim2.new(0, 100, 0, 20)
				resetBtn.TextColor3 = Color3.new(191, 191, 191)
				resetBtn.BackgroundColor3 = Color3.new(105, 105, 105)
				resetBtn.BackgroundTransparency = 0.4
				resetBtn.BorderSizePixel = 0
					
				resetBtn.MouseButton1Click:connect(function()
					player.Character:BreakJoints()
				end)
				isLoading = false
			end
			if (change == "Parent") then
				game:SetMessage("This game has shut down.")
				game:GetService("NetworkClient"):Disconnect()
			end
		end)
		player.Chatted:connect(function(message)
			game:SetMessage(message)
		end)
	end)
	
	replicator.Disconnection:connect(function()
		game:SetMessage("You have lost the connection to the Server.")
	end)
	
	while (isLoading) do
		game.Workspace:ZoomToExtents()
		wait(0.5)
	end
end)

networkClient.ConnectionRejected:connect(function()
	game:SetMessage("Unable to connect because the client and server version do not match.")
end)

networkClient.ConnectionFailed:connect(function(_, id)
	game:SetMessage("Failed to connect to the Server. (ID=" .. id .. ")")
end)

coroutine.resume(coroutine.create(function()
	while (true) do
		local ping = game:HttpGet("http://api.xdiscuss.net/server/pingPlayer.php?userID=<?php echo $userID;?>&key=<?php echo $pkey;?>&gameID=<?php echo $gameID;?>&gameId=<?php echo $gameID;?>&tick=" .. tick(), true)
		if (ping:sub(4) == "banned") then
			game:SetMessage("Your account has been suspended from Graphictoria.")
			game:GetService("NetworkClient"):Disconnect()
		end
		wait(30)
	end
end))