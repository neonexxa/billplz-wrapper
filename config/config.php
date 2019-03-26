<?php
// You can find the keys here : https://www.billplz.com/api/
return [
	'debug'               => function_exists('env') ? env('APP_DEBUG', false) : false,
	'API_URL'             => 'https://www.billplz.com/api',
	'API_VERSION'         => function_exists('env') ? env('BILLPLZ_API_VERSION', 'v3') : 'v3',
	'USE_SSL'             => true,
	'API_KEY'     		  => function_exists('env') ? env('BILLPLZ_API_KEY', '') : '',
];