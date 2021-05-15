<?php 
header("Content-Type: text/plain");
if(empty($_GET['text'])) exit('NO - Empty input string.');
$text = $_GET['text'];

preg_match('/^[a-zA-Z][a-zA-Z0-9]+/', $text, $matches);
if(count($matches) < 1) exit('NO - Char at start offset \''.$text[0].'\' is not a alphabetic char.');
$match_len = strlen($matches[0]);
$remaining = strlen($text) - $match_len;
if($remaining != 0) exit('NO - Char at start offset '.$match_len.' \''.$text[$match_len].'\' is not a alphabetic char or digit.');
echo 'YES - all ok';
?>