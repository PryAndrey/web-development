<?php
  $text = $_GET["text"];
  $text = preg_replace('/\s+/', ' ', $text);
  header("Content-Type: text/plain");
  echo trim($text); 
?>
