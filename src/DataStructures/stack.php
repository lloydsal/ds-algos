#!/usr/bin/php
<?php

class Stack {
    protected $stack = [];
    
    // add to top of stack
    public function push($item) {
        $this->stack[] = $item;
    }
    
    // remove from top of stack
    public function pop() {
        return array_pop($this->stack);
    }
    
    // return top of stack
    public function peek() {
        return $this->stack[count($this->stack) - 1];
    }
    
    // return true if stack is empty
    public function isEmpty() {
        return count($this->stack) == 0;
    }

    // note : this is only for debugging
    public function get() {
        return $this->stack;
    }
}

$stack = new Stack();
$stack->push(1);
$stack->push(3);
$stack->push(2);
$stack->push(4);
$stack->push(5);

echo "Top = " . $stack->peek() . PHP_EOL;
$stack->pop();
echo "Top = " . $stack->peek() . PHP_EOL;