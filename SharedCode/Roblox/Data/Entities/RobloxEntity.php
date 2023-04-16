<?php
namespace Roblox\Data\Entities;

// http://web.archive.org/web/20140610202436id_/http://broom.gametest1.robloxlabs.com/Legacy/DBWireup/BIZ.txt
// http://web.archive.org/web/20140610202432id_/http://broom.gametest1.robloxlabs.com/Legacy/DBWireup/DAL.txt

abstract class RobloxEntity {
	private static $_entityBasePath = "\\Roblox\\Entities\\Mysql\\"; // TODO: add to site config
	private $_EntityDAL;
	public $ID; // ID isn't always an integer (JobIDs for example)
	
	function __construct(int $id = null) {
		$this->_EntityClassName = get_class($this)."Entity";
		
		$this->Construct($this->Get($id));
		if ($this->_EntityDAL !== null) {
			// $this <-- $_EntityDAL
			EntityHelper::SyncProperties($this->_EntityDAL, $this);
		}else {
			$this->Construct(new $this->_EntityClassName());
		}
	}
	
	function Delete() {
		$this->_EntityDAL->ID = $this->ID;
		return $this->_EntityDAL->Delete();
	}
	
	function Save() {
		// $this --> $this->_EntityDAL
		EntityHelper::SyncProperties($this, $this->_EntityDAL);
		
		// TODO: move this check to EntityHelper.SaveEntity
		// The check for $this->ID here checks if we've loaded the entity from the database.
		// If the entity doesn't already exist in the database, then create it.
		$dateTime = new \DateTime();
		if ($this->ID !== null) {
			$this->_EntityDAL->Created = $dateTime->getTimestamp();
			$this->_EntityDAL->Updated = $this->_EntityDAL->Created;
			
			$this->_EntityDAL->Insert();
		}else {
			$this->_EntityDAL->Updated = $dateTime->getTimestamp();
			
			$this->_EntityDAL->Update();
		}
	}
	
	protected static function CreateNew(...$params){
		// Generate the entity class path
		$entityClassPath = self::$_entityBasePath . substr(get_called_class(), 7);
		
		$entity = new $entityClassPath();
		$entity->CreateNew(...$params);
		
		return $entity;
	}
	
	static function Get(int $id) {
		if ($id == null) {
			return null;
		}
		// Generate the entity class path
		$entityClassPath = self::$_entityBasePath . substr(get_called_class(), 7);
		return \Roblox\Common\EntityHelper::GetEntity(
			self::CacheInfo(), 		  // EntityCacheInfo,
			$id,					  // id,
			$entityClassPath."::Get"  // () => <CLASSNAME>.Get(id)
		);
	}
	
	function Construct($dal) {
		$this->_EntityDAL = $dal;
	}
	
	private static $_cacheSettings = [
		"collectionsAreCacheable" => true,
		"countsAreCacheable" => true,
		"entityIsCacheable" => true,
		"idLookupsAreCacheable" => true,
		"hasUnqualifiedCollections" => true
	];
	
	public static function CacheInfo()
	{
		// Generate the entity cache info on the spot.
		// We can't create it outside of this function.
		$EntityCacheInfo = new \Roblox\Caching\CacheInfo(
			new \Roblox\Caching\CacheabilitySettings(self::$_cacheSettings),
			get_called_class(),
			true // Not sure what this does
		);
		return $EntityCacheInfo;
	}
}

// EOF