<?php
namespace Tests\Practice;

use PHPUnit\Framework\TestCase;
use App\Practice\SortObjectByKeys;

class SortObjectByKeysTest extends TestCase
{
	/**
	 * @dataProvider providerSort
	*/
	function testSort($products, $expected){
		$sorter = new SortObjectByKeys();
		$this->assertEquals($expected, $sorter->sortBubble($products));
	}

	function providerSort()
	{
		return [
			[
				[
					['name' => 'g', 'price' => 10, 'pop' => 2],
					['name' => 'a', 'price' => 10, 'pop' => 1],
					['name' => 'b', 'price' => 10, 'pop' => 3],
					['name' => 'c', 'price' => 5, 'pop' => 3],
					['name' => 'd', 'price' => 1, 'pop' => 2],
				],
				[
					['name' => 'd', 'price' => 1, 'pop' => 2],
					['name' => 'c', 'price' => 5, 'pop' => 3],
					['name' => 'b', 'price' => 10, 'pop' => 3],
					['name' => 'g', 'price' => 10, 'pop' => 2],
					['name' => 'a', 'price' => 10, 'pop' => 1],
				]
			]
		];
	}
}

// $products = [
// 	['name' => 'g', 'price' => 10, 'pop' => 2],
// 	['name' => 'a', 'price' => 10, 'pop' => 5],
// 	['name' => 'b', 'price' => 2, 'pop' => 1],
// 	['name' => 'c', 'price' => 5, 'pop' => 2],
// 	['name' => 'd', 'price' => 1, 'pop' => 3],
// 	['name' => 'e', 'price' => 100, 'pop' => 1],
// 	['name' => 'f', 'price' => 2, 'pop' => 3],
// 	['name' => 'h', 'price' => 200, 'pop' => 7],
// 	['name' => 'i', 'price' => 6, 'pop' => 6],
// 	['name' => 'j', 'price' => 3, 'pop' => 3],
// 	['name' => 'k', 'price' => 9, 'pop' => 2]
// ];
