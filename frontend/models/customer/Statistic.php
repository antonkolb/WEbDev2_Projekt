<?php

namespace frontend\models\customer;

class Statistic {

	public $userid;	
	public $gameKat;
	public $game;
	public $userAnswer;
        public $amoutOfTries;
        public $elapsedTime;

	public function __construct($userid, $gameKat, 
               $game, $userAnswer, $amoutOfTries, $elapsedTime)
	{
		$this->userid = $userid;
		$this->gameKat = $gameKat;
                $this->game = $game;
                $this->userAnswer = $userAnswer;
                $this->amoutOfTries = $amoutOfTries;
                $this->elapsedTime = $elapsedTime;
	}
}

