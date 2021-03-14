<?php 
header("Content-Type: text/plain");
if(empty($_GET['text'])) exti('Empty input string.');
$text = $_GET['text'];
if(!preg_match('/^[a-zA-Z0-9]+$/', $text)) exit('Password can contain only alphabetical letters and numbers.');
$len = strlen($text);
$charsUsed = array();
$charsUsedAgain = array();
$digits = 0; $upreg = 0; $downreg = 0; $repeated = 0;
for ($i=0; $i<$len; $i++) 
{
    $char = $text[$i];
    if(in_array($char, $charsUsedAgain)) 
	{
	   $repeated++;
    } elseif(in_array($char, $charsUsed)) 
	{
       $repeated += 2;
       $charsUsedAgain[] = $char;
    } else $charsUsed[] = $char;
	
    if(('0' <= $char) && ('9' >= $char)) $digits++;
    elseif(ctype_upper($char)) $upreg++;
    elseif(ctype_lower($char)) $downreg++;
}
$strength = 0;
$strength += 4 * $len;
$strength += 4 * $digits;
if($upreg != 0) $strength += 2 * ($len - $upreg);
if($downreg != 0) $strength += 2 * ($len - $downreg);
if($digits < 1) $strength -= $len;
if($digits == $len) $strength -= $len;

$strength -= $repeated;
echo('Strength: '.$strength);
?>
