<?php

// This file defines the Roblox.Sentinels.ExecutionCircuitBreakerBase class.

namespace Roblox\Sentinels;

class ExecutionCircuitBreakerBase {
	
	function __construct() {
	}
	
	function Execute(/*Action*/ $action) {
		/*
			at Roblox.Mssql.Database.Execute(CommandType commandType, String commandText, SqlParameter[] sqlParameters, Action`1 action, Nullable`1 commandTimeout, Nullable`1 applicationIntent) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Mssql\Roblox.Mssql\Database.cs:line 105
			at Roblox.Mssql.GuardedDatabase.&lt;&gt;c__DisplayClass2_0.&lt;Execute&gt;b__0() in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Mssql\Roblox.Mssql\GuardedDatabase.cs:line 21
			at Roblox.Sentinels.ExecutionCircuitBreakerBase.Execute(Action action)
		*/
	}
}

// EOF