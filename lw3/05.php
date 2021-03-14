<?php
header("Content-Type: text/plain");
define("DATA_PATH", "data/email.txt");
$fields = [
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'email' => 'Email',
    'age' => 'Age'];
$dataset = json_decode(file_get_contents(DATA_PATH), true);
foreach ($fields as $field => $name)
    echo "\n".$name.': '.(isset($dataset[$field]).' '?$dataset[$field]:' ');	
?>
