<?php

namespace frontend\models\customer;
use yii\db\ActiveRecord;

class StatisticRecord extends ActiveRecord {

	public static function tablevalue() {
		return ['userid','gameKat',
        'game','userAnswer','amoutOfTries','elapsedTime',];
	}
        public static function update($userid, $gameKat,
               $game, $userAnswer, $amoutOfTries, $elapsedTime) {
                $this->userid = $userid;
                $this->gameKat = $gameKat;
                $this->game = $game;
                $this->userAnswer = $userAnswer;
                $this->amoutOfTries = $amoutOfTries;
                $this->elapsedTime = $elapsedTime;
        }
	public function rules() {
		return [
			['id', 'number'],
			['gameKat', 'string'],
			['game', 'string', 'max' => 100],
            ['game', 'string', 'max' => 100],
            ['userAnswer', 'string', 'max' => 100],
            ['amoutOfTries', 'string', 'max' => 100],
            ['elapsedTime', 'string', 'max' => 10],
		];
	}
}
