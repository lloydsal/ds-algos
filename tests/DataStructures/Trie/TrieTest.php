<?php
namespace Tests\DataStructures\Trie;

use App\DataStructures\Trie\Trie;
use PHPUnit\Framework\TestCase;

class TrieTest extends TestCase
{
    /**
     * @dataProvider providerAddWord
    */
    function testAddWord($word) {
        $trie = new Trie();
        $trie->addWord($word);
        $this->assertTrue($trie->isWord($word));
    }

    function providerAddWord() {
        return [
            ['a'],
            ['ab'],
            ['zxc']
        ];
    }

    function testIsWord(){
        $trie = new Trie();
        $trie->addWord('ball');
        $trie->addWord('balance');
        $this->assertTrue($trie->isWord('ball'));
        $this->assertTrue($trie->isWord('balance'));

        $this->assertFalse($trie->isWord('bal'));
        $this->assertFalse($trie->isWord('balances'));
    }

    /**
     * @dataProvider providerGetSuggestions
    */
    function testGetSuggestions($words, $prefix, $suggestions) {
        $trie = new Trie();
        foreach($words as $word) {
            $trie->addWord($word);
        }
        $this->assertEquals($suggestions, $trie->getSuggestions($prefix));
    }

    function providerGetSuggestions() {
        return [
            [ ['boat', 'car', 'cars', 'care', 'card', 'cards'], 'd', [] ],
            [ ['boat', 'car', 'cars', 'care', 'card', 'cards'], 'b', ['boat'] ],
            [ ['boat', 'car', 'cars', 'care', 'card', 'cards'], 'c', ['car', 'cars', 'care', 'card', 'cards'] ],
            [ ['boat', 'car', 'cars', 'care', 'card', 'cards'], 'car', ['car', 'cars', 'care', 'card', 'cards'] ],
            [ ['boat', 'car', 'cars', 'care', 'card', 'cards'], 'card', ['card', 'cards'] ],
            [ ['boat', 'car', 'cars', 'care', 'card', 'cards'], 'cab', [] ],
        ];
    }
}