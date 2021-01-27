<?php
require_once __DIR__ . "/../vendor/autoload.php";

global $argv;
var_dump(\Wikimedia\WebIDL\WebIDL::parse(file_get_contents($argv[1])));
