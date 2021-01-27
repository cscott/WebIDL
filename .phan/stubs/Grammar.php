<?php

namespace Wikimedia\WebIDL;

class Grammar extends \WikiPEG\PEGParserBase {
	/**
	 * @param string $filename
	 * @param string $contents
	 * @return array
	 */
	public static function load( string $filename, string $contents ) {
	}

	/**
	 * @param string $input Input string
	 * @param array $options Parse options
	 * @return mixed Result of the parse
	 */
	public function parse( $input, $options = [] ) {
		return null;
	}
}
