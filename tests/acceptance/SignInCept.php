<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('go to Login form');
$I->amOnPage('/');
$I->see('Please fill out the following fields to login:');

$I->wantTo('sign in with false login data');
$I->fillField('LoginForm[username]', 'test');
$I->fillField('LoginForm[password]', '1234');
$I->click('login-button');
$I->see('Incorrect username or password.');

$I->wantTo('sign in with empty login data');
$I->click('login-button');
$I->see('Username cannot be blank.');
$I->see('Password cannot be blank.');

$I->wantTo('sign in with correct login data');
$username = 'Frodo Beutlin';
$I->fillField('LoginForm[username]', $username);
$I->fillField('LoginForm[password]', '123456');
$I->click('login-button');
$I->see('Wähle eine Aufgabe aus!');

$I->wantTo('log out');
$I->click('Logout ('.$username.')', '.wrap');
$I->see('Please fill out the following fields to login:');
