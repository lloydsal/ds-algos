<?php
namespace Tests\DataStructures\Trie;

use App\DataStructures\Trie\Node;
use PHPUnit\Framework\TestCase;

class NodeTest extends TestCase
{
    function testAddChild() {
        $nodeA = new Node('a');
        $nodeB = new Node('b');

        $nodeA->addChild($nodeB);
        $this->assertTrue($nodeA->hasChild('b'));
    }

    function testGetChild(){
        $nodeA = new Node('a');
        $nodeB = new Node('b');
        $nodeA->addChild($nodeB);
        $this->assertEquals($nodeB, $nodeA->getChild('b'));
        $this->assertNull($nodeA->getChild('z'));
    }
}