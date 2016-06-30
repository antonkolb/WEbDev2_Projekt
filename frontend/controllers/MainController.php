<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\AbstractController;
use frontend\models\main\Game17_1;

class MainController extends AbstractController{

	public function actionIndex(){
		return $this->render('index'); 
	}
	public function actionAdd(){
		return 'You are on page customer -> add new';
	}


    /**
     *
     *
     * @return view der Aufgabe
     */
    public function actionGame17_1()
    {
        //return $this->render('aufgabe1');


        $model = new Game17_1();

		$model->initGame(1, 8);
        //if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	if (isset($_POST['back'])){
            return $this->goBack();
	}
	else if ($model->load(Yii::$app->request->post()) && $model->validate()) {
		$model->verifyAnswers();
		return $this->render ( 'game17_1_check', ['model' => $model] );
	}
	else{
	        return $this->render('game17_1', ['model' => $model]);
	}
    
    }

    /**
     *
     *
     * @return view der Aufgabe
     */
    public function actionGame17_2()
    {
        //return $this->render('aufgabe2');
	return "Aufgabe 2";
    }

    /**
     *
     *
     * @return view der Aufgabe
     */
    public function actionGame17_3()
    {
        //return $this->render('aufgabe3');
	return "Aufgabe 3";
    }

    /**
     *
     *
     * @return view der Aufgabe
     */
    public function actionGame17_4()
    {
        //return $this->render('aufgabe4');
	return "Aufgabe 4";
    }
}
