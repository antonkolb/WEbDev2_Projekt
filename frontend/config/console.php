<?php

return [
	'id' => 'crm-console',
	'basePath' => dirname(__DIR__),
	'components' => [
		'db' => require(__DIR__.'/db.php'),
	],
];
