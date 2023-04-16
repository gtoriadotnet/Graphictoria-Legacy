<?php

// This file defines the ParameterHelper class.

namespace Roblox\Mysql\Helpers;

class ParameterHelper {
	private static $phpToSqlType => [
		"boolean" => "i",
		"integer" => "i",
		"double" => "d",
		"string" => "s"
	];

	static function getSqlType($type) {
		if (isset($phpToSqlType[$type])) {
			return $phpToSqlType[$type];
		} else {
			throw new \Exception('Type "'.$type.'" not supported');
		}
	}

	static function getSqlValue($value) {
		if (gettype($value) == "boolean") {
			// Cast bool to int for storage via SQL
			$value = (int)$value
		}
		return $value;
	}
}

// EOF