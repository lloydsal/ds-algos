<?php

include_once(__DIR__ . '/Node.php');
include_once(__DIR__ . '/DoubleLinkedList.php');

// https://github.com/rogeriopvl/php-lrucache/blob/master/src/LRUCache/LRUCache.php

class LruCache
{
	protected $hashMap = [];
	protected $capacity;
	protected $list;

	function __construct(int $capacity, DoubleLinkedList $list, ?Node $node = null)
	{
		$this->capacity = $capacity;
		$this->list = $list;
	}

	function put($key, $data)
	{
		$node = new Node($key, $data);

		if($this->isFull()) {
			$this->deleteLast();
		} 

		// adds a node to the top of the list
		$this->list->add($node);

		// add node to hashMap
		$this->hashMap[$key] = $node;
	}

	function get($key)
	{
		if (isset($this->hashMap[$key])) {
			// Remove node from current position
			$node = $this->hashMap[$key];
			$this->removeNode($node);
			
			// make the current node the head node of the list
			$this->list->add($node);

			return $node->data;

		} else {
			return null;
		}
	}

	function isFull()
	{
		return (count($this->hashMap) >= $this->capacity);
	}

	protected function deleteLast()
	{
		$node = $this->list->tail();

		// delete key in hashMap
		unset($this->hashMap[$node->key]);

		// deletes the last node in the list
		$this->list->delete();
	}

	protected function removeNode(Node $node)
	{
		// get prevNode
		// get nextNode
		// attach prevNode to nextNode to eachother
		$prevNode = $node->getPrevious();
		$nextNode = $node->getNext();

		// if node is head node, do nothing
		if(!is_null($prevNode)) {
			$prevNode->setNext($nextNode);
		}

		// $node is tail node then do nothing
		if(!is_null($nextNode)) {
			$nextNode->setPrevious($prevNode);
		}
	}

	function printHashMap()
	{
		if(is_array($this->hashMap) and count($this->hashMap) > 0) {
			foreach($this->hashMap as $key => $node) {
				echo PHP_EOL . "- {$node->key} = {$node->data}" . PHP_EOL;
			}
		}
		else {
			echo PHP_EOL . "HashMap Empty" . PHP_EOL;
		}
	}

	function printList()
	{
		$node = $this->list->head();
		if(!is_null($node)){
			do {
				echo PHP_EOL . "- {$node->key} = {$node->data}" . PHP_EOL;
				$node = $node->getNext();
			} while (!is_null($node->getNext()));
		}
		else {
			echo PHP_EOL . "Cache Empty" . PHP_EOL;
		}
	}
}