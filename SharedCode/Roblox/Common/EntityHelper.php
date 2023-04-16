<?php

// This file defines the Roblox.Common.EntityHelper class. Originally housed in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Data\Roblox.Data\Entities\EntityHelper.cs.

namespace Roblox\Common;

class EntityHelper {
	
	static function GetOrCreateEntity/*[TIndex,TEntity,TDal]*/(/*ICacheInfo*/ $cacheInfo, /*String*/ $entityIdLookup, /*GetOrCreate`1*/ $getterOrCreator) {
		/*
			at Roblox.Caching.LocalCache.GetEntityFromCacheByIDLookup[TIndex,TEntity,TDal](ICacheInfo cacheInfo, String entityIdLookup, Func`1 getter) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Caching\Roblox.Caching\RobloxCaches\LocalCache.cs:line 701
			at Roblox.Common.EntityHelper.GetOrCreateEntity[TIndex,TEntity,TDal](ICacheInfo cacheInfo, String entityIdLookup, GetOrCreate`1 getterOrCreator) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Data\Roblox.Data\Entities\EntityHelper.cs:line 0
		*/
	}
	
	static function DoGetOrCreate/*[TIndex,TDal,TEntity]*/(/*GetOrCreateDAL`1*/ $dalGetterOrCreater) {
		/*
			at Roblox.Platform.Throttling.Entities.NamespaceDAL.GetOrCreateNamespace(String value)
			at Roblox.Common.EntityHelper.DoGetOrCreate[TIndex,TDal,TEntity](GetOrCreateDAL`1 dalGetterOrCreater) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Data\Roblox.Data\Entities\EntityHelper.cs:line 316
		*/
	}
	
	static function SaveEntity($entity, $createCode, $updateCode) {
		
	}
	
	/*
	 * Got rid of IDTYPE template. It can be retrieved from the $entityIdLookup parameter.
	 * CLASSNAME template can be passed via a parameter as a string.
	 * BIZCLASSNAME is unnecessary.
	 */
	static function GetEntity/*<<IDTYPE>, <CLASSNAME>, <BIZCLASSNAME>>*/(/*ICacheInfo*/ $cacheInfo, /*String*/ $entityIdLookup, /*Get`1*/ $getter) {
		// Call the $getter function
		call_user_func($getter, $entityIdLookup);
	}
}

// EOF