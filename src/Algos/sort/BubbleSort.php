<?php
namespace App\Algos\Sort;

/**
 * BubbleSort
 * -------------------
 * Sorts an array by comparing adjacent values. 
 * - If the right value is smaller than left, 
 * - then swap them and move to next pair of adjacent values
 * - do this N times. where N = number of elements in array
 * 
*/
class BubbleSort
{
	// Note: this will only work for simple numbers, will fail in case of chars and strings
	// Use natSort for strings
	function sort(array $array): array
	{

		for($i=0; $i<count($array); $i++){
			for($j=0; $j<count($array) - 1; $j++){
				if($array[$j] > $array[$j+1]){
					// swap
					$tmp = $array[$j];
					$array[$j] = $array[$j+1];
					$array[$j+1] = $tmp;
				}
			}
		}

		return $array;
	}

	function natSort($array)
	{
		sort($array, SORT_NATURAL);
		return $array;
	}

	public function sortAlternateTechnique($arr) {
        
        $swapped = -1;

        // keep iterating entire array till no of swaps in one iteration = 0
        while($swapped != 0) {
            $swapped = 0;

            for($i=0; $i<count($arr)-1; $i++) {
                $j=$i+1;

                // If current Element is greater than next element ==> swap
                if($arr[$i] > $arr[$j]) {
                    // swap
					$tmp = $arr[$i];
					$arr[$i] = $arr[$j];
					$arr[$j] = $tmp;

					// increment Swap counter
                    $swapped++;
                }
            }
        }

        return $arr;
    }
}