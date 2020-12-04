<?php

include_once(__DIR__ . '/../../src/LruCache.php');
include_once(__DIR__ . '/../../src/DoubleLinkedList.php');
include_once(__DIR__ . '/../../src/Node.php');

use PHPUnit\Framework\TestCase;

class LruCacheTest extends TestCase
{
	function test_put()
	{
		$cache = new LruCache(3, new DoubleLinkedList());
		$cache->put(1, 1);
		$this->assertEquals(1, $cache->get(1));
	}

	function test_put_capacity_reached()
	{
		$cache = new LruCache(3, new DoubleLinkedList());
		$cache->put(1, 1);
		$cache->put(2, 2);
		$cache->put(3, 3);
		$this->assertEquals(1, $cache->get(1));
	}

	function test_put_capacity_exceeded()
	{
		$cache = new LruCache(3, new DoubleLinkedList());
		$cache->put(1, 1);
		$cache->put(2, 2);
		$cache->put(3, 3);
		$cache->put(4, 4);
		$this->assertEquals(null, $cache->get(1));
	}

	function test_put_same_key_different_values()
	{
		$cache = new LruCache(3, new DoubleLinkedList());
		$cache->put(1, 1);
		$cache->put(1, 2);
		$this->assertEquals(2, $cache->get(1));
	}

	function test_get()
	{
		$cache = new LruCache(3, new DoubleLinkedList());
		$cache->put(1, 1);
		$this->assertEquals(1, $cache->get(1));
		$this->assertEquals(null, $cache->get(5), 'Should return null when Value NOT found');
	}

	function test_get_moves_node_to_top()
	{
		$cache = new LruCache(4, new DoubleLinkedList());
		$cache->put(1, 1);
		$cache->put(2, 2);
		$cache->put(3, 3);
		$cache->put(4, 4);
		$cache->get(1);
		$cache->put(5, 5);

		$cache->printList();

		$this->assertTrue(true);
		$this->assertEquals(null, $cache->get(2));
	}

	function test_isFull()
	{
		$cache = new LruCache(3, new DoubleLinkedList());
		$cache->put(1, 1);
		$this->assertFalse($cache->isFull());
		$cache->put(2, 1);
		$cache->put(3, 1);
		$this->assertTrue($cache->isFull());
	}

}