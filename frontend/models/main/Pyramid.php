<?php

namespace frontend\models\main;

use InvalidArgumentException;

/**
 * A Pyramid is just a calculation with 4 summands of the form a + b + b + c
 * whhere the ground level represent a, b & c, the second level represents
 * x = a + b and y = b + c and the top level is sum = x + y = a + b + b + c.
 */
class Pyramid {
	
	public $xCalc;
	public $yCalc;
	public $sum;
	
	public function __construct($maxNumber) {
		// check arguments
		if ($maxNumber < 4) {
			throw new InvalidArgumentException("maxNumber cannot be smaller than 4!");
		}
		// a + b = x
		$xCalc = new Calculation(array(true, true), $maxNumber/2);
		// b + c = y
		$yCalc = new Calculation(array(true, true), $maxNumber - $xCalc->getSum(), $xCalc->getSummands()[0]);
		// x + y = sum
		$switch = mt_rand(0, 1) == 1;
		$this->xCalc = $switch ? $xCalc : $yCalc;
		$this->yCalc = $switch ? $yCalc : $xCalc;
		$this->sum = $xCalc->getSum() +  $yCalc->getSum();
	}
}