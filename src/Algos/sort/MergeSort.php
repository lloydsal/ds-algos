<?php
namespace App\Algos\Sort;

/**
 * MergeSort
 * -------------------
 * Sorts and array by..
 * Dividing the array in half
 * and sorting each array using the same method
 * Later the 2 arrays at each level are merged where the actual sorting happens
 * 
*/
class MergeSort
{
	function sort(array $array): array
	{
		if(count($array) <= 1) return $array;

		$midIndex = floor(count($array) / 2);
		$left = array_slice($array, 0, $midIndex);
		$right = array_slice($array, $midIndex);

		return $this->merge($this->sort($left), $this->sort($right));
	}

	function merge(array $left, array $right): array 
	{
		$sorted = [];
		$lI = 0;
		$rI = 0;

		while($lI < count($left) and $rI < count($right)) {
			if($left[$lI] <= $right[$rI]){
				$sorted[] = $left[$lI];
				$lI++;
			}
			else {
				$sorted[] = $right[$rI];
				$rI++;
			}
		}

		$leftRemaining = array_slice($left, $lI);
		$rightRemaining = array_slice($right, $rI);

		return array_merge($sorted, $leftRemaining, $rightRemaining);
	}
}