<?php
// You can find the keys here : https://www.billplz.com/api/
return [
	'BILLPLZ_API_URL'             => 'https://www.billplz.com/api',
	'BILLPLZ_API_VERSION'         => function_exists('env') ? env('BILLPLZ_API_VERSION', 'v3') : 'v3',
	'BILLPLZ_USE_SSL'             => true,
	'BILLPLZ_API_KEY'     		  => function_exists('env') ? env('BILLPLZ_API_KEY', '') : '',
];