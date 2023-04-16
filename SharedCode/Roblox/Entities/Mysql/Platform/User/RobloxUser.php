<?php
namespace Roblox\Entities\Mysql\Platform\User;

class RobloxUser extends \Roblox\Data\Entities\Entity {
	// Define properties here
	
	function CreateNew(...$params) {
		// Set default properties here
		// Modify properties based on params
		// Call Insert function
		throw new \Exception(__CLASS__ . "->CreateNew() not implemented");
	}
	
	function Delete() {
		throw new \Exception(__CLASS__ . "->Delete() not implemented");
	}
	function Insert() {
		throw new \Exception(__CLASS__ . "->Insert() not implemented");
	}
	function Update() {
		throw new \Exception(__CLASS__ . "->Update() not implemented");
	}
	static function Get($id) {
		throw new \Exception(__CLASS__ . "->Get() not implemented");
	}
}

// EOF