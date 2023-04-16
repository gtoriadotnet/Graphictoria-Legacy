<?php

// This file defines the Roblox.Platform.Membership.User class. This class may or may not have existed.

namespace Roblox\Platform\Membership;

class User implements IUser {
	function __construct($userId) {
		$this->userId = $userId;
		// TODO: Load other values
	}
}

// EOF