<?php

namespace app\models\main;

/**
 *
 */

abstract class AbstractGame implements IBasicGame {
    
	private $numEx; //numberOfExercises;
	private $difficulty; //schwierigkeitsgrad, Level	

	private $number1; //Summand 1
	private $number2; //Summand 2
	private $sum; //Summe
	private $correctAnswer; //erwartete Antwort hier reinspeichern
	
	//stuff for statistic, not used right now
	private $userAnswer;
	private $amountOfTries;
	private $elapsedTime;

    /**
	 * Inherited from Interface:
     * Die initGame Methode kuemmert sich um die Vorbereitung des Spieles,
     * zum Beispiel Vorbelegung der Werte
     */
    function initGame($level = 1, $numEx = 1){

		$this->$numEx = $numEx;
		$this->$difficulty = $difficulty; //voerst sinnlos, nur damit es gespeichert ist

		for( $i=0; $i<$numEx; ++$i ){
			$sum[$i] = rand(2, 10*$level); //lazy
			$number1[$i] = rand( 1, $sum[$i]-1 ); //keine Rechnungen mit 0
			$number2[$i] = $sum - $number1;

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
	
		for( $i=0; $i<$numEx; ++$i ){
			if( $userAnswer[$i] != $correctAnswer[$i] ){
				$feedback = $feedback + "Aufgabe " + $i + " inkorrekt. Richtige Antwort: " + $correctAnwer[$i] + " Deine Antwort: " + $userAnswer[$i] + "</br>";
			}else{
				//nothing
			}

		}
		
		return $feedback;
	
	}
}

