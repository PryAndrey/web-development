<?php
  header("Content-Type: text/plain");
  $text = $_GET["text"];
  $text = trim($text);  
  echo preg_replace('/\s+/', ' ', $text); 
?>