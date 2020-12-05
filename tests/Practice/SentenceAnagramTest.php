<?php
namespace Tests\Practice;

use App\Practice\SentenceAnagram;
use PHPUnit\Framework\TestCase;

class SentenceAnagramTest extends TestCase
{
	/**
	 * @dataProvider providerSentenceAnagram
	*/
	function testSentenceAnagram($sentence, $expected)
	{
		$anagram = new SentenceAnagram();
		$this->assertEquals($expected, $anagram->findAnagrams($sentence));
	}

	function providerSentenceAnagram()
	{
		return [
			['', []],
			['abc ab', []],
			['abc abc', []],
			['abc abcd', []],
			['abc cab bac', ['abc']],
			['night study dusty act cat save tac vase', ['study', 'act', 'save']],
		];
	}
}