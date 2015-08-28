<?php

namespace Andela\Dictionary\Tests;

use Andela\Dictionary\Data as Data;
use Andela\Dictionary\WordFunctions as WordFunctions;

class WordFunctionsTest extends \PHPUnit_Framework_TestCase {
	public function testCalculate() {
		$this->assertTrue ( true );
	}
	/**
	 * Tests for the addWord() function in the WordFunctions Test
	 */
	public function testAddWord() {
		$word = new WordFunctions ();
		$word->addWord ( 'park', 'Tell someone to relax', 'Guy park well o' );
		
		$this->assertArrayHasKey ( 'park', Data::$data );
	}
	
	/**
	 * Tests for the updateWord() function in the WordFunctions Test
	 */
	public function testUpdateWord() {
		$word = new WordFunctions ();
		$word->addWord ( 'park', 'Tell someone to relax', 'Guy park well o' );
		$word->updateWord ( 'park', 'A car park', 'An updated Test' );
		$this->assertEquals ( 'park', Data::$data ['park'] ['slang'] );
		$this->assertEquals ( 'A car park', Data::$data ['park'] ['description'] );
		$this->assertEquals ( 'An updated Test', Data::$data ['park'] ['sample-sentence'] );
	}
	
	/**
	 * Tests for the findWord() function in the WordFunctions Test
	 */
	public function testFindWord() {
		$word = new WordFunctions ();
		$word->addWord ( 'gear', 'To attack someone', 'Gear am Gear am' );
		$foundWord = $word->findWord ( 'gear' );
		$this->assertEquals ( 'gear', $foundWord ['slang'] );
		$this->assertEquals ( 'To attack someone', $foundWord ['description'] );
		$this->assertEquals ( 'Gear am Gear am', $foundWord ['sample-sentence'] );
	}
	
	/**
	 * Tests for the removeWord() function in the WordFunctions Test
	 */
	public function testRemoveWord() {
		$word = new WordFunctions ();
		$word->addWord ( 'gear', 'To attack someone', 'Gear am Gear am' );
		$word->removeWord ( 'gear' );
		$this->assertFalse ( isset ( Data::$data ['gear'] ) );
	}
	
	/**
	 * Tests for the wordRanking() function in the WordFunctions Test
	 */
	public function testWordRanking() {
		$word = new WordFunctions ();
		$ranking = $word->wordRanking ( "Hello it is nice to tell if it is cool to say rubbish" );
		$this->assertArrayHasKey ( 'hello', $ranking );
		$this->assertArrayHasKey ( 'it', $ranking );
		$this->assertArrayHasKey ( 'is', $ranking );
		$this->assertArrayHasKey ( 'nice', $ranking );
		$this->assertArrayHasKey ( 'to', $ranking );
		$this->assertArrayHasKey ( 'tell', $ranking );
		$this->assertArrayHasKey ( 'if', $ranking );
		$this->assertArrayHasKey ( 'cool', $ranking );
		$this->assertArrayHasKey ( 'say', $ranking );
		$this->assertArrayHasKey ( 'rubbish', $ranking );
		
		$this->assertEquals ( 1, $ranking ['hello'] );
		$this->assertEquals ( 2, $ranking ['it'] );
		$this->assertEquals ( 2, $ranking ['is'] );
		$this->assertEquals ( 1, $ranking ['nice'] );
		$this->assertEquals ( 2, $ranking ['to'] );
		$this->assertEquals ( 1, $ranking ['tell'] );
		$this->assertEquals ( 1, $ranking ['if'] );
		$this->assertEquals ( 1, $ranking ['cool'] );
		$this->assertEquals ( 1, $ranking ['say'] );
		$this->assertEquals ( 1, $ranking ['rubbish'] );
	}
}
 