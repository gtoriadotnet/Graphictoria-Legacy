<?php
	if (isset($_GET['id'])) {
		$datafile = $_GET['id'];
	}else{
		exit;
	}
?>
game:Load("http://xdiscuss.net/data/assets/gear/models/<?php echo htmlentities($datafile, ENT_QUOTES, "UTF-8"); ?>");
local p = game:GetChildren()
for i = 1, #p do
if p[i].className == "Tool" then
p[i].Parent = game.Workspace
end
end