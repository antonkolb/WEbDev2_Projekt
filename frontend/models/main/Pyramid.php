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
		$signs = array(true, true);
		// check arguments
		if ($maxNumber < 4) {
			throw new InvalidArgumentException("maxNumber cannot be smaller than 4!");
		}
		// frist calc will be either left or right
		$calc = new Calculation($signs, $maxNumber/2);
		
		// if first was left side, create right: b + c = y
		$calcRight = new Calculation($signs, $maxNumber - $calc->getSum(), $calc->getSummands()[1]);
		
		// if first was right side, create left: b + a = x
		$calcLeft = new Calculation($signs, $maxNumber - $calc->getSum(), $calc->getSummands()[0]);
		// but summands are wrong -> swap first and second summand
		Calculation::rearrangeForSummand(0, $calcLeft);// => x - b = a
		Calculation::rearrangeForSummand(1, $calcLeft);// => x - a = b
		Calculation::rearrangeForSummand(0, $calcLeft);// => b + a = x
		
		// choose random if first is left or right
		$switch = mt_rand(0, 1) == 1;
		// determine the needed side and set it
		$this->xCalc = $switch ? $calc : $calcLeft;
		$this->yCalc = $switch ? $calcRight : $calc;
		// sum
		$this->sum = $this->xCalc->getSum() + $this->yCalc->getSum();
	}
}