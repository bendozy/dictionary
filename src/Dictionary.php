<?php

namespace Andela\Dictionary;

use InvalidArgumentException;

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
	public function __construct($init_data)
	{
        if(! isset($init_data)) {
	        $this->data = Data::$data;
        }

		$this->data = $init_data;


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
		if(! array_key_exists($word, $this->data)){

			$this->data[$word] = [
				'slang' => $word,
				'description' => $desc,
				'sample-sentence' => $sentence
			];

		} else {
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
		$data = $this->data[$word];

		if(array_key_exists($word, $this->data)){

			$data['description'] = $desc;
			$data['sample-sentence'] = $sentence;
			$this->data[$word] = $data;

		} else {
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

		if(array_key_exists($word, $this->data)){
			return $this->data[$word];
		} else {
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

		if(array_key_exists($word, $this->data)){
			unset ($this->data[$word]);
		} else {
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
	public function rankWords($sentence)
	{

		$words = str_word_count($sentence, 1);
		$ranking = [];
		$tag = [];
		$count = [];

		foreach($words as $word){

			if(isset($ranking[strtolower($word)])){
				$ranking[strtolower($word)]++;
			} else {
				$ranking [strtolower($word)] = 1;
			}

		}

		$this->sortWords($ranking);

		return $ranking;
	}

	private function sortWords(array $ranking)
	{
		if(! is_array($ranking)){
			throw new InvalidArgumentException("The method argument must be of type array");
		}

		foreach($ranking as $key => $value){
			$tag [] = $key;
			$count [] = $value;
		}

		array_multisort($count, SORT_DESC, $tag, SORT_ASC, $ranking);
	}
}