<?php

// This file defines the Roblox.Mssql.Database class. Originally housed in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Mssql\Roblox.Mssql\Database.cs.

namespace Roblox\Mssql;

class Database {
	
	function __construct() {
	}
	
	function ExecuteReader(/*String*/ $commandText, /*SqlParameter[]*/ $sqlParameters, /*CommandType*/ $commandType, /*Nullable`1*/ $commandTimeout, /*Nullable`1*/ $applicationIntent) {
		/*
			at Roblox.Mssql.GuardedDatabase.Execute(CommandType commandType, String commandText, SqlParameter[] sqlParameters, Action`1 action, Nullable`1 commandTimeout, Nullable`1 applicationIntent) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Mssql\Roblox.Mssql\GuardedDatabase.cs:line 22
			at Roblox.Mssql.Database.ExecuteReader(String commandText, SqlParameter[] sqlParameters, CommandType commandType, Nullable`1 commandTimeout, Nullable`1 applicationIntent) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Mssql\Roblox.Mssql\Database.cs:line 226
		*/
	}
	
	function Execute(/*CommandType*/ $commandType, /*String*/ $commandText, /*SqlParameter[]*/ $sqlParameters, /*Action`1*/ $action, /*Nullable`1*/ $commandTimeout, /*(Nullable`1*/ $applicationIntent) {
		/*
			at System.Data.SqlClient.SqlConnection.PermissionDemand()
			at System.Data.SqlClient.SqlConnectionFactory.PermissionDemand(DbConnection outerConnection)
			at System.Data.ProviderBase.DbConnectionInternal.TryOpenConnectionInternal(DbConnection outerConnection, DbConnectionFactory connectionFactory, TaskCompletionSource`1 retry, DbConnectionOptions userOptions)
			at System.Data.SqlClient.SqlConnection.TryOpenInner(TaskCompletionSource`1 retry)
			at System.Data.SqlClient.SqlConnection.TryOpen(TaskCompletionSource`1 retry)
			at System.Data.SqlClient.SqlConnection.Open()
			at Roblox.Mssql.Database.Execute(CommandType commandType, String commandText, SqlParameter[] sqlParameters, Action`1 action, Nullable`1 commandTimeout, Nullable`1 applicationIntent) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Mssql\Roblox.Mssql\Database.cs:line 105
		*/
	}
}

// EOF