<?php

namespace frontend\models\main;

/**
 *
 */

use Yii;
use yii\base\Model;

abstract class AbstractGame extends Model implements IBasicGame {
    
	public $numEx; //numberOfExercises;
	public $difficulty; //schwierigkeitsgrad, Level	

	public $number1; //Summand 1
	public $number2; //Summand 2
	public $sum; //Summe
	public $correctAnswer; //erwartete Antwort hier reinspeichern
	
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

		for( $i=0; $i<$this->numEx; ++$i ){
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

		$feedback="";	
	
		for( $i=0; $i<$this->numEx; ++$i ){
			if( $this->userAnswer[$i] != $this->correctAnswer[$i] ){
				$feedback = $feedback + "Aufgabe " + $i + " inkorrekt. Richtige Antwort: " + $this->correctAnwer[$i] + " Deine Antwort: " + $userAnswer[$i] + "</br>";
			}else{
				//nothing
			}

		}
		
		return $feedback;
	
	}

    public function rules()
    {
      return [
		['number1', 'each', 'rule' => ['required']],
		['number2', 'each', 'rule' => ['required']],
		['sum', 'each', 'rule' => ['required']],
		['correctAnswer', 'each', 'rule' => ['required']],
		['userAnswer', 'each', 'rule' => ['required']],
        ];
    }
}

