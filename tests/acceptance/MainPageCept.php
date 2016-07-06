<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('to login and see the main page');
$I->amOnPage('/');
$username = 'Frodo Beutlin';
$I->fillField('LoginForm[username]', $username);
$I->fillField('LoginForm[password]', '123456');
$I->click('login-button');
$I->see('Wähle eine Aufgabe aus!');

//go to a game and use the logo button
$I->wantTo('go to game 1');
$I->click('Spiel 1');
$I->see('Einfache Rechenaufgaben');

$I->wantTo('go back from game 1');
$I->click('Rechnen und Denken');
$I->see('Wähle eine Aufgabe aus!');
//================================
$I->wantTo('go to game 2');
$I->click('Spiel 2');
$I->see('Textaufgaben');

$I->wantTo('go back from game 2');
$I->click('Rechnen und Denken');
$I->see('Wähle eine Aufgabe aus!');
//================================
$I->wantTo('go to game 3');
$I->click('Spiel 3');
$I->see('Zahlenmauern');

$I->wantTo('go back from game 3');
$I->click('Rechnen und Denken');
$I->see('Wähle eine Aufgabe aus!');
//================================
$I->wantTo('go to game 4');
$I->click('Spiel 4');
$I->see('Zahlenreihen');

$I->wantTo('go back from game 4');
$I->click('Rechnen und Denken');
$I->see('Wähle eine Aufgabe aus!');
//================================

//go to a game and use the back button
//not working
$I->wantTo('go to game 1');
$I->click('Spiel 1');
$I->see('Einfache Rechenaufgaben');

$I->wantTo('go back from game 1');
$I->click('button[name="back"]');
$I->see('Wähle eine Aufgabe aus!');
//================================
$I->wantTo('go to game 2');
$I->click('Spiel 2');
$I->see('Textaufgaben');

$I->wantTo('go back from game 2');
$I->click('back');
$I->see('Wähle eine Aufgabe aus!');
//================================
$I->wantTo('go to game 3');
$I->click('Spiel 3');
$I->see('Zahlenmauern');

$I->wantTo('go back from game 3');
$I->click('back');
$I->see('Wähle eine Aufgabe aus!');
//================================
$I->wantTo('go to game 4');
$I->click('Spiel 4');
$I->see('Zahlenreihen');

$I->wantTo('go back from game 4');
$I->click('back');
$I->see('Wähle eine Aufgabe aus!');
//================================
