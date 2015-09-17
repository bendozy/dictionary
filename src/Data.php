<?php

/**
 * Created by PhpStorm.
 * User: Chidozie Ijeomah
 * Date: 8/26/15
 * Time: 1:12 PM
 * @version GIT: $Id$ In development. For Testing
 */
namespace Andela\Dictionary;

/**
 * Class Data
 *
 * A class that possess a static function that
 * returns an associative array that contains urban words.
 *
 * @package Andela\Dictionary
 * @authour Chidozie
 */
class Data
{

	/**
	 *
	 * @var array Contains an array of Slangs, their descriptions and sample sentences they are used in
	 * @author Chidozie Ijeomah
	 */
	public static $data = [
		'tight' => [
			'slang' => 'tight',
			'description' => 'When someone performs an awesome task',
			'sample-sentence' => 'When someone performs an awesome task'
		],
		'flop' => [
			'slang' => 'flop',
			'description' => 'A planned event does not happen',
			'sample-sentence' => 'Last night was flop. I was supposed to go to a party with my friends, but they flopped on me. '
		],
		'sick' => [
			'slang' => 'sick',
			'description' => 'Something being awesome or cool',
			'sample-sentence' => 'I got a job promotion even though I don’t go to work half the time. I’m so sick.'
		],
		'hater' => [
			'slang' => 'hater',
			'description' => 'Someone who is jealous or angry towards another person because of their success',
			'sample-sentence' => 'I can’t believe she went and told my father about everything just to get me in trouble, what a hater.'
		],
		'third-degree' => [
			'slang' => 'third-degree',
			'description' => 'To be interrogated by',
			'sample-sentence' => 'The students caught cheating on the test were given the third-degree by the principle.'
		]
	];
}