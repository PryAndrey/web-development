<?php 
header("Content-Type: text/plain");
define("DATA_PATH", "data/email.txt");
$fields_to_bind = [
    'first_name',
    'last_name',
    'email',
    'age' ];    
$required_fields = ['email'];
$dataset = [];
foreach ($required_fields as $val)
    if(empty($_GET[$val])) exit();
foreach ($fields_to_bind as $field)
    if(isset($_GET[$field])) $dataset[$field]=$_GET[$field];
file_put_contents(DATA_PATH, json_encode($dataset));
echo('Thanks');
?>
