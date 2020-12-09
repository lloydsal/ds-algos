<?php
namespace Tests\Algos\Sort;

use App\Algos\Sort\MergeSort;
use PHPUnit\Framework\TestCase;

class MergeSortTest extends TestCase
{
	/**
	 * @dataProvider providerSort
	*/
	function testMergeSort($array, $sorted)
	{
		$sort = new MergeSort();
		$this->assertEquals($sorted, $sort->sort($array));
	}

	function providerSort()
	{
		return [
			[[], []],
			[[1], [1]],

			[[4, 3, 2, 1], [1, 2, 3, 4]],
			[[4, 4, 2, 1], [1, 2, 4, 4]],

			[[5, 4, 3, 2, 1], [1, 2, 3, 4, 5]],
			[[5, 4, 4, 2, 1], [1, 2, 4, 4, 5]],
		];
	}
}