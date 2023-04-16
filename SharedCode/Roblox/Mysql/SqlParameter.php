<?php

// This file defines the SqlParameter class.

namespace Roblox\Mysql;

class SqlParameter {
	public $name;
	public $value = null;
	public $type = "NULL";

	// Initializes a new instance of the SqlParameter class that uses the parameter name and a value of the new SqlParameter.
	function __construct($name, $value) { // SqlParameter(String, Object)
		$this->name = $name;
		$this->type = Helpers\ParameterHelper::getSqlType(gettype($value));
		$this->value = Helpers\ParameterHelper::getSqlValue($value);
	}
}

// EOF