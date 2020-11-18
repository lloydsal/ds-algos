<?php

// Assumes the Array is Sorted
class BinarySearch {

    public function search($q, $A) {

        $lowI = 0;
        $highI = count($A) - 1;
        $midI = 0;

        while($lowI <= $highI) {
            $midI = floor(($lowI + $highI) / 2); // avg.

            if($q < $A[$midI]) {
                $highI = $midI - 1;
            }
            else if ($q > $A[$midI]) {
                $lowI = $midI + 1;
            }
            else {
                return $midI;
            }
        }

        return -1;
    }

}

$A = [1, 2, 3, 5, 7, 10, 15, 25, 100, 200];
$search = new BinarySearch();
echo ("BinarySearch : " . $search->search(3, $A) . PHP_EOL);