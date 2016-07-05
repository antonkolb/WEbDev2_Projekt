<?php

namespace frontend\models\main;

use InvalidArgumentException;

/**
 * Represents a calculation with or without minus and with any number of summands.
 */
class Calculation {
	
	// STATIC
	// ####################################################################################
	
	/**
	 * Rearrange a calculation so that the summand at the given index becomes the sum
	 * and the sum becomes a summand. This will be done in a way so that the result
	 * stays positive. Attention:
	 * This may cause things like subTotals/firstSummand to become negative and may
	 * drastically make this calculation harder to solve!
	 */
	public static function rearrangeForSummand($summandIndex, Calculation $calc) {
		if ($summand > 0) {
			// invert other summands
			foreach ($calc->summands as $otherIndex => $otherSummand) {
				$calc->summands[$otherIndex] = $otherSummand * (-1);
			}
		} else {
			// invert summand and sum
			$calc->sum *= (-1);
			$calc->summands[$summandIndex] *= (-1);
		}
		// flip summand and sum
		$summand = $calc->summands[$summandIndex];
		$calc->summands[$summandIndex] = $calc->sum;
		$calc->sum = $summand;
	}
	
	// MEMEBERS
	// ####################################################################################
	
	protected $summands;
	protected $sum;
	
	/**
	 * @return int[] - Summands of this calculation.
	 */
	public function getSummands() {
		return $this->summands;
	}
	
	/**
	 * @return int - Sum of the summands of this calculation.
	 */
	public function getSum() {
		return $this->sum;
	}
	
	// FUNCTIONS
	// ####################################################################################
	
	/**
	 * Generates summands and sum. Number of summands inferred from length of given array.
	 * 
	 * @param bool[] $summandIsPositive - an array that indicates for each summand if that
	 * 		summand should be positive or negative. If you pass [true, false true], the 
	 * 		calculation will be: x - y + z = sum. First summand must be positive.
	 * 
	 * @param int $maxNumber - maximum number the kids need to calculate with when solving
	 * 		this calculation.
	 * 
	 * @param int $firstSummand - Specify this only if you want to set the first summand.
	 * 		0 means not specified (random summand like all other summands).
	 * 
	 * @throws InvalidArgumentException when you pass stupid arguments.
	 */
	public function __construct(array $summandIsPositive, $maxNumber, $firstSummand = 0) {
		
		// check arguments
		if ($maxNumber < 1) {
			throw new InvalidArgumentException("maxNumber cannot be smaller than 1!");
		}
		if (sizeOf($summandIsPositive) < 2) {
			throw new InvalidArgumentException("Less then 2 summands don't make sense, right?");
		}
		if ($summandIsPositive[0] == false) {
			throw new InvalidArgumentException("The first summand must be positive! Do you want the kids to cry?");
		}
		
		// create summands
		$summands = array();
		$subTotal = 0; // must never be higher than maxNumber
		
		foreach ($summandIsPositive as $index => $isPositive) {
			$summand;
			if ($firstSummand != 0 && $index == 0) {
				$summand = $firstSummand;
			} else {
				// calculate room for summand
				$room = $this->summandRoom($summandIsPositive, $index);
				// create summand
				$summand = $this->createSummand($isPositive, $subTotal, $maxNumber, $room);
			}
			$subTotal += $summand;
			array_push($summands, $summand);
		}
		
		$this->summands = $summands;
		$this->sum = $subTotal;
	}
	
	protected function createSummand($isPositive, $subTotal, $maxNumber, $room) {
		$posString = $isPositive ? "positive" : "negative";
		$negString = $isPositive ? "negative" : "positive";
		
		// calculate boundaries (top & bottom) for random
		if(!$isPositive) $room *= (-1);// inverse room if negative
		
		$bottomBoundary = 1;
		if ($room < 0) $bottomBoundary -= $room;// add room for following negative (positive) summands
		if ($bottomBoundary > ($maxNumber - $subTotal)) {
			throw new InvalidArgumentException("There are more $negString summands than maxNumber is
					big! Negative summands cannot be balanced by $posString ones (if any), i tried!");
		}
		$topBoundary = $maxNumber - $subTotal;
		if ($room > 0) $topBoundary -= $room;// add room for following positive (negative) summands
		if ($topBoundary <= 0) {
			throw new InvalidArgumentException("There are more $posString summands than maxNumber is
					big! Positive summands cannot be balanced by $negString ones (if any), i tried!");
		}
		
		if($topBoundary < $bottomBoundary) {
			throw new InvalidArgumentException("maxNumber must be positive!");
		}
		
		// create new summand
		$summand = mt_rand($bottomBoundary, $topBoundary);
		return $summand * ($isPositive ? 1 : -1);
	}
	
	/**
	 * Calculate how much room a positive summand needs to leave for the following summands.
	 * For example, if we have the calculation x + y + z = s and $maxNumber = 10 and x = 5
	 * =>
	 * then y should not be higher than 4 because z cannot not be 0 (0 not allowed in general).
	 * So y must leave atleast a room of 1 so that the following summands are not 0;
	 * 
	 * @param int $index - The index of the summand for which we want to find the bounds.
	 * 
	 * @return int - Positive if the summand needs room towards top, negative if summand
	 * 		needs room towards bottom.
	 */
	protected function summandRoom(array $summandIsPositive, $index) {
		$room = 0;
		// we only need to look at the summands which FOLLOW after current summand
		for ($i = $index + 1; $i < sizeOf($summandIsPositive); $i++) {
			
			// negative summands allow more room towards $maxNumber, 
			// but decrease room towards 0.
			$room = $room + ($summandIsPositive[$i] ? +1 : -1);
		}
		return $room;
	}
}
