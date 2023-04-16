<?php
namespace Roblox\Data\Entities;

class EntityHelper {
	// Applies the properties of one class to the other
	static function SyncProperties(&$sender, &$receiver) {
		// Grabs the sending class's variables as an array
		$vars = get_object_vars($sender);
		// Iterate through the sending class's variables and apply them to receiving class
		do {
			$receiver->{key($vars)} = current($vars);
		}while (!(next($vars) === FALSE));
	}
}

// EOF