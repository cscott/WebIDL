<?php
$cfg = require __DIR__ . '/../vendor/mediawiki/mediawiki-phan-config/src/config.php';

$cfg['directory_list'] = [
	'src',
	'tests',
	'.phan/stubs',
];
$cfg['suppress_issue_types'] = [];

# Exclude peg-generated output
$cfg['exclude_file_list'][] = "src/Grammar.php";

return $cfg;
