<?php
/**
 * Created by PhpStorm.
 * User: Chidozie Ijeomah
 * Date: 9/17/15
 * Time: 1:12 PM
 * @version GIT: $Id$ In development. For Testing
 */
namespace Andela\Dictionary;

/**
 * Class WordNotFoundException
 *
 * A exception class  for the Dictionary Class
 *
 * @package Andela\Dictionary
 *
 * @authour Chidozie Ijeomah
 */
class WordNotFoundException extends \Exception
{
	/**
	 * @var string
	 */
	protected $message;

	/**
	 * @param string $message
	 */
	public function __construct($message)
	{
		$this->message = $message;
	}

	/**
	 * @method getExceptionMessage
	 *
	 * returns an error message to the calling
	 * method.
	 *
	 * usage $e->getExceptionMessage();
	 *
	 * @return string
	 */
	public function getExceptionMessage()
	{
		return $this->message;
	}
} 