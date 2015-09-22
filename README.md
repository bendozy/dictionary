#Urban Dictionary

The Dictionary is a PHP agnostic package
that returns meaning of slangs and 
sample usage of the slang.

#Design

Classes
 - Data: The Data Class that houses the dictionary array
 - Dictionary: This is the Class that houses the five core
   methods of the application which are as follows
   -addWord($word);
   -updateWord($word);
   -findWord($word);
   -removeWord($word);
   -rankWords($sentence)


#Testing

 The framework for testing this application is 
 phpunit and the TDD principle was used to 
 make sure that the code was well tested.
 
  ```````
 php vendor/phpunit/phpunit/phpunit
  `````````

#Install

- To install this package from packagelist, PHP 5.0+ and Composer are required

````
composer require andela/dictionary
``````
#Install

The sample codes below shows how to use this package

- To instantiate the Dictionary Class
 

 ```````
  $dictionary = new \Andela\Dictionary\Dictionary();
 ```````
 
- To add the slang "park", it's meaning "Tell someone to relax", and sample usage "Guy park well o"

 ````
 $dictionary->addWord('park', 'Tell someone to relax', 'Guy park well o')
 ````
 
- To update the slang "park"

  ```````
  $dictionary->updateWord('park', 'A car park', 'An updated Test');
  ```````
  
- To find the slang "park"

  ```````
  $dictionary->findWord('park');
  ```````

- To remove the slang "park"

  ```````
  $dictionary->removeWord('park');
  ```````
  
- To test for word ranking

  ```````
  $word = new \Andela\Dictionary\Dictionary();
  $word->rankWords("Hello it is nice to tell if it is cool to say rubbish");
  ```````

## Change log
Please refer to [CHANGELOG](CHANGELOG.mds) file for information on what has changed recently.

## Contributing
Please check out [CONTRIBUTING](CONTRIBUTING.md) file for detailed contribution guidelines.

## Credits
Andela urban Dictionary is maintained by [Chidozie Ijeomah](https://github.com/andela-cijeomah).

## License
Andela urban Dictionary  is released under the MIT Licence. See the bundled [LICENSE](LICENSE.md) file for details.

