<?php

require_once __DIR__ . "/../ds/queue.php";

class Node {
    public $data;
    public $visited = false;
    public $adjacent = [];   // Adjacent nodes
}

class GraphSearch {

    public function depthFirstSearch(Node $node) {

        // return if last node
        if(is_null($node)) return;

        $this->doSomething($node);
        $node->visited = true;

        // Iterate through all adjacent nodes
        foreach( $node->adjacent as $child ) {

            // but go deeper first before going to next adjacent node
            // only if child is NOT already visited
            if( ! $child->visited ) {
                $this->depthFirstSearch($child);
            }
        }

    }

    public function breadthFirstSearch(Node $node) {
        $queue = new Queue();

        // Mark as visited and add to queue
        $node->visited = true;
        $queue->add($node);

        // keep processing queue till queue is empty
        while( ! $queue->isEmpty()) {

            // remove first Node from queue and process it
            $n = $queue->remove();
            $this->doSomething($n);

            // iterate through all adjacent nodes and only add to queue if NOT visited
            foreach($n as $child) {
                if( ! $child->visited ) {
                    $child->visited = true;
                    $queue->add($child);
                }
            }
            

        }
    }

    protected function doSomething(Node $node) {
        // do something with this node.
        // e.g. print
    }
}