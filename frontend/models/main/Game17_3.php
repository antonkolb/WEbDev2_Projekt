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
		$userAnswers = $this->userAnswers;
		$feedback = "";
		$answerIndex = 0;
		for($i = 0; $i < $this->numEx; $i++) {
			// user answers
			$sum = $userAnswers[$answerIndex++];
			$x = $userAnswers[$answerIndex++];
			$y = $userAnswers[$answerIndex++];
			// correct answers
			$pyramid = $this->pyramids[$i];
			// text
			$exerciseNum = $i + 1;
			$feedback .= "Mauer $exerciseNum: <br>";
			$feedback .= $this->verifyField($sum, $pyramid->sum, "sum");
			$feedback .= $this->verifyField($x, $pyramid->xCalc->getSum(), "x");
			$feedback .= $this->verifyField($y, $pyramid->yCalc->getSum(), "y");
			$feedback .= "<br>";
		}
		return $feedback;
	}
	
	protected function verifyField($user, $correct, $field) {
		$fieldName;
		switch ($field) {
			case "sum": $fieldName = "Oberes Feld"; break;
			case "x": $fieldName = "Linked Feld"; break;
			case "y": $fieldName = "Rechtes Feld"; break;
		}
		if ($user == $correct) {
			return "$fieldName: Richtig! Die Antwort lautet $correct.<br>";
		} else {
			return "$fieldName: Nicht richtig. Die richtige Antwort lautet $correct, nicht $user.<br>";
		}
	}
	
	public function rules() {
		return [
				['userAnswers', 'each', 'rule' => ['required']],
				['userAnswers', 'each', 'rule' => ['integer']]
		];
	}
}

?>