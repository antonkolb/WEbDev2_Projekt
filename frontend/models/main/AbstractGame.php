<?php

namespace frontend\models\main;

/**
 *
 */

use Yii;
use yii\base\Model;

abstract class AbstractGame extends Model implements IBasicGame {
   
	//Each variable needs to be put in a HiddenInputField so it will be taken over
	//Otherwise value gets reseted!
 
	public $numEx; //numberOfExercises;
	public $difficulty; //schwierigkeitsgrad, Level	

	public $number1; //Summand 1
	public $number2; //Summand 2
	public $sum; //Summe
	public $correctAnswer; //erwartete Antwort hier reinspeichern
	
	//set to true if user presses button to check answers; default is false
	public $commited = 'false';
	//set to true if user loads a game, default is false
	//not sure if useful
	public $started = 'false';

	//stuff for statistic, not used right now
	public $userAnswer;
	public $amountOfTries;
	public $elapsedTime;

    /**
	 * Inherited from Interface:
     * Die initGame Methode kuemmert sich um die Vorbereitung des Spieles,
     * zum Beispiel Vorbelegung der Werte
     */
    function initGame($level = 1, $numOfExercises = 1){

		$this->numEx = $numOfExercises; 
		$this->difficulty = $level; //voerst sinnlos, nur damit es gespeichert ist

		for( $i=1; $i<=$this->numEx; ++$i ){
			$this->sum[$i] = rand(2, 10*$this->difficulty); //lazy
			$this->number1[$i] = rand( 1, $this->sum[$i]-1 ); //keine Rechnungen mit 0
			$this->number2[$i] = $this->sum[$i] - $this->number1[$i];

			/*Rest in den jeweiligen GameKlassen bestimmen:
			Welcher der Zahlen soll die Loesung sein?
			z.B. Minusuaufgabe: sum-numb1 = numb2; correctAnswer = num2;
			*/
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
			}else{
				//nothing
			}

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
	
	//wird vll gebraucht um die Spiele in db abzuspeichern
	function save(){

	}

    public function rules()
    {
      return [
		['number1', 'each', 'rule' => ['required']],
		['number2', 'each', 'rule' => ['required']],
		['sum', 'each', 'rule' => ['required']],
		['correctAnswer', 'each', 'rule' => ['required']],
		['userAnswer', 'each', 'rule' => ['required']],
/*
		['number1', 'each', 'rule' => ['integer']],
		['number2', 'each', 'rule' => ['integer']],
		['sum', 'each', 'rule' => ['integer']],
		['correctAnswer', 'each', 'rule' => ['integer']],
		['userAnswer', 'each', 'rule' => ['integer']],
   */     ];
    }
	
	//if a speicifc term should be displayed instead of name of variable
	//see http://stackoverflow.com/questions/28877702/yii2-how-to-add-custom-error-messages-on-input-fields
	public function attributeLabels(){
		
	}
}

