<?php
namespace Tests\DataStructures\DoubleLinkedList;

use App\DataStructures\DoubleLinkedList\DoubleLinkedList;
use App\DataStructures\DoubleLinkedList\Node;
use PHPUnit\Framework\TestCase;

class DoubleLinkedListTest extends TestCase
{
    function testIsEmpty(){
        $list = new DoubleLinkedList();
        $this->assertTrue($list->isEmpty());

        $node = new Node(1, 1);
        $list->push($node);
        $this->assertFalse($list->isEmpty());
    }

    function testPush(){
        $node1 = new Node(1, 1);
        $list = new DoubleLinkedList();
        $list->push($node1);
        $this->assertEquals($node1->key, $list->head()->key);

        $node2 = new Node(2, 2);
        $list->push($node2);
        $this->assertEquals($node2->key, $list->head()->key);
        $this->assertEquals($node2->next->key, $node1->key);
    }

    function testPop() {
        $list = new DoubleLinkedList();
        $poppedNode = $list->pop();
        $this->assertEquals(null, $poppedNode);

        $node1 = new Node(1, 1);
        $list->push($node1);
        $poppedNode = $list->pop();
        $this->assertEquals($node1, $poppedNode);
    }

    function testMoveToTop() {
        /**
         * when 2 or more nodes
        */

        $list = new DoubleLinkedList();
        $list->moveToTop(new Node(0, 0));
        $this->assertTrue($list->isEmpty());

        $node1 = new Node(1, 1);
        $list->push($node1);
        $list->moveToTop($node1);
        $this->assertEquals($node1->key, $list->head()->key);

        $node2 = new Node(2, 2);
        $list->push($node2);
        $lastNode = $list->tail();
        $list->moveToTop($lastNode);
        $this->assertEquals($lastNode->key, $list->head()->key);
        $this->assertEquals($list->head()->next->key, $list->tail()->key);
    }
}
