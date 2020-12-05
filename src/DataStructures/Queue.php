<?php

namespace App\DataStructures;

class Node
{
    public $value;
    public $next;

    function __construct($value = null)
    {
        $this->value = $value;
        $this->next = null;
    }
}

class Queue 
{
    protected $front;
    protected $back;

    function isEmpty()
    {
        return is_null($this->front);
    }

    function peek()
    {
        if(!is_null($this->front)){
            return $this->front->value;
        }

        return null;
    }

    function push($item)
    {
        $node = new Node($item);

        if($this->isEmpty()){
            $this->front = $node;
            $this->back = $node;
        }
        else {
            $oldBack = $this->back;
            $oldBack->next = $node;

            $this->back = $node;
        }
    }

    function pop()
    {
        if(! $this->isEmpty()){
            $this->front = $this->front->next;
        }
    }
}