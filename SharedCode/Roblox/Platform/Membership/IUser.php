<?php

// This file defines the Roblox.Platform.Membership.IUser interface.

namespace Roblox\Platform\Membership;

interface IUser {
	public /*int*/ $userId;
	public /*string*/ $username;
	public /*UserModelBuildersClubMembershipTypeEnum*/ $buildersClubMembershipType;
}

// EOF