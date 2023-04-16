<?php
	exit('disabled');
	if (!isset($_GET['key'])) exit;
	if ($_GET['key'] != "894cfcdf-7714-4fea-a3f1-436d711a462b") exit;
	
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}
	echo $_SERVER['REMOTE_ADDR'];
?>