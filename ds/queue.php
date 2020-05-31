<?php

class Queue {
    protected $queue = [];
    
    // Add Item to End
    public function add($item) {
        $this->queue[] = $item;
    }
    
    // Remoe First Item
    public function remove() {
        return array_shift($this->queue);
    }
    
    // return First Item
    public function peek() {
        return $this->queue[0];
    }
    
    public function isEmpty() {
        return count($this->queue) == 0;
    }

    // note : this is only for debugging
    public function get() {
        return $this->queue;
    }
}

// $queue = new Queue();
// $queue->add(1);
// $queue->add(2);
// $queue->add(3);
// $queue->add(4);
// $queue->add(5);

// echo "Top = " . $queue->peek() . PHP_EOL;
// $queue->remove();
// echo "Top = " . $queue->peek() . PHP_EOL;
// print_r($queue->get());