<?php

/**
 * Ref https://www.geeksforgeeks.org/merge-sort/
 * */

require_once __DIR__ . "/sort-base.php";

class MergeSort extends SortBase {
    
    public function sort($arr) {

        if(count($arr) == 1) return $arr;
        
        $mid = count($arr) / 2;
        $left = array_slice($arr, 0, $mid);
        $right = array_slice($arr, $mid);
    
        return $this->merge($this->sort($left), $this->sort($right));
    }

    protected function merge($left, $right) {

        // Assume $left, $right are already sorted

        $merged = [];

        // create 2 pointers to point to positions in left, right arrays
        $l = $r = 0;

        // iterate through both arrays until end of smaller array is reached
        while($l < count($left) and $r < count($right)){

            // save smaller value in merged and increment respective pointer
            if($left[$l] < $right[$r]) {
                array_push($merged, $left[$l]);
                $l++;
            }
            else if ($left[$l] > $right[$r]) {
                array_push($merged, $right[$r]);
                $r++;
            }
            else {
                array_push($merged, $left[$l]);
                $l++;
                $r++;
            }
        }

        // assume one of the arrays is larger and is still not merged.
        $pendingL = array_slice($left, $l);
        $pendingR = array_slice($right, $r);

        return array_merge($merged, $pendingL, $pendingR);
    }
}


// $arr = [200, 1, 5, 3, 2, 100, 20, 0, -1];
// $mergeSort = new MergeSort();
// echo('Original    : '  . $mergeSort->print($arr));
// echo('Merge Sort  : '  . $mergeSort->print($mergeSort->sort($arr)));