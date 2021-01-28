<?php

namespace Wikimedia\WebIDL\Tests;

use Wikimedia\WebIDL\WebIDL;
use WikiPEG\SyntaxError;

/**
 * Run test cases from webidl2.js, found in `tests/invalid` and
 * `tests/syntax` subdirectories.
 *
 * Currently we are using test from commit
 * 9e8b5a0247f2cffccc6265c6577f98a0883d3a60 of
 * https://github.com/w3c/webidl2.js/tree/gh-pages/test
 *
 * PLEASE UPDATE THE HASH ABOVE WHEN YOU UPDATE THESE TESTS
 * FROM UPSTREAM.
 */
class WebIDLTest extends \PHPUnit\Framework\TestCase {

	/**
	 * Test WebIDL inputs with a variety of syntax and validation
	 * errors.  Currently we do not validate, we only check syntax
	 * (as a side-effect of parsing).
	 *
	 * @dataProvider invalidTestsProvider
	 */
	public function testInvalidWebIDL( string $filename ) {
		$input = file_get_contents(
			__DIR__ . "/invalid/idl/" . $filename . ".webidl"
		);
		$baseline = file_get_contents(
			__DIR__ . "/invalid/baseline/" . $filename . ".txt"
		);

		if ( !preg_match( '/Syntax error/', $baseline ) ) {
			$this->markTestSkipped( "We only check syntax errors" );
		} elseif (
			// A few validation errors are (incorrectly) marked as
			// syntax errors, likely because webidl2.js has a more
			// restrictive syntax for Extended Attributes than the
			// one officially defined in the spec.
			preg_match( '/Illegal double extended attribute lists/', $baseline ) ||
			preg_match( '/Exposed=\(\)/', $baseline ) ||
			preg_match( '/Attributes cannot accept sequence types/', $baseline )
		) {
			$this->markTestSkipped( "This is a validation error" );
		} else {
			$this->expectException( SyntaxError::class );
		}

		WebIDL::parse( $input, [ 'sourceName' => $filename ] );
	}

	/**
	 * Test valid WebIDL input and ensure the output is identical to the
	 * baseline output given for webidl2.js.
	 *
	 * @dataProvider validTestsProvider
	 */
	public function testValidWebIDL( string $filename ) {
		$input = file_get_contents(
			__DIR__ . "/syntax/idl/" . $filename . ".webidl"
		);
		$baseline = file_get_contents(
			__DIR__ . "/syntax/baseline/" . $filename . ".json"
		);
		$actual = WebIDL::parse( $input, [
			'sourceName' => $filename . ".webidl",
			'concrete' => true,
		] );
		$expected = json_decode( $baseline, true );
		$this->assertEquals( $expected, $actual );
	}

	public function invalidTestsProvider() {
		return self::listFiles( __DIR__ . "/invalid/idl/" );
	}

	public function validTestsProvider() {
		return self::listFiles( __DIR__ . "/syntax/idl/" );
	}

	private static function listFiles( $dirname ) {
		$result = [];
		foreach ( scandir( $dirname ) as $entry ) {
			if ( substr( $entry, 0, 1 ) === "." ) {
				continue;
			}
			if ( substr( $entry, -7 ) !== ".webidl" ) {
				continue;
			}
			$result[] = [ substr( $entry, 0, -7 ) ];
		}
		return $result;
	}
}
