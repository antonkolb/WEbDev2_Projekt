<?php

namespace frontend\controllers;

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
    public function actionAufgabe1()
    {
        //return $this->render('aufgabe1');

        $model = new Game17_1();
	$model->initGame(1, 8);
        return $this->render('aufgabe1', ['model' => $model]);
    
    }

    /**
     *
     *
     * @return view der Aufgabe
     */
    public function actionAufgabe2()
    {
        //return $this->render('aufgabe2');
	return "Aufgabe 2";
    }

    /**
     *
     *
     * @return view der Aufgabe
     */
    public function actionAufgabe3()
    {
        //return $this->render('aufgabe3');
	return "Aufgabe 3";
    }

    /**
     *
     *
     * @return view der Aufgabe
     */
    public function actionAufgabe4()
    {
        //return $this->render('aufgabe4');
	return "Aufgabe 4";
    }
}
