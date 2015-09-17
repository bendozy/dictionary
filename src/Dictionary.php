<?php

namespace Andela\Dictionary;

/**
 * Class WordFunctions
 *
 * A group of functions that contain the solutions for Checkpoint one
 * @author  Chidozie Ijeomah
 * @package Andela\Dictionary
 */
class Dictionary
{

	private $data;

	/**
	 * Initialize the constructor
	 */
	public function __construct()
	{

		$this->data = Data::$data;

	}

	/**
	 * @return array
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @param array $data
	 */
	public function setData($data)
	{
		$this->data = $data;
	}

	/**
	 * Adds a word, it's description and sample sentence to the dictionary array in the
	 * Data class.
	 *
	 * @param string $word
	 *            the word to be added to the dictionary
	 * @param string $desc
	 *            the description of the word
	 * @param string $sentence
	 *            a sample sentence in which the word is used in
	 *
	 * @throws WordExistsException
	 */
	public function addWord($word, $desc, $sentence)
	{

		if(!isset($this->data[$word])){
			$this->data[$word] = [
				'slang' => $word,
				'description' => $desc,
				'sample-sentence' => $sentence
			];
		} else{
			throw new WordExistsException($word . ' already exists in the dictionary');
		}

	}

	/**
	 * Updates the description and sample sentence of a word in the dictionary array of the
	 * Data class.
	 *
	 * @param string $word
	 *            the word to be updated in the dictionary
	 * @param string $desc
	 *            the updated description of the word
	 * @param string $sentence
	 *            an updated sample sentence
	 *
	 * @throws WordNotFoundException
	 */
	public function updateWord($word, $desc, $sentence)
	{

		if(isset($this->data[$word])){
			$this->data[$word] = [
				'slang' => $word,
				'description' => $desc,
				'sample-sentence' => $sentence
			];
		} else{
			throw new WordNotFoundException($word . ' not found in the dictionary');
		}

	}

	/**
	 * Get the full detail of a word that is added to the dictionary array
	 *
	 * @param string $word
	 *            the word to be found in the dictionary
	 *
	 * @throws WordNotFoundException
	 * @return array Returns an array containing the slang, description and sample sentence
	 */
	public function findWord($word)
	{
		if(isset ($this->data[$word])){
			return $this->data[$word];
		} else{
			throw new WordNotFoundException($word . ' not found in the dictionary');
		}
	}

	/**
	 * Remove a word and it's attributes from the dictionary array
	 *
	 * @param string $word
	 *            the word to be removed
	 *
	 * @throws WordNotFoundException
	 */
	public function removeWord($word)
	{

		if(isset ($this->data[$word])){
			unset ($this->data[$word]);
		} else{
			throw new WordNotFoundException($word . ' not found in the dictionary');
		}

	}

	/**
	 * Group the same words according to the number of occurrences in a given sentence.
	 *
	 * @param string $sentence
	 *            the sentence that contains the words to be groups
	 *
	 * @return array An array of the words with the number of individual occurrences
	 */
	public function wordRanking($sentence)
	{

		$words = str_word_count($sentence, 1);
		$ranking = [];
		$tag = [];
		$count = [];

		foreach($words as $word){

			if(isset($ranking[strtolower($word)])){
				$ranking[strtolower($word)]++;
			} else{
				$ranking [strtolower($word)] = 1;
			}

		}

		foreach($ranking as $key => $value){
			$tag [] = $key;
			$count [] = $value;
		}

		array_multisort($count, SORT_DESC, $tag, SORT_ASC, $ranking);
		return $ranking;
	}
}