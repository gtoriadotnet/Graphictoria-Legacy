<?php
exit('disabled');
	include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
	/*
	if ($_SERVER['HTTP_USER_AGENT'] != "Graphictoria/WinInet") {
		echo 'error("Not being called from a Graphictoria server.");';
		$dbcon = null;
		exit;
	}
	*/
	if (isset($_GET['key'])) {
		$key = $_GET['key'];
	}else{
		$dbcon = null;
		exit;
	}
	
	$dedicatedServer = false; // Switch between user hosted server and a dedicated server
	if (isset($_GET['dedicated'])) $dedicatedServer = true;
	
	try{
		$dbcon = new PDO('mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.'', $db_user, $db_passwd);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
		$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}catch (PDOExpection $e){
		echo $e->getMessage();
	}
	$stmtU = $dbcon->prepare("SELECT * FROM games WHERE `privatekey`=:key;");
	$stmtU->bindParam(':key', $key, PDO::PARAM_STR);
	$stmtU->execute();
	$dbcon = null;
	if ($stmtU->rowCount() == 0) {
		exit;
	}
	$rGame = $stmtU->fetch(PDO::FETCH_ASSOC);
	$serverID = $rGame['id'];
	if (!isset($_GET['port'])) {
		$serverPort = $rGame['port'];
	}else{
		$serverPort = $_GET['port'];
	}
	$serverKey = $rGame['privatekey'];
	$gameVersion = $rGame['version'];
?>

<?php
	if (isset($_GET['placeURL'])) {
		if (is_array($_GET['placeURL'])) exit;
		echo 'game:Load("'.htmlentities($_GET['placeURL'], ENT_QUOTES, "UTF-8").'");';
	}
?>

game:GetService("NetworkServer"):Start(<?php echo htmlentities($serverPort, ENT_QUOTES, "UTF-8");?>, 20)
game:GetService("RunService"):Run()
print("Graphictoria Server")

coroutine.resume(coroutine.create(function()
	while (true) do
		<?php
			if (!$dedicatedServer) echo 'game:HttpGet("http://api.gtoria.net/server/ping.php?key='.$serverKey.'&tick=" .. tick(), true)';
			if ($dedicatedServer) echo 'game:HttpGet("http://api.gtoria.net/server/ping.php?key='.$serverKey.'&players=" .. game.Players.NumPlayers .. "&tick=" .. tick(), true)';
		?>
		wait(60)
	end
end))

function authenticate(newPlayer)
	coroutine.resume(coroutine.create(function()
		local verification = game:HttpGet("http://api.gtoria.net/server/checkPlayer.php?uname=" .. newPlayer.Name .. "&gameId=<?php echo $serverID;?>&uid=".. newPlayer.userId .."&tick=" .. tick(), true)
		if (verification:sub(4) ~= "yes") then
			local p = game:GetService("NetworkServer"):GetChildren()
			for i = 1, #p do
				if (p[i]:GetPlayer().Name == newPlayer.Name) then
					print (newPlayer.Name .. " has failed to authenticate.")
					wait()
					p[i]:CloseConnection()
				end
			end
			return false
		else
			return true
		end
	end))
	if (newPlayer.Name == "Player") then
		coroutine.resume(coroutine.create(function()
			local p = game:GetService("NetworkServer"):GetChildren()
			for i = 1, #p do
				if (p[i]:GetPlayer().Name == newPlayer.Name) then
					print (newPlayer.Name .. " has connected with an invalid username.")
					wait()
					p[i]:CloseConnection()
				end
			end
		end))
		return false
	else
		return true
	end
	local plrNum = 0
	local p = game.Players:GetChildren()
	for i = 1, #p do
		if (p[i].Name == newPlayer.Name) then
			plrNum = plrNum + 1
		end
	end
	if (plrNum > 1) then
		coroutine.resume(coroutine.create(function()
			local p = game:GetService("NetworkServer"):GetChildren()
			for i = 1, #p do
				if (p[i]:GetPlayer().Name == newPlayer.Name) then
					print (newPlayer.Name .. " has been kicked for duplication.")
					wait()
					p[i]:CloseConnection()
				end
			end
		end))
		return false
	else
		return true
	end
end

function hex(str)
	return (str:gsub('.', function (c)
		return string.format('%02X', string.byte(c))
	end))
end

game:GetService("NetworkServer").ChildAdded:connect(function(newConnection)
	newConnection.Name = "ClientConnection"
	wait(1)
	newConnection.Name = ("Connection " .. math.random(0, 99999999))
end)

game:GetService("Players").PlayerAdded:connect(function(newPlayer)
	wait()
	newPlayer.Chatted:connect(function(message)
		local hexmsg = hex(message)
		if (hexmsg:find'A0') then
			newPlayer.Parent = nil
		end
		if (message == ";reset") then
			newPlayer.Character.Humanoid.Health = 0
		end
	end)
	if (authenticate(newPlayer)) then
		<?php if ($gameVersion == 3) {
			echo 'newPlayer.CharacterAppearance = "http://api.gtoria.net/user/getCharacter.php?uid=" .. newPlayer.userId .. "&key=D869593BF742A42F79915993EF1DB&tick=" .. tick()';
		}?>
		print(newPlayer.Name .. " has joined this server")
		--[[
		newPlayer.CharacterAdded:connect(function(newCharacter)
			newCharacter.Humanoid.Died:connect(function()
				<?php if ($gameVersion == 3) {
					echo 'newPlayer.CharacterAppearance = "http://api.gtoria.net/user/getCharacter.php?uid=" .. newPlayer.userId .. "&key=D869593BF742A42F79915993EF1DB&tick=" .. tick()';
				}?>
				wait(5)
				newPlayer:LoadCharacter()
			end)
		end)
		]]
		newPlayer:LoadCharacter()
	end
end)