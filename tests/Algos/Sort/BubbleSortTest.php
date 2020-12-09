<?php
namespace Tests\Algos\Sort;

use App\Algos\Sort\BubbleSort;
use PHPUnit\Framework\TestCase;

class BubbleSortTest extends TestCase
{
	/**
	 * @dataProvider providerBubbleSort
	*/
	function testBubbleSort($array, $sorted)
	{
		$sort = new BubbleSort();
		$this->assertEquals($sorted, $sort->sort($array));
	}

	function providerBubbleSort()
	{
		return [
			[[], []],
			[[1], [1]],
			[[5, 4, 3, 2, 1], [1, 2, 3, 4, 5]],
			[[5, 4, 4, 2, 1], [1, 2, 4, 4, 5]],
			// [['c', 'b', 'a'], ['a', 'b', 'c']],
			// [['a', 1], [1, 'a']],
			// [[1, 'a', 10, 4, 'z', 'b'], [1, 4, 10, 'a', 'b', 'z']],

		];
	}

	/**
	* @dataProvider providerNatSort
	*/
	function testNatSort($array, $sorted)
	{
		$sort = new BubbleSort();
		$this->assertEquals($sorted, $sort->natSort($array));
	}

	function providerNatSort()
	{
		return [
			[[], []],
			[[1], [1]],
			[[5, 4, 3, 2, 1], [1, 2, 3, 4, 5]],
			[[5, 4, 4, 2, 1], [1, 2, 4, 4, 5]],

			[['c', 'b', 'a'], ['a', 'b', 'c']],
			[['a', 1], [1, 'a']],
			[[1, 'a', 10, 4, 'z', 'b'], [1, 4, 10, 'a', 'b', 'z']],

			[['acb', 'abc', 'b', 'bca'], ['abc', 'acb', 'b', 'bca']]
		];
	}
}