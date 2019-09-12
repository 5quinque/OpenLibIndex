<?php

require 'dbo.php';
require 'book.php';
require 'json.php';

$db = new DBO();
$json = new JSON("../dump.json", $db);
$json->readJSON();
