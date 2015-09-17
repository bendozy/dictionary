<?php

namespace Andela\Dictionary\Tests;

use Andela\Dictionary\Data as Data;
use Andela\Dictionary\Dictionary as Dictionary;

class DictionaryTest extends \PHPUnit_Framework_TestCase
{

	protected $dictionary;

	public function setUp()
	{
		$this->dictionary = new Dictionary();
		$this->dictionary->setData(Data::$data);
	}

	/**
	 * Initial Tests
	 */
	public function testCalculate()
	{
		$this->assertTrue(true);
	}

	/**
	 * Tests for the addWord() function in the Dictionary Test
	 */
	public function testAddWord()
	{

		$this->dictionary->addWord('park', 'Tell someone to relax', 'Guy park well o');
		$this->assertArrayHasKey('park', $this->dictionary->getData());

	}

	/**
	 * Tests for the updateWord() function in the Dictionary Test
	 */
	public function testUpdateWord()
	{

		$this->dictionary->addWord('park', 'Tell someone to relax', 'Guy park well o');
		$this->dictionary->updateWord('park', 'A car park', 'An updated Test');
		$this->assertEquals('park', $this->dictionary->getData()['park']['slang']);
		$this->assertEquals('A car park', $this->dictionary->getData()['park']['description']);
		$this->assertEquals('An updated Test', $this->dictionary->getData()['park']['sample-sentence']);
	}

	/**
	 * Tests for the findWord() function in the Dictionary Test
	 */
	public function testFindWord()
	{
		$this->dictionary->addWord('gear', 'To attack someone', 'Gear am Gear am');
		$foundWord = $this->dictionary->findWord('gear');
		$this->assertEquals('gear', $foundWord ['slang']);
		$this->assertEquals('To attack someone', $foundWord ['description']);
		$this->assertEquals('Gear am Gear am', $foundWord ['sample-sentence']);
	}

	/**
	 * Tests for the removeWord() function in the Dictionary Test
	 */
	public function testRemoveWord()
	{
		$this->dictionary->addWord('gear', 'To attack someone', 'Gear am Gear am');
		$this->dictionary->removeWord('gear');
		$this->assertFalse(isset($this->dictionary->getData()['gear']));
	}

	/**
	 * Tests for the wordRanking() function in the Dictionary Test
	 */
	public function testWordRanking()
	{
		$word = new Dictionary ();
		$ranking = $word->wordRanking("Hello it is nice to tell if it is cool to say rubbish");
		$this->assertArrayHasKey('hello', $ranking);
		$this->assertArrayHasKey('it', $ranking);
		$this->assertArrayHasKey('is', $ranking);
		$this->assertArrayHasKey('nice', $ranking);
		$this->assertArrayHasKey('to', $ranking);
		$this->assertArrayHasKey('tell', $ranking);
		$this->assertArrayHasKey('if', $ranking);
		$this->assertArrayHasKey('cool', $ranking);
		$this->assertArrayHasKey('say', $ranking);
		$this->assertArrayHasKey('rubbish', $ranking);

		$this->assertEquals(1, $ranking ['hello']);
		$this->assertEquals(2, $ranking ['it']);
		$this->assertEquals(2, $ranking ['is']);
		$this->assertEquals(1, $ranking ['nice']);
		$this->assertEquals(2, $ranking ['to']);
		$this->assertEquals(1, $ranking ['tell']);
		$this->assertEquals(1, $ranking ['if']);
		$this->assertEquals(1, $ranking ['cool']);
		$this->assertEquals(1, $ranking ['say']);
		$this->assertEquals(1, $ranking ['rubbish']);
	}
}
 