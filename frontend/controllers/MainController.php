<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\AbstractController;
use frontend\models\main\Game17_1;
use frontend\models\main\Game17_2;
use frontend\models\main\Game17_3;
use frontend\models\main\Game17_4;
use frontend\models\main\AbstractGame;

class MainController extends AbstractController{

	//Nur zum Testen
	public function actionTest(){
		$model = new Game17_1();
		$model->initGame(1, 4);
		return $this->render('test', ['model' => $model]);
	}
	
	
	public function actionIndex(){
		return $this->render('index');
	}
	
    public function actionGame17_1() {
    	$name = "game17_1";
    	$createGame = function () {
    		$game = new Game17_1();
    		$game->initGame(1, 4);
    		return $game;
    	};
    	return $this->handleGameRequest($name, $createGame);
    }
	
    public function actionGame17_2() {	
    	$name = "game17_2";
		$createGame = function () {
			$game = new Game17_2();
			$game->initGame(1, 3);
			return $game;
		};
		return $this->handleGameRequest($name, $createGame);
    }
    
    public function actionGame17_3() {
    	$name = "game17_3";
    	$createGame = function () {
    		$game = new Game17_3();
    		$game->initGame(1, 3);
    		return $game;
    	};
    	return $this->handleGameRequest($name, $createGame);
    }
    
    public function actionGame17_4() {
    	$name = "game17_4";
    	$createGame = function () {
    		$game = new Game17_4();
    		$game->initGame(1, 4);
    		return $game;
    	};
    	return $this->handleGameRequest($name, $createGame);
    }
    
    /**
     * @param callable $createGame - Function that creates and inits a new game object.
     * @return string - Name of the needed view.
     */
    protected function handleGameRequest($name, callable $createGame) {
    	// back
    	if (isset($_POST['back'])){
    		return $this->goBack();
    	}
    	// answers
    	else if (isset($_POST['answers'])) {
    		// load stored game
    		$model = $this->loadGame($name);
    		// update game with user answers
    		$model->load(Yii::$app->request->post());
    		// validate
    		if ($model->validate()) {
    			// show answers page
    			return $this->render($name."_answers", ['model' => $model]);
    		} else {
    			// return same page so javascript can show validation errors
    			return $this->render($name, ['model' => $model]);
    		}
    	}
    	// new game
    	else {
    		$model = call_user_func($createGame);
    		$this->saveGame($name, $model);
    		return $this->render($name, ['model' => $model]);
    	}
    }
    
    /**
     * Store your game in session.
     * @param string $name - The name under which the game will be stored.
     * @param AbstractGame $object - The game to store.
     */
    protected function saveGame($name, AbstractGame $object) {
    	return Yii::$app->session[$name] = serialize($object);
    }
    
    /**
     * Load your Game from session.
     * @param $name - The name you used to store the game.
     * @return AbstractGame - The loaded game.
     */
    protected function loadGame($name) {
    	return unserialize(Yii::$app->session[$name]);
    }

	//wird vll gebraucht um die Spiele in db abzuspeichern
	private function saveGame17_1(){
	    $customer_record = new CustomerRecord();
        $customer_record->name = $customer->name;
        $customer_record->birth_date = $customer->birth_date->format('Y-m-d');
        $customer_record->notes = $customer->notes;
        $customer_record->save();
	}
	private function saveGame17_2(){
	}
	private function saveGame17_3(){
	}
	private function saveGame17_4(){
	}
}
