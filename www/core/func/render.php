<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';

	class render {
		public static function render($id, $type, $pose, $hasgear) {
			$fp = fsockopen('render-service.gtoria.net', 80, $errno, $errstr, 30);

			$out = "GET /v1/contact?itemid=" . $id . "&type=" . $type . (isset($pose) ? "&pose=" . $pose : "") . (isset($hasgear) ? "&hasgear=" . $hasgear : "") . " HTTP/1.1\r\n";
			$out.= "Host: render-service.gtoria.net\r\n";
			$out.= "Content-Type: application/x-www-form-urlencoded\r\n";
			$out.= "AccessKey: 39582a15-ec91-478b-b776-3089586d6b12\r\n";
			$out.= "Connection: Close\r\n\r\n";

			fwrite($fp, $out);
			fclose($fp);
		}
	}
?>