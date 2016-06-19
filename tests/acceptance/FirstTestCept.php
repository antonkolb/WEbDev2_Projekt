<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('see if frontend is reachable');
$I->amOnPage('/');
$I->see('Congratulations');
