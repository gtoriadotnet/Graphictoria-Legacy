<?php

// This file defines the Roblox.Platform.AssetOwnership.UserAsset class.

namespace Roblox\Platform\AssetOwnership;

class UserAsset {
	public /*int*/ $userAssetId;
	public /*int*/ $assetId;
	public /*int*/ $serialNumber;
	public /*Roblox\Platform\Membership\IUser*/ $owner;
	public /*\DateTime*/ $created;
	public /*\DateTime*/ $updated;
	
	function __construct($userAssetId) {
		$this->userAssetId = $userAssetId;
		// TODO: Load other values
	}
}

// EOF