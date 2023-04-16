<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/includes.php';
	
	http_response_code(404);
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo config::getName();?> | Page not found</title>
		<?php html::buildHead();?>
	</head>
	<body>
		<?php html::getNavigation();?>
		<div class="container">
			<h3>Page not found</h3>
			<p>The page you were looking for was not found on our servers.<br>If you believe this is on error, please contact us at <a href="mailto:support@gtoria.net">support@gtoria.net</a> describing your problem</p>
		</div>
		<?php html::buildFooter();?>
	</body>
</html>