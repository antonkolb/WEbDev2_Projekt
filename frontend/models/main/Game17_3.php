<?php

namespace frontend\models\main;

use InvalidArgumentException;

/**
 * Textaufgaben
 */
class Game17_3 extends AbstractGame {

	// maximum number the kids need to have in their head while solving
	protected $maxNumPerLevel = array(10, 15, 20);
	
	public $pyramids = array();
	
	// user answers will be in here after submit
	public $userAnswers = array();
	
	/**
	 * {@inheritDoc}
	 * @see \frontend\models\main\AbstractGame::initGame()
	 */
	public function initGame($level = 1, $numOfExercises = 2) {
		parent::initGame($level, $numOfExercises);
		for($i = 0; $i < $numOfExercises; $i++) {
			$maxNumber = $this->maxNumPerLevel[$level - 1];
			array_push($this->pyramids, new Pyramid($maxNumber));
		}
	}
	
	/**
	 * {@inheritDoc}
	 * @see \frontend\models\main\IBasicGame::verifyAnswers()
	 */
	public function verifyAnswers(){
		return "Feedback not implemented.";
	}
	
	public function rules() {
		return [
				['userAnswers', 'each', 'rule' => ['required']],
// 				['userAnswers', 'each', 'rule' => ['integer']]
		];
	}
}

?>