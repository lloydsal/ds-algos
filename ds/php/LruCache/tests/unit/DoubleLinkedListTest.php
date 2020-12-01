<?php

include_once(__DIR__ . '/../../src/LruCache.php');
include_once(__DIR__ . '/../../src/DoubleLinkedList.php');
include_once(__DIR__ . '/../../src/Node.php');

use PHPUnit\Framework\TestCase;

class DoubleLinkedListTest extends TestCase
{
	function test_constructor()
	{
		$list = new DoubleLinkedList();
		$this->assertEquals($list->pseudoTail(), $list->head());
		$this->assertEquals($list->pseudoHead(), $list->tail());
	}

	function test_add()
	{
		$node1 = new Node(1,1);

		$list = new DoubleLinkedList();
		$list->add($node1);
		$this->assertEquals($list->head()->key, $node1->key, 'first node should be newl added node');
		$this->assertEquals($list->tail()->key, $node1->key, 'Tail node should point to previous node correctly');

		$node2 = new Node(2,2);
		$list->add($node2);
		$this->assertEquals($list->head()->key, $node2->key, 'New head node should be new node');
		$this->assertEquals($list->head()->getNext()->key, $node1->key, 'Old first Node should shift down');

		$this->assertEquals($list->tail()->key, $node1->key, 'Tail node should point to previous node');
	}

	function test_delete()
	{
		$node1 = new Node(1, 1);
		$node2 = new Node(2, 2);
		$node3 = new Node(3, 3);

		$list = new DoubleLinkedList();
		$list->delete();

		// Check for delete when no nodes added
		$this->assertEquals($list->tail()->key, null);

		// when 3 nodes added
		$list->add($node1);
		$list->add($node2);
		$list->add($node3);
		$list->delete();
		$this->assertEquals($list->tail()->key, $node2->key);		 
	}
}