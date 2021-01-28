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
		$goodlist = [
			"allowany",
			"argument-constructor",
			"argument-extattrs",
			"async-iterable",
			"async-name",
			"attributes",
			"bigint",
			"callback",
			"constants",
			"constructor",
			"default",
			"dictionary-inherits",
			"dictionary",
			"documentation-dos",
			"documentation",
			"enum",
			"equivalent-decl",
			"escaped-name",
			"escaped-type",
			// "extended-attributes",
			"generic",
			"getter-setter",
			"identifier-hyphen",
			"identifier-qualified-names",
			"includes-name",
			"indexed-properties",
			// "inherits-getter",
			"interface-inherits",
			"iterable",
			"maplike",
			// "mixin",
			"namedconstructor",
			"namespace",
			"nointerfaceobject",
			"nullable",
			"nullableobjects",
			"obsolete-keywords",
			"operation-optional-arg",
			"overloading",
			"overridebuiltins",
			"partial-interface",
			"primitives",
			// "promise-void",
			"prototyperoot",
			"putforwards",
			// "record",
			//"reflector-interface",
			"reg-operations",
			"replaceable",
			"sequence",
			"setlike",
			// "static",
			//"stringifier-attribute",
			//"stringifier-custom",
			//"stringifier",
			"treatasnull",
			"treatasundefined",
			"typedef-union",
			"typedef",
			"typesuffixes",
			"undefined",
			"uniontype",
			"variadic-operations",
		];
		if ( !in_array( $filename, $goodlist, true ) ) {
			$this->markTestSkipped( "AST construction not yet implemented" );
			return;
		}
		$input = file_get_contents( __DIR__ . "/syntax/idl/" . $filename . ".webidl" );
		$baseline = file_get_contents( __DIR__ . "/syntax/baseline/" . $filename . ".json" );
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
