<?php
namespace App\Algos\Sort;

class CountingSort
{
	/**
	 * This is a Simple CountingSort that can handle Non Negative Numbers only ( e.g. 0, 1, ... )
	 * 
	 * Overall Logic
	 * -------------------
	 *  - find max Value of array
	 *	- create counter array
	 *	- map positions from input in counter array
	 *	- Add positions in counter array successively
	 *	- generate dummy Sorted array (same length as input array)
	 *	- iterate through input, get position from counter array, insert input number at that position in sorted Array, Reduce position in Counter array by 1
	*/
	function sort(array $array)
	{

		// Get the max Number from Array ( To Generate a counting Array )
		$range = max($array);

		// Generate an empty counting Array, 
		// (since the counting array starts from 0, the length will be max+1 to accommodate for the 0)
		$countArray = array_fill(0, $range + 1, 0);

		// considering each number from input array as index of CountArray
		// store the number of times that number was found.
		foreach($array as $num){
			$countArray[$num] = $countArray[$num] + 1;
		}

		// Calculate the positions in the final array
		// Iterate through the CountArray, Add each current value with the previous value
		for($i=1; $i<count($countArray); $i++){
			$countArray[$i] = $countArray[$i-1] + $countArray[$i];
		}

		// Create an empty array with same size as the original Input array
		$sorted = array_fill(0, count($array), null);

		// Find the position of each number from hte input array, by using the countArray
		// Set that number at the position in the new Sorted array
		// note : index of sorted array = position-1 ( because 0 )
		foreach($array as $num){
			$position = $countArray[$num];
			$sorted[$position - 1] = $num;
			$countArray[$num] = $countArray[$num] - 1;
		}

		return $sorted;
	}

	/**
	 * This is a Modified CountingSort That can handle -ve numbers as well
	 * 
	 * Main difference here is the length of the counting array is range from smallest to larges number
	 * e.g. [-2, 3] ==> countingArray = count(max - min)
	 * 
	 * Hence since the smalles numebr is mapped to 0 in the counting array
	 * All indices are shifted by $min
	 * Hence to access index for 5, we have to do countingArray[5 - $min]
	*/
	function sortAnyNumber(array $array)
	{
		// Get the max Number from Array ( To Generate a counting Array )
		$min = min($array);
		$max = max($array);
		$range = $max - $min;

		// Generate an empty counting Array, 
		// (since the counting array starts from 0, the length will be max+1 to accommodate for the 0)
		$countArray = array_fill(0, $range + 1, 0);

		// considering each number from input array as index of CountArray
		// store the number of times that number was found.
		foreach($array as $num){
			$countArray[$num - $min] += 1;
		}

		// Calculate the positions in the final array
		// Iterate through the CountArray, Add each current value with the previous value
		for($i=1; $i<count($countArray); $i++){
			$countArray[$i] += $countArray[$i-1];
		}

		// Create an empty array with same size as the original Input array
		$sorted = array_fill(0, count($array), null);

		// Find the position of each number from hte input array, by using the countArray
		// Set that number at the position in the new Sorted array
		// note : index of sorted array = position-1 ( because 0 )
		foreach($array as $num){
			$position = $countArray[$num - $min];
			$sorted[$position - 1] = $num;
			$countArray[$num - $min] -= 1;
		}

		return $sorted;
	}
}