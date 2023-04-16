game:GetService("Visit")
game:GetService("RunService"):Run()
local player = game.Players:CreateLocalPlayer(0)
player:LoadCharacter()
while (true) do
	wait(0.1)
	if (player.Character.Humanoid.Health == 0) then
		wait(5)
		player:LoadCharacter()
	end
end