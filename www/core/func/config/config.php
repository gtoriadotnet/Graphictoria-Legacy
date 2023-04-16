<?php
	// This file contains all configuration.
	class config {
		public static function getName() {
			return "Graphictoria";
		}
		
		public static function getDatabaseConfiguration() {
			include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/config/db.php';
		}
	}
?>
