<?php 
header("Content-Type: text/plain");
define("DATA_PATH", "data/email.txt");
$fields = [
    'first_name',
    'last_name',
    'email',
    'age' ];    
$important_fields = ['email'];
$dataset = [];
foreach ($important_fields as $value)
    if(empty($_GET[$value])) exit();
foreach ($fields as $field)
    if(isset($_GET[$field])) $dataset[$field]=$_GET[$field];
file_put_contents(DATA_PATH, json_encode($dataset));
echo('Thanks');
?>
