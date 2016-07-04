<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('check if all requirements are met');
$I->amOnPage('/frontend/web/requirements.php');
$I->see('Congratulations! Your server configuration satisfies all requirements.');
