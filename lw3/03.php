<?php 
header("Content-Type: text/plain");
if(empty($_GET['text'])) exit('Empty input string.');
$text = $_GET['text'];
if(!preg_match('/^[a-zA-Z0-9]+$/', $text)) 
	exit('Password can contain only alphabetical letters and numbers.');

$len = strlen($text);
$charsFirstUse = [];
$charsUsedAgain = [];
$digits = 0; 
$upreg = 0; 
$downreg = 0; 
$repeat = 0;

for ($i=0 ; $i < $len ; $i++) 
{
    $char = $text[$i];  //Проверка на повторы
    if(in_array($char, $charsUsedAgain)) 
	{
	   $repeat++;
    } 
	if(!in_array($char, $charsFirstUse)) 
	{
       $charsFirstUse[] = $char;
    } else 
	{
	   $repeat += 2;
       $charsUsedAgain[] = $char;
	}
	
    if(ctype_digit($char)) $digits++;
    if(ctype_upper($char)) $upreg++;
    if(ctype_lower($char)) $downreg++;
}
$strength = 0;
$strength += 4 * $len;
$strength += 4 * $digits;
if($upreg != 0) $strength += 2 * ($len - $upreg);
if($downreg != 0) $strength += 2 * ($len - $downreg);
if($digits < 1) $strength -= $len;
if($digits == $len) $strength -= $len;

$strength -= $repeat;
echo ('Strength: ' . $strength);
?>












