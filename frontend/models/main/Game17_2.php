<?php

namespace frontend\models\main;

use InvalidArgumentException;

/**
 * Textaufgaben
 */
class Game17_2 extends AbstractGame {

	// maximum number the kids need to have in their head while solving
	protected $maxNumPerLevel = array(10, 15, 20);
	// wether summands are positive or negative
	protected $summandSignPerLevel = array(
			array(true, true), // x + y
			array(true, false), // x - y
			array(true, false, true) // x - y + z
	);
	
	// calcs needed for verification
	protected $calcs;
	
	// text displyed as exercise
	public $calcTexts = array();
	
	// user answers will be in here after submit
	public $userAnswers = array();
	
	/**
	 * {@inheritDoc}
	 * @see \frontend\models\main\AbstractGame::initGame()
	 */
    public function initGame($level = 1, $numOfExercises = 3) {
    	parent::initGame($level, $numOfExercises);
    	$calcs = $this->initCalculations($this->level, $this->numEx);
    	$this->calcs = $calcs;
    	$this->calcTexts = array();
    	foreach ($calcs as $calc) {
    		$text = $this->createText($this->level, $calc);
    		array_push($this->calcTexts, $text);
    	}
	}
	
	protected function initCalculations($level, $numOfExercises) {
		$calcs = array();
		for($i = 0; $i < $numOfExercises; $i++) {
			$trys = 0;
			// create calculcations until we have one which we don't have already
			while(true) {
				$trys++;
				$isDifferent = true;
				$calc = $this->createCalc($level);
				// compare with previous calculations
				for($j = 0; $j < $i; $j++) {
					if ($calcs[$j] == $calc) {
						$isDifferent = false;
						break;
					}
				}
				if($isDifferent) {
					// yay, the calculation is unique, so add it
					array_push($calcs, $calc);
					break;
				} else if ($trys > 10 * $numOfExercises) {
					throw new InvalidArgumentException("Too many exercises to make every exercise unique!");
				}
			}
		}
		return $calcs;
	}
	
	protected function createCalc($level) {
		$maxNumber = $this->maxNumPerLevel[$level - 1];
		$summandsIsPositive = $this->summandSignPerLevel[$level - 1];
		return new Calculation($summandsIsPositive, $maxNumber);
	}
	
	protected function createText($level, Calculation $calc) {
		$summands = $calc->getSummands();
		switch ($level) {
		case 1:
			return "Peter hat <span>$summands[0]</span> Smartphone[s]. Sein Vater schenkt ihm "
					."<span>$summands[1]</span> weitere[s]. Wie viele Smartphones hat Peter danach?";
		case 2:
			return "Anja hat <span>$summands[0]</span> Freund[e] auf Facebook. Mit der Zeit verliert sie "
					."<span>$summands[1]</span> Freund[e]. Wie viele hat sie danach noch?";
		case 3;
			return "Klein Kevin hat in der Schule <span>$summands[0]</span> Buchstabe[n] gelernt. Beim Zocken "
					."vergisst er jedoch wieder <span>$summands[1]</span> Buchstabe[n]. Am nächsten Tag lernt "
					."er <span>$summands[2]</span> komplett neue[n] Buchstaben. Wie viele Buchstaben kann "
					."Klein Kevin dann?";
		default:
			throw new InvalidArgumentException("This game supports only level 1-3!");
		}
	}
	
	/**
	 * {@inheritDoc}
	 * @see \frontend\models\main\IBasicGame::verifyAnswers()
	 */
	public function verifyAnswers(){
		$feedback = "";
		for ($i = 0; $i < $this->numEx; $i++) {
			$userSum = $this->userAnswers[$i];
			$calc = $this->calcs[$i];
			$feedback .= $this->verifyAnswer($userSum, $calc, $this->level);
		}
		return $feedback;
	}
	
	protected function verifyAnswer($userSum, Calculation $calc, $level) {
		$correctSum = $calc->getSum();
		if($correctSum == $userSum) {
			switch($level) {
				case 1: return "Richtig! Peter hat dann $correctSum Smartphone[s].<br>";
				case 2: return "Richtig! Anja hat dann $correctSum Fake-Freund[e].<br>";
				case 3: return "Richtig! Klein Kevin kann dann immerhin $correctSum Buchstaben.<br>";
				default: throw new InvalidArgumentException("This game supports only level 1-3!");
			}
		} else {
			$diff = abs($correctSum - $userSum);
			$notCorrect = $diff == 1 ? "Fast richtig" : "Nicht richtig";
			switch($level) {
				case 1: return "$notCorrect: Peter hat dann $correctSum Smartphone[s], nicht "
							."$userSum.<br>";
				case 2: return "$notCorrect: Anja hat dann $correctSum Fake-Freund[e], nicht "
							."$userSum.<br>";
				case 3: return "$notCorrect: Klein Kevin kann dann $correctSum Buchstaben, nicht "
							."$userSum.<br>";
				default: throw new InvalidArgumentException("This game supports only level 1-3!");
			}
		}
	}
	
	public function rules() {
		return [
				['userAnswers', 'each', 'rule' => ['required']],
				['userAnswers', 'each', 'rule' => ['integer']]
		];
	}
}
