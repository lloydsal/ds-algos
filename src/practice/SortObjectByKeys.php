<?php
/*
 * Sort an object by its keys
 * Sort by Price Ascending, and if clashes found. sort by popularity
 * 
	// price asc, pop desc
	[
		[
			'name' => '',
			'popularity' => 123, 
			'price' => 123
		]
	]
*/
namespace App\Practice;

class SortObjectByKeys
{

	function sortBubble($products){
	
		for($i = 0; $i < count($products); $i++){
			for($j=0; $j < count($products) - 1; $j++){
				$a = $products[$j];
				$b = $products[$j+1];

				$result = $this->compare($a, $b);

				if($result > 0){
					// b is lesser than a
					// swap
					$products[$j] = $b;
					$products[$j+1] = $a;
				}
				else
				{
					// a is lesser than b OR equal
					// keep as is
				}

			}
		}

		return $products;
	}

	private function compare($a, $b){
		if($a['price'] == $b['price']) {
			return $b['pop'] <=> $a['pop'];
		}
		return $a['price'] <=> $b['price'];
	}

	function sortPhp($products){
		usort($products, function($a, $b){

			if($a['price'] === $b['price']) {
				return $b['pop'] <=> $a['pop'];
			}

			return $a['price'] <=> $b['price'];
		});
		return $products;
	}
	
}