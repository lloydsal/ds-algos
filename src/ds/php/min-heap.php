<?php

// Ref : http://www.cse.hut.fi/en/research/SVG/TRAKLA2/tutorials/heap_tutorial/taulukkona.html
// Ref : Example : https://arkadiuszkondas.com/binary-heap-implementation-in-php/

Class MinHeap {

    const ROOT_INDEX = 1;

    protected $heap = [];

    public function __construct() {

        // first A[0] is not used
        $this->heap[] = null;
    }

    protected function parentIndex($i) { return (int) $i/2; }
    protected function leftChildIndex($i) { return $i * 2; }
    protected function rightChildIndex($i) { return $i * 2 + 1; }

    protected function bubbleUp($i) {
        // compare with parent
        // if parent is A[0] ==> do nothing
        // if parent is larger --> Swap current with parent
        
        $pI = $this->parentIndex($i);

        while($pI > 0 AND $this->heap[$pI] > $this->heap[$i]) {
            $currentNode = $this->heap[$i];
            $this->heap[$i] = $this->heap[$pI];
            $this->heap[$pI] = $currentNode;
            $i = $pI;
            $pI = $this->parentIndex($i);
        }
    }

    public function peek() {
        return $this->heap[self::ROOT_INDEX];
    }

    public function size() {
        return count($this->heap) - 1;
    }

    public function isEmpty() {
        return $this->size() === 0;
    }

    public function get() {
        return $this->heap;
    }
    
    // Inserts a node and readjust heap to ensure min-heap validity
    public function insert($d) {
        $this->heap[] = $d;
        $this->bubbleUp(count($this->heap) - 1);
    }

    // Removes the smallest Element ( at top of minHeap )
    public function extractMin() {
        // replace root with last node
        // readjust nodes by comparing root node ( current ) with children
        // replace current with smaller of the 2 children
        // repeat till children are larger than current

        // Remove last element from array AND save it in root node
        $this->heap[self::ROOT_INDEX] = array_pop($this->heap);
        $this->sinkDown(self::ROOT_INDEX);
        // readjust heap

    }

    protected function sinkDown($i) {

        while (true) {
            $lI = $this->leftChildIndex($i);
            $rI = $this->rightChildIndex($i);

            $lNode = null;
            $rNode = null;
            $lowestChildI = null;  // Final index to compare current with

            // Find the index of the smaller of the 2 children ( if they exist )
            // note elements will always be filled in left to right
            if(array_key_exists($lI, $this->heap)) {
                $lowestChildI = $lI;
                $lNode = $this->heap[$lI];
                if(array_key_exists($rI, $this->heap)) {
                    $rNode = $this->heap[$rI];
                    if($lNode > $rNode) {
                        $lowestChildI = $rI;
                    }
            
                }
            }

            // If current node is larger than lowestChild ==> Swap
            if(!is_null($lowestChildI) AND ($this->heap[$lowestChildI] < $this->heap[$i]) ) {
                // swap
                $currentNode = $this->heap[$i];
                $this->heap[$i] = $this->heap[$lowestChildI];
                $this->heap[$lowestChildI] = $currentNode;
            }
            else {
                // if no more children OR children are larger than parent ==> stop sinkingDown
                break;
            }
            
        }
    }

}

$heap = new MinHeap();
$heap->insert(4);
$heap->insert(50);
$heap->insert(7);
$heap->insert(80);
$heap->insert(90);
$heap->insert(87);
$heap->insert(2);   // This insert will reAdjust heap
print_r($heap->get());

$heap->extractMin();
print_r($heap->get());
