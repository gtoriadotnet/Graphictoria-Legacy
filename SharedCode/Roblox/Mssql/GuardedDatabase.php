<?php

// This file defines the Roblox.Mssql.GuardedDatabase class. Originally housed in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Mssql\Roblox.Mssql\GuardedDatabase.cs.
// Also has Roblox.Mssql.GuardedDatabase.<>c__DisplayClass2_0.<Execute>b__0() in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Mssql\Roblox.Mssql\GuardedDatabase.cs:line 21.

namespace Roblox\Mssql;

class GuardedDatabase {
	
	function __construct() {
	}
	
	function Execute(/*CommandType*/ $commandType, /*String*/ $commandText, /*SqlParameter[]*/ $sqlParameters, /*Action`1*/ $action, /*Nullable`1*/ $commandTimeout, /*Nullable`1*/ $applicationIntent) {
		/*
			at Roblox.Sentinels.ExecutionCircuitBreakerBase.Execute(Action action)
			at Roblox.Mssql.GuardedDatabase.Execute(CommandType commandType, String commandText, SqlParameter[] sqlParameters, Action`1 action, Nullable`1 commandTimeout, Nullable`1 applicationIntent) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Mssql\Roblox.Mssql\GuardedDatabase.cs:line 22
		*/
	}
}

// EOF