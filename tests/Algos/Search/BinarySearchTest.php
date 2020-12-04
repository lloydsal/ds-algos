<?php
namespace Tests\Algos\Search;

use App\Algos\Search\BinarySearch;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
	/**
	 * @dataProvider providerBinarySearch
	*/
	function testBinarySearch($array, $find, $indexAt){
		$search = new BinarySearch();
		$this->assertEquals($indexAt, $search->search($find, $array));
	}

	function providerBinarySearch() {
		return [
			[[], 3, null],
			[[1, 2, 3, 4, 5, 6, 7, 8], 1, 0],
			[[1, 2, 3, 4, 5, 6, 7, 8], 8, 7],
			[[1, 2, 3, 4, 5, 6, 7, 8], 4, 3],
			[[1, 2, 3, 4, 5, 6, 7, 8], 5, 4],
			[[1, 2, 3, 4, 5, 6, 7, 8], 9, null],
			[[1, 2, 3, 4, 5, 6, 7], 1, 0],
			[[1, 2, 3, 4, 5, 6, 7], 7, 6],
			[[1, 2, 3, 4, 5, 6, 7], 4, 3],
			[[1, 2, 3, 4, 5, 6, 7], 3, 2],
			[[1, 2, 3, 4, 5, 6, 7], 9, null]
		];
	}
}