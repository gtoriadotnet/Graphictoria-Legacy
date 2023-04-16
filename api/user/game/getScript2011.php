loadfile("http://api.xdiscuss.net/Asset/?id=500&tick=" .. tick())() -- Main gui
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
	if ($stmtU->rowCount() == 0 or $stmtG->rowCount() == 0) die('game:GetService("NetworkClient") game:GetService("Visit"):SetUploadUrl("") setMessage("Server not found!");');
	
	// Throw an error on the client if the user is not authorized to join the game
	if ($rGame['public'] == 0) {
		$gameKey = $rGame['key'];
		$stmtU = $dbcon->prepare("SELECT * FROM gameKeys WHERE userid=:id AND `key` = :key;");
		$stmtU->bindParam(':id', $userID, PDO::PARAM_INT);
		$stmtU->bindParam(':key', $gameKey, PDO::PARAM_STR);
		$stmtU->execute();
		if ($stmtU->rowCount() == 0 and $rGame['creator_uid'] != $userID and $rUser['rank'] == 0) die('game:GetService("NetworkClient") game:GetService("Visit"):SetUploadUrl("") setMessage("You are not authorized to join this server.");');
	}
	
	// If a special ban is enabled, it will "fail to connect".
	if ($rUser['publicBan'] == 1) die('game:GetService("NetworkClient") game:GetService("Visit"):SetUploadUrl("") setMessage("Unable to connect to Graphictoria");');
	
	// Throw an error if the authentication keys do not match
	if ($pkey != $rUser['gameKey']) die('game:GetService("NetworkClient") game:GetService("Visit"):SetUploadUrl("") setMessage("Authentication has failed.");');
	
	$dbcon = null; // We're done with the database.
?>
game:GetService("RunService"):Run()
settings().Diagnostics:LegacyScriptMode()
game:SetRemoteBuildMode(true)

setMessage("Connecting to the server")
local visit = game:GetService("Visit")
visit:SetUploadUrl("")
local networkClient = game:GetService("NetworkClient")
local player = networkClient:PlayerConnect(<?php echo $rUser['id'];?>, "<?php echo $rGame['ip'];?>", <?php echo $rGame['port'];?>, 20, 0)
player.Name = "<?php echo $rUser['username'];?>"
player.CharacterAppearance = "http://api.xdiscuss.net/user/getCharacter.php?uid=<?php echo $rUser['id'];?>&key=D869593BF742A42F79915993EF1DB&tick=<?php echo time();?>"

networkClient.ConnectionFailed:connect(function()
	setMessage("Connection to the server has failed")
end)

networkClient.ConnectionRejected:connect(function()
	setMessage("Connection has been rejected")
end)

networkClient.ConnectionAccepted:connect(function(peer, replicator)
	local isLoading = true
	player.Changed:connect(function(change)
		if (change == "Character") then
			isLoading = false
			setMessage("")
		end
	end)
	while (isLoading) do
		wait(0.5)
		game.Workspace:ZoomToExtents()
		if (isLoading) then
			setMessage("Loading game...")
		end
	end
	replicator.Disconnection:connect(function()
		setMessage("Connection to the server has been lost")
	end)
end)

loadfile("http://api.xdiscuss.net/Asset/?id=501&tick=" .. tick())() -- Player list