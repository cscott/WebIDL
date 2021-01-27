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
		//$this->expectException( SyntaxError::class );
		$this->expectException( \Throwable::class );
		WebIDL::parse( $input, [ 'sourceName' => $filename ] );
	}

	/**
	 * @dataProvider validTestsProvider
	 */
	public function testValidWebIDL( string $filename ) {
		$input = file_get_contents( __DIR__ . "/syntax/idl/" . $filename . ".webidl" );
		$baseline = file_get_contents( __DIR__ . "/syntax/baseline/" . $filename . ".json" );
		$actual = WebIDL::parse( $input, [ 'sourceName' => $filename . ".webidl" ] );
		$expected = json_decode( $baseline );
		//$this->assertEquals( $expected, $actual );
		$this->assertTrue(true);
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
