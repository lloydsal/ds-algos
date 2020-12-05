<?php
class DoubleLinkedList
{
	// Create a pseudo head, tail that will hold all nodes between them
	protected $head;
	protected $tail;

	function __construct()
	{
		// Create Dummy head, tail
		// note all other nodes will be inbetween the dummy head and tail
		$this->head = new Node(null, null);
		$this->tail = new Node(null, null);

		// link head and tail together
		$this->head->setNext($this->tail);
		$this->tail->setPrevious($this->head);
	}

	/**
	 * Return Actual Head node (not pseudo head)
	*/
	function head()
	{
		return $this->head->getNext();
	}

	/**
	 * Return Actual Tail node (NOT pseudo Tail)
	*/
	function tail()
	{
		return $this->tail->getPrevious();
	}

	/**
	 * Add new node as head node
	*/
	function add(Node $node)
	{
		$headNext = $this->head->getNext();
		
		// attach right side (both ways)
		$node->setNext($headNext);
		$headNext->setPrevious($node);

		// attach left side (both ways)
		$this->head->setNext($node);
		$node->setPrevious($this->head);
	}

	/**
	 * Remove last node
	*/
	function delete()
	{
		$prevTail = $this->tail->getPrevious();
		if($prevTail !== $this->head) {
			$prevPrevTail = $prevTail->getPrevious();
			$prevPrevTail->setNext($this->tail);
			$this->tail->setPrevious($prevPrevTail);
		}
	}

	function pseudoHead()
	{
		return $this->head;
	}

	function pseudoTail()
	{
		return $this->tail;
	}
}