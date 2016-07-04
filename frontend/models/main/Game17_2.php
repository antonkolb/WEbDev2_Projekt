<?php

namespace frontend\models\main;

/**
 *
 */

use Yii;
use yii\base\Model;

class Game17_2 extends AbstractGame {

	
    function initGame($level = 1, $numOfExercises = 1){
		
		//ruft ueberschriebene Elternmethode auf
		parent::initGame( $level, $numOfExercises  );	
		
		for( $i=1; $i<=$this->numEx; ++$i ){
			
			$this->correctAnswer[$i] = $this->sum[$i];
		}
	}
}
