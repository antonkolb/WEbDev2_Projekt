<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=team-17',
            'username' => 'team-17',
            'password' => 'qWqqsG8VCXmN3ZaL',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false, //von true zu false gesetzt
	    //akolb's Code, siehe Yii2-2-S10
	    /*'transport' => [
		'class' => 'Swift_SmtpTransport',
		'constructArgs' => ['localhost', 25]
	    ]*/
        ],
    ],
];
