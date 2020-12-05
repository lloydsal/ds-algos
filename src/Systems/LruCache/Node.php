<?php

class Node 
{
	public $key;
	public $data;
	
	protected $prev;
	protected $next;

	function __construct($key, $data)
	{
		$this->key = $key;
		$this->data = $data;
	}

	function setPrevious(?Node $prev)
	{
		$this->prev = $prev;
	}

	function setNext(?Node $next)
	{
		$this->next = $next;
	}

	function getPrevious(): ?Node
	{
		return $this->prev;
	}

	function getNext(): ?Node
	{
		return $this->next;
	}
}