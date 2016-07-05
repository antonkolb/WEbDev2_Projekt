<?php 
$I = new AcceptanceTester($scenario);
$I->am('user');
$I->amGoingTo('to login and select game 1 on the main page');
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
$I->wantTo('submit no answers');
$I->click('Korrigieren');
$I->see('User Answer cannot be blank.');



//$I->fillField('Game17_1[userAnswer][1]', 'test');
