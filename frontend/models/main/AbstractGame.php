<?php

namespace frontend\models\main;

/**
 *
 */

use yii\base\Model;

abstract class AbstractGame extends Model implements IBasicGame {
   
	// fallback to this level if requested level is higher
	protected $maxLevel = 3;
	
	public $numEx;// numberOfExercises;
	public $level;

    /**
	 * Inherited from Interface:
     * Die initGame Methode kuemmert sich um die Vorbereitung des Spieles,
     * zum Beispiel Vorbelegung der Werte
     */
    public function initGame($level = 1, $numOfExercises = 1){
		$this->numEx = $numOfExercises; 
		
		if ($level > $this->maxLevel) {
    		$this->level = $this->maxLevel;
    	} else {
    		$this->level = $level;
    	}
	}
}

