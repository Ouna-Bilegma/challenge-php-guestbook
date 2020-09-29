<?php
$file = "book.txt"; //create text document to save all messages
$data = date('Y-m-d\TH:i:s' . 'CEST'); //date format
$text = $_REQUEST['text']; //global variable
$name = $_REQUEST['name'];
if (@$_REQUEST['add']) {
  $f = fopen($file, "a");
  if (@$_REQUEST['text'] && @$_REQUEST['name']) fputs($f, '<span class="date-mess">' . $name . ' ' . $data . " </span><br>" . " <span class='message'>" . $text . "</span>" . "\n");
  fclose($f);
  $random = time();    // random parameter to not cache everything
  Header("Location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}?$random#form");
  exit();
}
$gb = @file($file);
if (!$gb) $gb = [];