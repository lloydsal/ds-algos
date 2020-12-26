<?php
namespace App\DataStructures\Trie;

class Trie
{
    protected $root;

    function __construct()
    {
        $this->root = new Node(null, false);
    }

    function addWord(string $word) {
        $chars = str_split(strrev($word));
        $node = $this->root;
        while(count($chars) > 0) {
            $alphabet = array_pop($chars);
            $isTerminal = count($chars) == 0;

            if($node->hasChild($alphabet)) {
                $node = $node->getChild($alphabet);
                if($isTerminal) {
                    $node->isTerminal = true;
                }
            }
            else {
                $node->addChild(new Node($alphabet, $isTerminal));
                $node = $node->getChild($alphabet);
            }
        }
    }

    function isWord(string $word): bool {
        $chars = str_split(strrev($word));

        $isWord = false;
        $node = $this->root;
        while(count($chars) > 0) {
            $alphabet = array_pop($chars);
            if($node->hasChild($alphabet)) {
                $node = $node->getChild($alphabet);
                if(count($chars) == 0){
                    return $node->isTerminal == true;
                }
            }
            else {
                $isWord = false;
                break;
            }
        }

        return $isWord;
    }

    function getSuggestions(string $prefix): array {
        $chars = str_split(strrev($prefix));
        $node = $this->root;
        while(count($chars) > 0) {
            $alphabet = array_pop($chars);
            if($node->hasChild($alphabet)) {
                $node = $node->getChild($alphabet);
            }
            else {
                return [];
            }
        }

        return $this->_suggestions($node, $prefix);
    }

    protected function _suggestions(Node $node, ?string $prefix): array {

        $suggestions = [];

        if($node->isTerminal) {
            $suggestions[] = $prefix;
        }

        if($node->hasChildren()) {
            foreach($node->getChildren() as $childNode) {
                $newPrefix = $prefix . $childNode->alphabet;
                $suggestions = array_merge($suggestions, $this->_suggestions($childNode, $newPrefix));
            }
        }

        return $suggestions;
    }
}