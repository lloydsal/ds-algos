<?php

require_once __DIR__ . "/sort-base.php";

class SelectionSort extends SortBase {

    public function sort($arr) {
        for($i=0; $i<count($arr)-1; $i++){
            $minI = $i;
            for($j=$i+1; $j<count($arr); $j++){
                if($arr[$j] < $arr[$minI]) {
                    $minI = $j;
                }
            }
            
            // swap with smallest
            $arr = $this->swap($arr, $i, $minI);
        }
        return $arr;
    }

}

$arr = [200, 1, 5, 3, 2, 100, 20, 0, -1];
$selectionSort = new SelectionSort();
echo('Original       : '  . $selectionSort->print($arr));
echo('Selection Sort : '  . $selectionSort->print($selectionSort->sort($arr)));