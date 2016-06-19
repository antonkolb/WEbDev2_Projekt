<?php

namespace frontend\controllers;

use frontend\controllers\AbstractController;

class MainController extends AbstractController{

	public function actionIndex(){
		return 'You are on page customer -> index';
	}
	public function actionAdd(){
		return 'You are on page customer -> add new';
	}




}
