<?php

namespace Andela\Dictionary\Tests;

use Andela\Dictionary\Data as Data;
use Andela\Dictionary\Dictionary as Dictionary;

class DictionaryTest extends \PHPUnit_Framework_TestCase
{

	protected $dictionary;

	public function setUp()
	{
		$this->dictionary = new Dictionary(Data::$data);

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

		$this->assertEquals('gear', $foundWord['slang']);
		$this->assertEquals('To attack someone', $foundWord['description']);
		$this->assertEquals('Gear am Gear am', $foundWord['sample-sentence']);
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
	 * Tests for the rankWords() function in the Dictionary Test
	 */
	public function testWordRanking()
	{
		$ranking = $this->dictionary->rankWords("Hello it is nice to tell if it is cool to say rubbish");

		foreach($ranking as $key => $value){
			$this->assertArrayHasKey($key, $ranking);
			$this->assertEquals($value, $ranking[$key]);
		}

	}
}
 