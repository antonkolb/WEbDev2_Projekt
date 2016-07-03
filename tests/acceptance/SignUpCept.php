<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('go to Sign Up form');
$I->amOnPage('/');
$I->see('Please fill out the following fields to login:');
$I->click('Signup', '.wrap');
$I->see('Please fill out the following fields to signup:');

$I->wantTo('sign up with incorrect data');
$I->fillField('SignupForm[username]', 'test');
$I->fillField('SignupForm[email]', 'abcd');
$I->fillField('SignupForm[password]', '1234');
$I->click('signup-button');
$I->see('Email is not a valid email address.');
$I->see('Password should contain at least 6 characters.');

$I->wantTo('sign up with taken email');
$I->fillField('SignupForm[username]', 'Samweis Gamdschie');
$I->fillField('SignupForm[email]', 'frodo@hobbiton.me');
$I->fillField('SignupForm[password]', '123456');
$I->click('signup-button');
$I->see('This email address has already been taken.');

$I->wantTo('sign up with taken username');
$I->fillField('SignupForm[username]', 'Frodo Beutlin');
$I->fillField('SignupForm[email]', 'sam@hobbiton.me');
$I->fillField('SignupForm[password]', '123456');
$I->click('signup-button');
$I->see('This username has already been taken.');

$I->wantTo('sign up with new data');
$ranNum = rand(0, 1000);
$I->fillField('SignupForm[username]', 'User'.$ranNum);
$I->fillField('SignupForm[email]', 'user'.$ranNum.'@email.com');
$I->fillField('SignupForm[password]', '123456');
$I->click('signup-button');
$I->see('Wähle eine Aufgabe aus!');
