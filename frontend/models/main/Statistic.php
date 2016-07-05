<?php

namespace frontend\models\main;

/**
 * Rechenaufgaben
 */
class Statistic extends Statistic {
	
	//Each variable needs to be put in a HiddenInputField so it will be taken over
	//Otherwise value gets reseted!
	
	




	public $number1=array(); //Summand 1
	public $number2=array(); //Summand 2
	public $sum=array(); //Summe
	public $correctAnswer=array(); //erwartete Antwort hier reinspeichern
	
	//set to true if user presses button to check answers; default is false
	public $commited = 'false';
	//set to true if user loads a game, default is false
	//not sure if useful
	public $started = 'false';
	
	//stuff for statistic, not used right now
	public $userAnswer=array();
	public $amountOfTries;
	public $elapsedTime;
	
    function initStatistic(){
	$statistic = new StatisticRecord();
                $id = '2';
                $gameKat = 'tt';
                $game = '1';
                $userAnswere = 'Tu';
                $amoutOfTries = new time();
                $elapsedTime = new time();

                makeStatistic($id, $gameKat, $game, $userAnswere, $amoutOfTries, $elapsedTime));
    }
    function initGame($level = 1, $numOfExercises = 1){
		
		//ruft ueberschriebene Elternmethode auf
		parent::initGame( $level, $numOfExercises  );	
		
		for( $i=1; $i<=$this->numEx; ++$i ){
			$calc = new Calculation(array(true, true), 10 * $this->level);
			$this->number1[$i] = $calc->getSummands()[0];
			$this->number2[$i] = $calc->getSummands()[1];
			$this->sum[$i] = $calc->getSum();
		}
		
		for( $i=1; $i<=$this->numEx; ++$i ){
			$this->correctAnswer[$i] = $this->sum[$i];
		}
	}
	
	/**
	 * Inherited from interface:
	 * Die verifyAnswers Methode muss die vom Nutzer eingegebenen
	 * Werte ueberpruefen
	 * @return Gibt Fehlerstring zurueck wenn Antworten inkorrekt, ansonsten leeren String
	 */
	function verifyAnswers(){
		//Interface Feedback
		$Ifeedback="";
	
		for( $i=1; $i<=$this->numEx; ++$i ){
			if( $this->userAnswer[$i] != $this->correctAnswer[$i] ){
				$Ifeedback = $Ifeedback . "Aufgabe " . $i . " inkorrekt. Richtige Antwort: " . $this->correctAnswer[$i] . " Deine Antwort: " . $this->userAnswer[$i] . "</br>";
			} else {}
		}
		return $Ifeedback;
	}
	
	/**
	 * wie verifyAnswers, nur mit Auflistung aller Aufgaben, besser fuer unsere zwecke
	 * @return Gibt Fehlerstring zurueck wenn Antworten inkorrekt, ansonsten leeren String
	 */
	function checkAnswers(){
	
		$feedback="";
	
		for( $i=1; $i<=$this->numEx; ++$i ){
			if( $this->userAnswer[$i] != $this->correctAnswer[$i] ){
				$feedback = $feedback . "Aufgabe " . $i . " inkorrekt. Richtige Antwort: " . $this->correctAnswer[$i] . " Deine Antwort: " . $this->userAnswer[$i] . "</br>";
			}else{
				$feedback = $feedback . "Aufgabe " . $i . " korrekt. Richtige Antwort: " . $this->correctAnswer[$i] . " Deine Antwort: " . $this->userAnswer[$i] . "</br>";
			}
		}
		return $feedback;
	}
	
	public function rules(){
	
		return [
				['number1', 'each', 'rule' => ['required']],
				['number2', 'each', 'rule' => ['required']],
				['sum', 'each', 'rule' => ['required']],
				['correctAnswer', 'each', 'rule' => ['required']],
				['userAnswer', 'each', 'rule' => ['required']],
	
				['numEx','required'],
				['level','required'],
	
				['number1', 'each', 'rule' => ['integer']],
				['number2', 'each', 'rule' => ['integer']],
				['sum', 'each', 'rule' => ['integer']],
				['correctAnswer', 'each', 'rule' => ['integer']],
				['userAnswer', 'each', 'rule' => ['integer']],
		];
	}
	
	//if a speicifc term should be displayed instead of name of variable
	//see http://stackoverflow.com/questions/28877702/yii2-how-to-add-custom-error-messages-on-input-fields
	public function attributeLabels(){
	
	}
}
