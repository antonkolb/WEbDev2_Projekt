<?php

namespace frontend\models\main;

use InvalidArgumentException;

/**
 * A simple sequence of continguos numbers.
 */
class Sequence {
	
	public $sequence;
	public $isVisible;
	
	/**
	 * Sequence generator function. Could also be implemented for more complex sequences.
	 */
	protected function createNextNumber(&$array) {
		array_push($array, $array[sizeof($array)-1] + 1);
	}
	
	/**
	 * @param int $length - The total length of the sequence.
	 * @param unknown $startNum - The first number in the sequence (lowest).
	 * @param unknown $visibleCount - How many numbers of the sequence should be visible to the kids.
	 */
	public function __construct($length, $startNum, $visibleCount) {
		if ($visibleCount < 1) {
			throw new InvalidArgumentException("Very funny.");
		}
		if ($visibleCount > $length) {
			throw new InvalidArgumentException("No sense.");
		}
		if ($startNum < 0) {
			throw new InvalidArgumentException("No negative numbers or so i've heard.");
		}
		// create sequence and init isVisible to false
		$array = array($startNum);
		$isVisible = array(false);
		for($i = 0; $i < $length - 1; $i++) {
			$this->createNextNumber($array);
			array_push($isVisible, false);
		}
		// determine which numbers are visible and which aren't (randomly)
		$available = $visibleCount;
		while($available > 0) {
			// im tired and i don't care how often this loop happens
			$index = mt_rand(0, $length -1);
			// if not already visible, yay
			if (!$isVisible[$index]) {
				$isVisible[$index] = true;
				$available--;
			}
			// otherwise, try again
		}
		$this->sequence = $array;
		$this->isVisible = $isVisible;
	}
}

?>