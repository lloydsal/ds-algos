<?php
namespace Tests\Algos\General;

use App\Algos\General\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
	/**
	 * @dataProvider providerFibonacci
	*/
	function testFibonacciSimple($n, $expected)
	{
		$fibonacci = new Fibonacci();
		$this->assertEquals($expected, $fibonacci->seriesByLooping($n));
	}

	/**
	 * @dataProvider providerFibonacci
	*/
	function testFibonacciRecursive($n, $expected)
	{
		$fibonacci = new Fibonacci();
		$this->assertEquals($expected, $fibonacci->seriesByRecursion($n));
	}

	/**
	 * @dataProvider providerFibonacci
	*/
	function testFibonacciMemoization($n, $expected)
	{
		$fibonacci = new Fibonacci();
		$this->assertEquals($expected, $fibonacci->getSeriesByMemoization($n));
	}

	function providerFibonacci()
	{
		return [
			[0, []],
			[1, [1]],
			[2, [1, 1]],
			[4, [1, 1, 2, 3]],
			[5, [1, 1, 2, 3, 5]],
			[6, [1, 1, 2, 3, 5, 8,]],
			[7, [1, 1, 2, 3, 5, 8, 13]],
		];
	}
}