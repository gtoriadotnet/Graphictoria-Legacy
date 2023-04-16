// Register the namespace for the control.
Type.registerNamespace('Roblox.Thumbs');

//
// Definte the control properties.
//
Roblox.Thumbs.AvatarImage = function(element) {
	Roblox.Thumbs.AvatarImage.initializeBase(this, [element]);
	this._userID = 0;
}

//
// Create the prototype for the control.
//