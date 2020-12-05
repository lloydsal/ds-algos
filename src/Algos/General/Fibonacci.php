<?php
namespace  App\Algos\General;

class Fibonacci 
{
	/**
	 * Return a sequence of N numbers in Fibonacci Series
	 * Time Complexity = O(n)
	 * Space Complexity : O(1)
	*/
	function seriesByLooping($n): array
	{
		if($n == 0) return [];
		if($n == 1) return [1];
		if($n == 2) return [1, 1];

		$sequence = [1, 1];
		$prevPrev = 1;
		$prev = 1;
		$curr = 0;

		while($n > 2){
			$curr = $prevPrev + $prev;

			$sequence[] = $curr;

			$prevPrev = $prev;
			$prev = $curr;
			$n--;
		}

		return $sequence;
	}

	/**
	 * Time Complexity = O(2^n)
	 * Space Complexity : O(n)
	*/
	function seriesByRecursion($n): array
	{
		$sequence = [];

		$i = 1;
		while($i <= $n){
			$sequence[]	= $this->fiboRecursivelyAt($i);
			$i++;
		}

		return $sequence;
	}

	protected function fiboRecursivelyAt($n)
	{
		if($n <= 0){
			return 0;
		}
		else if($n == 1 or $n == 2){
			return 1;
		}
		else {
			return $this->fiboRecursivelyAt($n - 1) + $this->fiboRecursivelyAt($n - 2);
		}
	}

	/**
	 * Time Complexity = O(n)
	 * Space Complexity : O(n)
	*/
	function getSeriesByMemoization($n): array
	{
		$sequence = [];

		$i = 1;
		while($i <= $n){
			$sequence[]	= $this->fiboByMemo($i);
			$i++;
		}

		return $sequence;
	}

	protected function fiboByMemo($n, $memo = [])
	{
		if(isset($memo[$n])) return $memo[$n];

		if($n <= 0){
			return 0;
		}
		else if($n == 1 or $n == 2){
			return 1;
		}
		else {
			$memo[$n-1] = $this->fiboByMemo($n - 1, $memo);
			$memo[$n-2] = $this->fiboByMemo($n - 2, $memo);

			return $memo[$n-1] + $memo[$n-2];
		}
	}
}