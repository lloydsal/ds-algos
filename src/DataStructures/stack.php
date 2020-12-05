<?php
namespace App\DataStructures;

class Stack {

    protected $stack = [];

    function isEmpty()
    {
        return count($this->stack) == 0;
    }

    function push($item)
    {
        $this->stack[] = $item;
    }

    function peek()
    {
        $count = count($this->stack);
        return $this->stack[$count - 1] ?? null;
    }

    function pop()
    {
        array_pop($this->stack);
    }

}