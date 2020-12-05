<?php

namespace App\Practice;

/**
 * Given a sentence, find all the words that are anagrams of eachother
 * Return a list of unique anagram words
 * e.g 'night study dusty act cat save tac vase'
 * returns study, act, save
 * 
 * note: should ignore duplicates words. Eg. if `cat cat` then cat is not an anagram
*/
class SentenceAnagram
{
	public function findAnagrams(string $sentence)
	{
		if ($sentence === '') return [];

		$anagramWords = [];
		$words = explode(' ', $sentence);

		if(is_array($words)){

			// create a map of words that are anagrams
			$map = [];
			foreach($words as $word){
				$chars = str_split($word);
				sort($chars);

				$sortedString = implode('', $chars);
				if(!isset($map[$sortedString])){
					$map[$sortedString] = [$word];
				} else {
					// If the same word already exists as the first word, then this is a duplicate and NOT an anagram
					if($map[$sortedString][0] !== $word){
						$map[$sortedString][] = $word;
					}
				}
			}
			
	
			// run through map and count words that have more than one word as anagram
			foreach($map as $key => $anagrams){
				if(count($anagrams) > 1) {
					$anagramWords[] = $anagrams[0];
				}
			}
		}
		return $anagramWords;
	}
}