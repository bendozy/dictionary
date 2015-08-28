# andela/dictionary


**AN URBAN DICTIONARY**
This is a PHP agnostic package that returns meaning of slangs and sample usage of the slang

## Install

Clone the application github url and run composer install

## Usage

``` 
    php
    
    $word = new \Andela\Dictionary\WordFunctions();

    print_r(\Andela\Dictionary\Data::$data);

    $word->addWord ( 'park', 'Tell someone to relax', 'Guy park well o' );
    print_r(\Andela\Dictionary\Data::$data);

    $word->updateWord ( 'park', 'Modified Description', 'Modified Sentence' );
    print_r(\Andela\Dictionary\Data::$data);

    print_r($word->findWord('park'));

    $word->removeWord('park')
    print_r(\Andela\Dictionary\Data::$data);

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```



## Credits

- Chidozie Ijeomah




[link-author]: https://github.com/andela-cijeomah
