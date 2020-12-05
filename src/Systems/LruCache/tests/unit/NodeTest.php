<?php

include_once(__DIR__ . '/../../src/LruCache.php');
include_once(__DIR__ . '/../../src/DoubleLinkedList.php');
include_once(__DIR__ . '/../../src/Node.php');

use PHPUnit\Framework\TestCase;

class NodeTest extends TestCase
{
	function test_constructor()
	{
		$node = new Node(1, 2);
		$this->assertEquals(1, $node->key);
		$this->assertEquals(2, $node->data);
	}

	function test_previous_next()
	{
		$node0 = new Node(1, 0);
		$node1 = new Node(1, 1);
		$node2 = new Node(1, 2);

		$node1->setPrevious($node0);
		$node1->setNext($node2);

		$this->assertEquals($node0, $node1->getPrevious());
		$this->assertEquals($node2, $node1->getNext());
	}
}