<?php
const EMAIL_FIELD_NAME = 'email';
const FIRST_NAME_FIELD_NAME = 'first_name';
const LAST_NAME_FIELD_NAME = 'last_name';
const AGE_FIELD_NAME = 'age';

const FORM_FIELDS = [
    FIRST_NAME_FIELD_NAME => 'First Name',
    LAST_NAME_FIELD_NAME => 'Last Name',
    EMAIL_FIELD_NAME => 'Email',
    AGE_FIELD_NAME => 'Age',
]; 

header('Content-Type: text/plain');
$userEmail = $_GET[EMAIL_FIELD_NAME];

if(!file_exists("data/$userEmail.txt"))
{
	exit('I need ' . EMAIL_FIELD_NAME);
}
$dataset = json_decode(file_get_contents("data/$userEmail.txt"), true);

foreach (FORM_FIELDS as $field => $name)
{
    echo "\n" . $name . ': ' . (isset($dataset[$field]) ? $dataset[$field] : ' ');
}	