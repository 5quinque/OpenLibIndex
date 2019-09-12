<?php

require 'dbo.php';
require 'book.php';
require 'json.php';

unset($_SERVER["argv"][0]);
if (!is_array($_SERVER["argv"]) || empty($_SERVER["argv"])) {
  print("Usage: php run.php [OPTIONS] filename\n\n");
  print("Options:\n");
  print("-d, --description\t\tParse a description JSON file\n");
  exit;
}

$args = array();
foreach ($_SERVER["argv"] as $arg) {
  $args[] = $arg;
}

$description = false;
$filename = "";

for ($i=0; $i < count($args); $i++) {
  $arg = $args[$i];

  if ($arg == "-d" || $arg=="--description") {
    $description = true;
  } else {
    $filename = $args[$i];
  }
}

$db = new DBO();
$json = new JSON($filename, $db);

if ($description) {
  $db->prepareDescIns();
  $json->readDescriptionJSON();
} else {
  $db->prepareStatements();
  $json->readDumpJSON();
}
