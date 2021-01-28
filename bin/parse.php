<?php
require_once __DIR__ . "/../vendor/autoload.php";

global $argv;

$filename = $argv[1];
$options = [
	'sourceName' => $filename,
	'concrete' => true,
];
$ast = \Wikimedia\WebIDL\WebIDL::parse( file_get_contents( $filename ), $options );
$json = json_encode( $ast, JSON_PRETTY_PRINT );
echo( "$json\n" );
