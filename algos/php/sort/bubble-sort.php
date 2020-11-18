<?php

require_once __DIR__ . "/sort-base.php";

class BubbleSort extends SortBase {

    public function sort($arr) {
        
        $swapped = -1;

        // keep iterating entire array till no of swaps in one iteration = 0
        while($swapped != 0) {
            $swapped = 0;

            for($i=0; $i<count($arr)-1; $i++) {
                $j=$i+1;

                // If current Element is greater than next element ==> swap
                if($arr[$i] > $arr[$j]) {
                    // swap
                    $arr = $this->swap($arr, $i, $j);
                    $swapped++;
                }
            }
        }

        return $arr;
    }

}

$arr = [200, 1, 5, 3, 2, 100, 20, 0, -1];
$bubbleSort = new BubbleSort();
echo('Original    : '  . $bubbleSort->print($arr));
echo('Bubble Sort : '  . $bubbleSort->print($bubbleSort->sort($arr)));