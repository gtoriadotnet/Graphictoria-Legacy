<?php
	if (isset($_GET['id'])) {
		$datafile = $_GET['id'];
	}else{
		exit;
	}
?>
local headPart = Instance.new("Part", game.Workspace)
headPart.Size = Vector3.new(2, 1, 1)
headPart.formFactor = "Symmetric"
headPart.BottomSurface = "Smooth"
headPart.TopSurface = "Smooth"
local faceDecal = Instance.new("Decal", headPart)
faceDecal.Texture = "rbxasset://textures//face.png"
faceDecal.Face = "Front"
game:Load("http://xdiscuss.net/data/assets/heads/models/<?php echo htmlentities($datafile, ENT_QUOTES, "UTF-8"); ?>")
local p = game:GetChildren()
for i = 1, #p do
if p[i].className == "BlockMesh" then
p[i].Parent = headPart
end
if p[i].className == "SpecialMesh" then
p[i].Parent = headPart
end
if p[i].className == "CylinderMesh" then
p[i].Parent = headPart
end
end