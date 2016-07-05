<?php 
$I = new AcceptanceTester($scenario);
$I->mGoingTo('to login and select game 1 on the main page');
$I->amOnPage('/');
$username = 'Frodo Beutlin';
$I->fillField('LoginForm[username]', $username);
$I->fillField('LoginForm[password]', '123456');
$I->click('login-button');
$I->expect('to be on the main page');
$I->see('Wähle eine Aufgabe aus!');
$I->click('Spiel 1');
$I->expect('to be in game 1');
$I->see('Einfache Rechenaufgaben');

//eigentlicher test
$I->wantTo('submit submit no answers');
$I->fillField('SignupForm[username]', 'test');
$I->click('check');
$I->see('User Answer cannot be blank.');
