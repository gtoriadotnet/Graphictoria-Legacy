<?php

// This file defines the Roblox.Entities.Mssql.RobloxDataAccessPatternExtensions class. Originally housed in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Entities\Roblox.Entities.Mssql\RobloxDataAccessPatternExtensions.cs.

namespace Roblox\Entities\Mssql;

class RobloxDataAccessPatternExtensions {
	
	function __construct() {
	}
	
	function GetOrCreate/*[TDal]*/(/*RobloxDatabase*/ $database, /*String*/ $storedProcedureName, /*Func`2*/ $dalBuilder, /*Nullable`1*/ $commandTimeout, /*Boolean*/ $includeApplicationIntent, /*SqlParameter[]*/ $queryParameters) {
		/*
			at Roblox.Mssql.Database.ExecuteReader(String commandText, SqlParameter[] sqlParameters, CommandType commandType, Nullable`1 commandTimeout, Nullable`1 applicationIntent) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Mssql\Roblox.Mssql\Database.cs:line 226
			at Roblox.Entities.Mssql.RobloxDataAccessPatternExtensions.GetOrCreate[TDal](RobloxDatabase database, String storedProcedureName, Func`2 dalBuilder, Nullable`1 commandTimeout, Boolean includeApplicationIntent, SqlParameter[] queryParameters) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Entities\Roblox.Entities.Mssql\RobloxDataAccessPatternExtensions.cs:line 51
		*/
	}
}

// EOF