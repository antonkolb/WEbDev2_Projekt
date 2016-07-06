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

//==========================EIGENTLICHER TEST===================
//leere Felder
$I->wantTo('submit no answers');
$I->click('Korrigieren');
$I->expect('an error message');
$I->see('User Answer cannot be blank.');

//Buchstaben statt Zahlen
$I->wantTo('submit non numerical answers');
$ex = $I->grabMultiple('.aufgabenstellung span');
$numEx = sizeof($ex);
for( $i=0; $i<$numEx; $i=$i+2 ){
	$game = ($i/2+1);
	$field = "Game17_1[userAnswer][".$game."]";
	$answer = 'NotANumber';
	$I->fillField( $field, $answer );
}
$I->click('Korrigieren');
$I->expect('an error message');
$I->see('User Answer must be an integer.');

//falsche Werte
$I->wantTo('submit only wrong answers');
$ex = $I->grabMultiple('.aufgabenstellung span');
$numEx = sizeof($ex);
$result ="";
for( $i=0; $i<$numEx; $i=$i+2 ){
	$game = ($i/2+1);
	$field = "Game17_1[userAnswer][".$game."]";
	$answer = $ex[$i]-$ex[$i+1];
	$correctAnswer = $ex[$i]+$ex[$i+1];
	$I->fillField( $field, $answer );
	$result .= "Aufgabe ".$game." inkorrekt. Richtige Antwort: ".$correctAnswer." Deine Antwort: ".$answer;
}
$I->click('Korrigieren');
$I->expect('check site with results');
$I->see($result);
/*
//falsche + richtige Werte
$I->amGoingTo('to go direct to game 1');
$I->amOnPage('/frontend/web/main/game17_1');
$I->expect('to be in game 1');
$I->see('Einfache Rechenaufgaben');

$I->wantTo('submit partly correct answers');
$ex = $I->grabMultiple('.aufgabenstellung span');
$numEx = sizeof($ex);
$result ="";
for( $i=0; $i<$numEx; $i=$i+2 ){
	$game = ($i/2+1);
	$field = "Game17_1[userAnswer][".$game."]";
	$answer = $ex[$i]-$ex[$i+1];
	$correctAnswer = $ex[$i]+$ex[$i+1];
	$I->fillField( $field, $answer );
	$result .= "Aufgabe ".$game." inkorrekt. Richtige Antwort: ".$correctAnswer." Deine Antwort: ".$answer;
}
$I->click('Korrigieren');
$I->expect('check site with results');
$I->see('User Answer cannot be blank.');
*/
//richtige Werte
$I->amGoingTo('to go direct to game 1');
$I->amOnPage('/frontend/web/main/game17_1');
$I->expect('to be in game 1');
$I->see('Einfache Rechenaufgaben');

$I->wantTo('submit correct answers');
$ex = $I->grabMultiple('.aufgabenstellung span');
$numEx = sizeof($ex);
$result ="";
for( $i=0; $i<$numEx; $i=$i+2 ){
	$game = ($i/2+1);
	$field = "Game17_1[userAnswer][".$game."]";
	$answer = $ex[$i]+$ex[$i+1];
	$correctAnswer = $ex[$i]+$ex[$i+1];
	$I->fillField( $field, $answer );
	$result .= "Aufgabe ".$game." korrekt. Richtige Antwort: ".$correctAnswer." Deine Antwort: ".$answer;
}
$I->click('Korrigieren');
$I->expect('check site with results');
$I->see($result);
//=========================ENDE======================
