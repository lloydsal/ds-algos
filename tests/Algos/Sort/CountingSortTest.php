<?php
namespace Tests\Algos\Sort;

use App\Algos\Sort\CountingSort;
use PHPUnit\Framework\TestCase;

class CountingSortTest extends TestCase
{
	/**
	 * @dataProvider providerSort
	*/
	function testSort($array, $expected)
	{
		$sorter = new CountingSort();
		$this->assertEquals($expected, $sorter->sort($array));
	}

	function providerSort()
	{
		return [
			[
				[5, 4, 3, 2, 1, 4], 
				[1, 2, 3, 4, 4, 5]
			],
			[
				[5, 4, 3, 2, 1, 4, 0], 
				[0, 1, 2, 3, 4, 4, 5]
			],
			// below condition will not work for this method
			// [
			// 	[-1, 4, 3, 2, 1, 4, 0], 
			// 	[-1, 0, 1, 2, 3, 4, 4]
			// ]
		];
	}

	/**
	 * @dataProvider providerSortAnyNumber
	*/
	function testSortAnyNumber($array, $expected)
	{
		$sorter = new CountingSort();
		$this->assertEquals($expected, $sorter->sortAnyNumber($array));
	}

	function providerSortAnyNumber()
	{
		return [
			[
				[5, 4, 3, 2, 1, 4], 
				[1, 2, 3, 4, 4, 5]
			],
			[
				[5, 4, 3, 2, 1, 4, 0], 
				[0, 1, 2, 3, 4, 4, 5]
			],
			[
				[-1, 4, 3, 2, 1, 4, 0], 
				[-1, 0, 1, 2, 3, 4, 4]
			]
		];
	}
}