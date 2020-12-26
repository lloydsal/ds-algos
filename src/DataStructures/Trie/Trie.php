<?php
namespace App\DataStructures\Trie;

/**
 * Explanation
 * -----------------
 * The Trie class will have a default root node that does not contain any alphabet.
 * All alphabets will be contained from the children hashmap
 * Hence in a full dictionary the $this->root->alphabet would be null
 * and children would be a hashMap with all alphabets as keys
*/
class Trie
{
    protected $root;

    function __construct()
    {
        $this->root = new Node(null, false);
    }

    /**
     * This will add any string as a word to the trie and mark the last node (alphabet as isTerminal=true) to indicate the end of the word
     * If part of the word already exists, it will simply continue till it ends up storing the entire word in the tree.
    */
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

    /**
     * Will check if the given word is a full word in the dictionary ( trie )
    */
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

    /**
     * This will take a prefix and send a list of possible words with that prefix.
    */
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