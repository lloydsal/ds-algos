<?php
namespace App\Algos\Search;

class BinarySearch
{
	function search($q, $array): ?int
	{
		$lowI = 0;
		$highI = count($array) - 1;

		while($lowI <= $highI){
			$midI = floor(($lowI + $highI) / 2);

			if($q < $array[$midI]){
				// left side
				$highI = $midI - 1;
			} elseif ($q > $array[$midI]) {
				// right side
				$lowI = $midI + 1;
			} else {
				// found
				return $midI;
			}
		}

		return null;
	}
}