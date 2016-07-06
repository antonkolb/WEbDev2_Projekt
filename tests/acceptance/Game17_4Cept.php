<?php 
$I = new AcceptanceTester($scenario);
$I->am('user');

$I->amGoingTo('to login and select game 4 on the main page');
$I->amOnPage('/');
$username = 'Frodo Beutlin';
$I->fillField('LoginForm[username]', $username);
$I->fillField('LoginForm[password]', '123456');
$I->click('login-button');
$I->expect('to be on the main page');
$I->see('Wähle eine Aufgabe aus!');
$I->click('Spiel 4');
$I->expect('to be in game 4');
$I->see('Zahlenreihen');

//==========================EIGENTLICHER TEST===================
//leere Felder
$I->wantTo('submit no answers');
$I->click('Korrigieren');
$I->expect('an error message');
$I->see('User Answers cannot be blank.');
/*
//Buchstaben statt Zahlen
$I->wantTo('submit non numerical answers');
for( $i=0; $i<$numEx; $i=$i+2 ){
	$game = ($i/2);
	$field = "Game17_2[userAnswers][".$game."]";
	$answer = 'NotANumber';
	$I->fillField( $field, $answer );
}
$I->click('Korrigieren');
$I->expect('an error message');
$I->see('User Answers must be an integer.');

//falsche Werte
$I->wantTo('submit only wrong answers');
$ex = $I->grabMultiple('.aufgabenstellung span');
$numEx = sizeof($ex);
$result ="";
for( $i=0; $i<$numEx; $i=$i+2 ){
	$game = ($i/2);
	$field = "Game17_2[userAnswers][".$game."]";
	$answer = $ex[$i]-$ex[$i+1];
	$correctAnswer = $ex[$i]+$ex[$i+1];
	$I->fillField( $field, $answer );
	$result .= "Nicht richtig: Peter hat dann ".$correctAnswer." Smartphone[s], nicht ".$answer. ".";
}
$I->click('Korrigieren');
$I->expect('check site with results');
$I->see($result);

//richtige Werte
$I->amGoingTo('to go direct to game 2');
$I->amOnPage('/frontend/web/main/game17_2');
$I->expect('to be in game 2');
$I->see('Textaufgaben');

$I->wantTo('submit correct answers');
$ex = $I->grabMultiple('.aufgabenstellung span');
$numEx = sizeof($ex);
$result ="";
for( $i=0; $i<$numEx; $i=$i+2 ){
	$game = ($i/2);
	$field = "Game17_2[userAnswers][".$game."]";
	$answer = $ex[$i]+$ex[$i+1];
	$correctAnswer = $ex[$i]+$ex[$i+1];
	$I->fillField( $field, $answer );
	$result .= "Richtig! Peter hat dann ".$correctAnswer." Smartphone[s].";
}
$I->click('Korrigieren');
$I->expect('check site with results');
$I->see($result);
//=========================ENDE======================
