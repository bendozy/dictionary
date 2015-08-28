
<?php
require_once "vendor/autoload.php";

$word = new \Andela\Dictionary\WordFunctions ();

// var_dump(\Andela\Dictionary\Data::$data);

$word->addWord ( 'park', 'Tell someone to relax', 'Guy park well o' );

// var_dump(\Andela\Dictionary\Data::$data);

var_dump ( $word->wordRanking ( "Hello hello fri3nd, you're
       looking          good today!" ) );