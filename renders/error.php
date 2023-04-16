<?php

$errors = [
	'500' => 'InternalServerError',
	'404' => 'NotFound',
	'403' => 'AccessDenied',
	'400' => 'BadRequest'
];

if(http_response_code() == 200)
	http_response_code(404);

header('Content-Type: application/json');

exit(
	json_encode(
		[
			'Errors' => [
				$errors[http_response_code()]
			]
		]
	)
);