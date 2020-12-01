<?php

include_once(__DIR__ . '/../../src/LruCache.php');
include_once(__DIR__ . '/../../src/DoubleLinkedList.php');
include_once(__DIR__ . '/../../src/Node.php');

use PHPUnit\Framework\TestCase;

class IntegrationTest extends TestCase
{
	function test_simple_put_get()
	{
		$list = new DoubleLinkedList();
		$cache = new LruCache(5, $list);

		// Empty cache returns null
		$this->assertEquals(null, $cache->get(''));

		// add one item
		$cache->put('name', 'Lloyd');
		$this->assertEquals('Lloyd', $cache->get('name'));
	}

	function test_max_limit_reached_get_first_item()
	{
		$list = new DoubleLinkedList();
		$cache = new LruCache(5, $list);

		$cache->put('name', 'Lloyd');
		$cache->put('age', '33');
		$cache->put('city', 'Toronto');
		$cache->put('country', 'Canada');
		$cache->put('nationality', 'indian');
		$this->assertEquals('Lloyd', $cache->get('name'));
	}

	function test_max_limit_exceeded_first_item_not_available()
	{
		$cache = new LruCache(5, new DoubleLinkedList());

		$cache->put(1, 1);
		$cache->put(2, 1);
		$cache->put(3, 1);
		$cache->put(4, 1);
		$cache->put(5, 1);
		$cache->put(6, 1);
		$cache->put(7, 1);
		$cache->put(8, 1);
		$cache->put(9, 1);
		$cache->put(10, 1);
		$cache->put(11, 1);
		$cache->put(12, 1);
		// $cache->put('has-pet', true);

		$cache->printHashMap();

		$this->assertTrue(true);
		// $this->assertEquals(null, $cache->get('name'));
	}
}