<?php

// This file defines the Gatherer class.

namespace Roblox\Logging;

class Gatherer {
	//private const $logLocation = $_SERVER["DOCUMENT_ROOT"]."../Logging/Logs/";
	/*public $machineIp;
	public $timestamp = time();
	public $date = \DateTime::format("Y-m-d H:i:s");*/
	
	// Constructor
	function __construct() {
	}
	
	private static function buildLogFileLocation($shardType) {
		return $_SERVER["DOCUMENT_ROOT"]."../Logging/Logs/".$shardType."/";
	}
	
	private static function buildLogFileName($machineIp) {
		$date = new \DateTime();
		return $machineIp."_".$date->format("Y-m-d").".log";
	}
	
	private static function buildLogPath($machineIp, $shardType) {
		return Gatherer::buildLogFileLocation($shardType).Gatherer::buildLogFileName($machineIp);
	}
	
	private static function buildLogEntry($text) {
		$date = new \DateTime();
		return $date->format("h:i:s")." \n";
	}
	
	static function logEntry($shardType, $machineIp, $entry) {
		// ShardType check
		if ($shardType !== ShardType::Server) {
			$shardType = ShardType::Client;
		}
		$path = Gatherer::buildLogPath($machineIp, $shardType);
		file_put_contents($path, Gatherer::buildLogEntry($entry), FILE_APPEND);
	}
}

// EOF