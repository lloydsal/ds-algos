<?php
namespace App\DataStructures\Trie;

class Node 
{
    public $alphabet;
    public $isTerminal;
    protected $children = [];

    function __construct(?string $alphabet, bool $isTerminal = false)
    {
        $this->alphabet = $alphabet;
        $this->isTerminal = $isTerminal;
    }

    function hasChild(string $alphabet): bool {
        return isset($this->children[$alphabet]);
    }

    function hasChildren() {
        return count($this->children) > 0;
    }

    function getChild(string $alphabet): ?Node {
        if($this->hasChild($alphabet)) {
            return $this->children[$alphabet];
        }

        return null;
    }

    function getChildren() {
        return $this->children;
    }

    function addChild(Node $node) {
        if(! $this->hasChild($node->alphabet)) {
            $this->children[$node->alphabet] = $node;
        }
    }
}