<?php

// This file defines the Roblox.Caching.CacheabilitySettings class.

namespace Roblox\Caching;

class CacheabilitySettings {
	public $collectionsAreCacheable = false;
	public $countsAreCacheable = false;
	public $entityIsCacheable = false;
	public $idLookupsAreCacheable = false;
	public $hasUnqualifiedCollections = false;
	
	function __construct($settings = []) {
		foreach ($settings as $name => $value) {
			if (isset($this->$name)) {
				// TODO: This makes potential private classes modifiable from outside the class
				$this->$name = $value;
			}else {
				// One of the given cacheability settings doesn't exist
				throw new \Exception("Invalid cacheability setting: \"$name\"");
			}
		}
	}
}

// EOF