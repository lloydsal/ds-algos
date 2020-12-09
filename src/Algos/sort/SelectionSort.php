<?php
namespace App\Algos\Sort;

/**
 * BubbleSort
 * -------------------
 * sorts an array by finding the smallest element in the array
 * then swaping it with the first element
 * Continue with the then swaping with 2nd, 3rd element and so on.
*/
class SelectionSort
{
	function sort(array $array): array
	{
		for($i=0; $i<count($array); $i++){

			$smallestIndex = $i;
			for($j=$i; $j<count($array); $j++){
				if($array[$j] < $array[$smallestIndex]){
					$smallestIndex = $j;
				}
			}

			// swap
			$tmp = $array[$i];
			$array[$i] = $array[$smallestIndex];
			$array[$smallestIndex] = $tmp;
		}
		return $array;
	}

}