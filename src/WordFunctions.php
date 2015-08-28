<?php

namespace Andela\Dictionary;

/**
 * Class WordFunctions
 *
 * A group of functions that contain the solutions for Checkpoint one
 * @author  Chidozie Ijeomah
 * @package Andela\Dictionary
 */
class WordFunctions {
    
    /**
     * Initialize the constructor
     */
    public function __construct(){
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
     */
    public function addWord($word, $desc, $sentence) {
        if (! isset (Data::$data [$word])) {
            Data::$data [$word] = [ 
                    'slang' => $word,
                    'description' => $desc,
                    'sample-sentence' => $sentence 
            ];
        } else {
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
     */
    public function updateWord($word, $desc, $sentence) {
        if (isset (Data::$data [$word])){
            Data::$data [$word] = [ 
                    'slang' => $word,
                    'description' => $desc,
                    'sample-sentence' => $sentence 
            ];
        } else {
        }
    }
    
    /**
     * Get the full detail of a word that is added to the dictionary array
     *
     * @param string $word
     *            the word to be found in the dictionary
     * @return array Returns an array containing th slang, description and sample sentence
     */
    public function findWord($word) {
        if (isset ( Data::$data [$word] )) {
            return Data::$data [$word];
        } else {
            return null;
        }
    }
    
    /**
     * Remove a word and it's attributes from the dictionary array
     *
     * @param string $word
     *            the word to be removed
     */
    public function removeWord($word) {
        if (isset ( Data::$data [$word] )) {
            unset ( Data::$data [$word] );
        } else {
        }
    }
    
    /**
     * Group the same words according to the number of occurrences in a given sentence.
     *
     * @param string $sentence
     *            the sentence that contains the words to be groups
     * @return array An array of the words with the number of individual occurrences
     */
    public function wordRanking($sentence) {
        $words = str_word_count ( $sentence, 1 );
        $ranking = [ ];
        $tag = [ ];
        $count = [ ];
        
        foreach ( $words as $word ) {
            if (isset ( $ranking [strtolower ( $word )] )) {
                $ranking [strtolower ( $word )] = $ranking [strtolower ( $word )] + 1;
            } else {
                $ranking [strtolower ( $word )] = 1;
            }
        }
        foreach ( $ranking as $key => $value ) {
            $tag [] = $key;
            $count [] = $value;
        }
        array_multisort ( $count, SORT_DESC, $tag, SORT_ASC, $ranking );
        return $ranking;
    }
}