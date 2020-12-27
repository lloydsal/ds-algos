<?php
namespace App\DataStructures\DoubleLinkedList;

class Node
{
    public $key;
    public $value;

    public $prev;
    public $next;

    function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}