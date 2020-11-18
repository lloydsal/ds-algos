<?php

abstract class SortBase {

    abstract public function sort($arr);

    public final function print($arr) {
        $string = '';
        foreach($arr as $value) {
            $string .= $value . ', ';
        }
        return rtrim(trim($string), ',') . PHP_EOL;
    }

    protected function swap($arr, $i, $j) {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
        return $arr;
    }
}