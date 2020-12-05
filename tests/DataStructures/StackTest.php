<?php
namespace Tests\DataStructures;

use PHPUnit\Framework\TestCase;
use App\DataStructures\Stack;

class StackTest extends TestCase
{
	// push, pop, peek, isEmpty

	public function testIsEmpty()
	{
		$stack = new Stack();
		$this->assertTrue($stack->isEmpty());
	}

	function testPeek()
	{
		$stack = new Stack();
		$stack->push(10);
		$stack->push(20);
		$this->assertEquals(20, $stack->peek());

		$stack->push(30);
		$this->assertEquals(30, $stack->peek());
	}

	function testPush()
	{
		$stack = new Stack();
		$stack->push(10);
		$stack->push(20);
		$this->assertEquals(20, $stack->peek());
	}

	function testPop()
	{
		$stack = new Stack();
		$stack->push(10);
		$stack->push(20);
		$stack->push(30);
		$stack->push(40);

		$stack->pop();
		$this->assertEquals(30, $stack->peek());
	}
}