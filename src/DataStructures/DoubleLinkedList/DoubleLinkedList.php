<?php
namespace App\DataStructures\DoubleLinkedList;

class DoubleLinkedList
{
    private $head;
    private $tail;

    function __construct()
    {
        $this->head = new Node(null, null);
        $this->tail = new Node(null, null);

        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;
    }

    function head() {
        return $this->head->next;
    }

    function tail() {
        return $this->tail->prev;
    }

    function push(Node $node) {
        if($this->isEmpty()) {
            $node->prev = $this->head;
            $node->next = $this->tail;

            $this->head->next = $node;
            $this->tail->prev = $node;
        }
        else {
            $currentFirst = $this->head();

            $node->prev = $this->head;
            $node->next = $currentFirst;

            $this->head->next = $node;
            $currentFirst->prev = $node;
        }
    }

    function pop(): ?Node
    {
        if($this->isEmpty()) {
            return null;
        }

        $node = $this->tail();

        $prevNode = $node->prev;
        $prevNode->next = $this->tail;
        $this->tail->prev = $prevNode;

        $node->next = null;
        $node->prev = null;

        return $node;
    }

    function moveToTop(Node $node)
    {
        if(! $this->isEmpty()) {
            $prevNode = $node->prev;
            $nextNode = $node->next;

            $prevNode->next = $nextNode;
            $nextNode->prev = $prevNode;

            $node->next = null;
            $node->prev = null;

            $this->push($node);
        }
    }

    function isEmpty() {
        return (
            $this->head->next == $this->tail 
            and $this->tail->prev == $this->head
        );
    }
}