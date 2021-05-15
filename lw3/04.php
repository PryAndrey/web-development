<?php 
const EMAIL_FIELD_NAME = 'email';
const FIRST_NAME_FIELD_NAME = 'first_name';
const LAST_NAME_FIELD_NAME = 'last_name';
const AGE_FIELD_NAME = 'age';

const FORM_FIELDS = [
    FIRST_NAME_FIELD_NAME,
    LAST_NAME_FIELD_NAME,
    EMAIL_FIELD_NAME,
    AGE_FIELD_NAME,
];    

const IMPORTTANT_FIELDS = [
    EMAIL_FIELD_NAME,
];

header('Content-Type: text/plain');

foreach (IMPORTTANT_FIELDS as $fieldName)
{    
    if(empty($_GET[$fieldName])) 
	{
		exit("I need $fieldName");
	}
}	

$dataset = [];
foreach (FORM_FIELDS as $field)
{
	if(isset($_GET[$field])) 
	{
		$dataset[$field] = $_GET[$field];
	}
}

$userEmail = $dataset[EMAIL_FIELD_NAME];
file_put_contents("data/$userEmail.txt", json_encode($dataset));
echo('Thanks');