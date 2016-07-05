<?php

namespace frontend\models\main;

class Game17_4 extends AbstractGame {
	
	// length of sequences the kids need to fill out
	protected $seqLengthPerLevel = array(4, 5, 6);
	
	// maximum start (and end when combined whith length) of sequences
	protected $maxSeqStartPerLevel = array(6, 10, 14);
	
	// how many numbers should be (un)visivle in the sequence for the kid
	protected $visibleCountPerLevel = array(2, 2, 1);
	
	public $sequences = array();
	
	// user answers will be in here after submit
	public $userAnswers = array();
	
	/**
	 * {@inheritDoc}
	 * @see \frontend\models\main\AbstractGame::initGame()
	 */
	public function initGame($level = 1, $numOfExercises = 3) {
		parent::initGame($level, $numOfExercises);
		for($i = 0; $i < $this->numEx; $i++) {
			$this->initSequence($this->level);
		}
	}
	
	public function initSequence($level) {
		$length = $this->seqLengthPerLevel[$level - 1];
		$seqStart = mt_rand(1, $this->maxSeqStartPerLevel[$level - 1]);
		$visibleCount = $this->visibleCountPerLevel[$level - 1];
			
		$seq = new Sequence($length, $seqStart, $visibleCount);
		array_push($this->sequences, $seq);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \frontend\models\main\IBasicGame::verifyAnswers()
	 */
	public function verifyAnswers() {
		$userAnswers = $this->userAnswers;
		$feedback = "";
		$answerIndex = 0;
		for($i = 0; $i < $this->numEx; $i++) {
			$exerciseNum = $i + 1;
			$feedback .= "Reihe $exerciseNum: <br>";
			$seq = $this->sequences[$i];
			for ($j = 0; $j < sizeof($seq->sequence); $j++) {
				if (!$seq->isVisible[$j]) {
					$correct = $seq->sequence[$j];
					$userAnswer = $userAnswers[$answerIndex++];
					if ($correct == $userAnswer) {
						$feedback .= "An der $j. Stelle: Richtig! Die Antwort ist $correct.<br>";
					} else {
						$feedback .= "An der $j. Stelle: Nicht richtig! Die richtige Antwort lautet $correct, nicht $userAnswer.<br>";
					}
				}
			}
			$feedback .= "<br>";
		}
		return $feedback;
	}
	
	public function rules() {
		return [
				['userAnswers', 'each', 'rule' => ['required']],
				['userAnswers', 'each', 'rule' => ['integer']]
		];
	}
}

?>