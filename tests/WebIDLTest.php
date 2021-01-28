<?php

namespace Wikimedia\WebIDL\Tests;

use Wikimedia\WebIDL\WebIDL;
use WikiPEG\SyntaxError;

class WebIDLTest extends \PHPUnit\Framework\TestCase {

	/**
	 * @dataProvider invalidTestsProvider
	 */
	public function testInvalidWebIDL( string $filename ) {
		$input = file_get_contents( __DIR__ . "/invalid/idl/" . $filename . ".webidl" );
		$baseline = file_get_contents( __DIR__ . "/invalid/baseline/" . $filename . ".txt" );

		if ( !preg_match( '/Syntax error/', $baseline ) ) {
			$this->markTestSkipped( "we only check syntax errors" );
		} elseif ( preg_match( '/Illegal double extended attribute lists/', $baseline ) ) {
			$this->markTestSkipped( "we only check syntax errors" );
		} elseif ( preg_match( '/Exposed=\(\)/', $baseline ) ) {
			$this->markTestSkipped( "we only check syntax errors" );
		} elseif ( preg_match( '/Attributes cannot accept sequence types/', $baseline ) ) {
			$this->markTestSkipped( "we only check syntax errors" );
		} else {
			$this->expectException( SyntaxError::class );
		}

		WebIDL::parse( $input, [ 'sourceName' => $filename ] );
	}

	/**
	 * @dataProvider validTestsProvider
	 */
	public function testValidWebIDL( string $filename ) {
		$input = file_get_contents( __DIR__ . "/syntax/idl/" . $filename . ".webidl" );
		$baseline = file_get_contents( __DIR__ . "/syntax/baseline/" . $filename . ".json" );
		$actual = WebIDL::parse( $input, [
			'sourceName' => $filename . ".webidl",
			'concrete' => true,
		] );
		$expected = json_decode( $baseline, true );
		if ( $filename !== "escaped-name" ) {
			$this->markTestSkipped( "AST construction not yet implemented" );
		}
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
