<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\AbstractController;
use frontend\models\main\Game17_1;
use frontend\models\main\Game17_2;
use frontend\models\main\Calculation;
use frontend\models\main\IBasicGame;
use frontend\models\main\AbstractGame;

class MainController extends AbstractController{

	public function actionIndex(){
		return $this->render('index'); 
	}


    /**
     *
     *
     * @return view der Aufgabe
     */
    public function actionGame17_1()
    {

        $model;

		//insert: check if game is already in DB
		//if game was started, read game from db
		//if answers were commited redirect to check view
		//else

		if(false /*game is in db*/ ){
		// $model = ...
		}else{
       	 	$model = new Game17_1();
			$model->initGame(1, 4);
		}
        
		//pressed Back Button?
		if (isset($_POST['back'])){
            return $this->goBack();
		}
		//pressed Check Button AND each field is valid?
		else if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$model->commited = 'true';
			return $this->render ( 'game17_1_check', ['model' => $model] );
		}
		//already pressed check once? NOT WORKING
		else if ( $model->commited == 'true' ){
			return "commited";
		}
		//render the game site
		else{
	        return $this->render('game17_1', ['model' => $model]);
		}
    
    }
	
	//Nur zum Testen
    public function actionTest(){
        $model = new Game17_1();
		$model->initGame(1, 4);
		return $this->render('test', ['model' => $model]);
	}
    publci function debTest(){
	$statistic = new StatisticHaendler();
		$statistic->makeStatistic();
		
	}
	
    /**
     * @return string - View der Aufgabe
     */
    public function actionGame17_2() {	
    	$name = "game17_2";
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
			$model = new Game17_2();
			$model->initGame(1, 3);
			$this->saveGame($name, $model);
			return $this->render($name, ['model' => $model]);
		}
    }
    
    /**
     * Store your game in session.
     * @param string $name - The name under which the game will be stored.
     * @param AbstractGame $object - The game to store.
     */
    public function saveGame($name, AbstractGame $object) {
    	return Yii::$app->session[$name] = serialize($object);
    }
    
    /**
     * Load your Game from session.
     * @param $name - The name you used to store the game.
     * @return AbstractGame - The loaded game.
     */
    public function loadGame($name) {
    	return unserialize(Yii::$app->session[$name]);
    }

    /**
     *
     *
     * @return view der Aufgabe
     */
    public function actionGame17_3()
    {
		$model = new Game17_1();
		$model->initGame(1, 4);
		
		if (isset($_POST['back'])){
			return $this->goBack();
		}
		//pressed Check Button AND each field is valid?
		else if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$model->commited = 'true';
			return $this->render ( 'game17_3_check', ['model' => $model] );
		}
		//already pressed check once? NOT WORKING
		else if ( $model->commited == 'true' ){
			return "commited";
		}
		//render the game site
		else{
			return $this->render('game17_3', ['model' => $model]);
		}
    }

    /**
     *
     *
     * @return view der Aufgabe
     */
    public function actionGame17_4()
    {
		$model = new Game17_1();
		$model->initGame(1, 4);
		
		if (isset($_POST['back'])){
			return $this->goBack();
		}
		//pressed Check Button AND each field is valid?
		else if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$model->commited = 'true';
			return $this->render ( 'game17_4_check', ['model' => $model] );
		}
		//already pressed check once? NOT WORKING
		else if ( $model->commited == 'true' ){
			return "commited";
		}
		//render the game site
		else{
			return $this->render('game17_4', ['model' => $model]);
		}
    }

	//wird vll gebraucht um die Spiele in db abzuspeichern
	private function saveGame17_1(){
	$customer_record = new CustomerRecord();
                $customer_record->name = $customer->name;
                $customer_record->birth_date = $customer->birth_date->format('Y-
m-d');
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
