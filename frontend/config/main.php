<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        //de-commented
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
           // 'rules' => [
           // ], //commented
        ],
        //de-commented
	'request' => [
	// secret key required by cookie validation
		'cookieValidationKey' => 'x0XXz0PTdftJl5K1Qv3hGRmj2',
	],
	'db' => require(__DIR__.'/db.php'),
    ],
    'params' => $params,
];
