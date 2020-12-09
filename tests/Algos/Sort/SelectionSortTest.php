<?php
namespace Tests\Algos\Sort;

use App\Algos\Sort\SelectionSort;
use PHPUnit\Framework\TestCase;

class SelectionSortTest extends TestCase
{
	/**
	 * @dataProvider providerSort
	*/
	function testSelectionSort($array, $sorted)
	{
		$sort = new SelectionSort();
		$this->assertEquals($sorted, $sort->sort($array));
	}

	function providerSort()
	{
		return [
			[[], []],
			[[1], [1]],
			[[5, 4, 3, 2, 1], [1, 2, 3, 4, 5]],
			[[5, 4, 4, 2, 1], [1, 2, 4, 4, 5]]
		];
	}
}