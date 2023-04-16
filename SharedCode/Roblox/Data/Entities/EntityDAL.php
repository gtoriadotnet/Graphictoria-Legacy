<?php
namespace Roblox\Data\Entities;

// http://web.archive.org/web/20140610202425id_/http://broom.gametest1.robloxlabs.com/Legacy/DBWireup/DAL.txt

abstract class EntityDAL {
	public $ID;
	
	function __construct() {
	}
	
	function Delete() {
		if (!isset($ID)) {
			throw new \Exception("Required value not specified: ID.");
		}
		$queryParameters = [
			new \Roblox\Mysql\SqlParameter("@ID", $ID)
		];

		$dbInfo = new dbInfo(
			<CONNECTIONSTRING>, // the string used to connect to the DB
			"<DELETEPROCEDURE>", // the name of the procedure
			$queryParameters // the parameters used in the procedure defenition
		);

		\Roblox\Common\EntityHelper::DoEntityDALDelete($dbInfo);
	}
	function Insert() {
		throw new \Exception(__CLASS__ . "->Insert() not implemented");
	}
	function Update() {
		throw new \Exception(__CLASS__ . "->Update() not implemented");
	}
	static function Get($id) {
		throw new \Exception(__CLASS__ . "->Get() not implemented");
	}
}

// EOF