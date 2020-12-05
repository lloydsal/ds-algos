<?php
namespace Tests\DataStructures;

use PHPUnit\Framework\TestCase;
use App\DataStructures\Queue;

class QueueTest extends TestCase
{
	function testIsEmpty()
	{
		$q = new Queue();
		$this->assertTrue($q->isEmpty());

		$q->push(1);
		$this->assertFalse($q->isEmpty());
	}

	function testPeek()
	{
		$q = new Queue();
		$this->assertNull($q->peek());
		$q->push(100);
		$this->assertEquals(100, $q->peek());
	}

	function testPush()
	{
		$q = new Queue();
		$this->assertNull($q->peek());

		$q->push(10);
		$this->assertEquals(10, $q->peek());

		$q->push(20);
		$this->assertEquals(10, $q->peek());
	}

	function testPop()
	{
		$q = new Queue();
		$q->push(10);
		$q->push(20);
		$q->push(30);

		$q->pop();
		$this->assertEquals(20, $q->peek());

		$q->pop();
		$this->assertEquals(30, $q->peek());

		$q->pop();
		$this->assertNull($q->peek());
	}
}