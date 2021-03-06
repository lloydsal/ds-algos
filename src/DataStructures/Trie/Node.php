<?php
namespace App\DataStructures\Trie;

/**
 * Explanation:
 * ----------------------
 * The Node class will represent a single alphabet in the Trie ( or each node )
 * It contains a hash map of child nodes to indicate there are more chars forming a word after the current node
 * the `isTerminal` flag will indicate if the current node is a complete word. It does not mean that there are no
 * more possibilities.
*/
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

    function addChild(Node $node) {
        if(! $this->hasChild($node->alphabet)) {
            $this->children[$node->alphabet] = $node;
        }
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


}