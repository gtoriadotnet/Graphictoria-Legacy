<?php

// This file defines the Roblox.Caching.CacheInfo class.

namespace Roblox\Caching;

class CacheInfo {
	private /*CacheabilitySettings*/ $cacheSettings;
	private /*String*/ $entityName;
	private /*Bool*/ $boolValue;
	
	function __construct($settings, $entityName, $boolValue = true) {
		$this->cacheSettings = $settings;
		$this->entityName = $entityName;
		$this->boolValue = $boolValue;
	}
	
	function CacheSettings() {
		return $cacheSettings;
	}
	
	function EntityName() {
		return $entityName;
	}
}

// EOF