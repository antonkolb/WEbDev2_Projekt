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
			['name', 'required'],
			['name', 'string', 'max' => 256],
			['birth_date', 'date', 'format' => 'Y-m-d'],
			['notes', 'safe']
		];
	}
}
