<?php
namespace PHPUnit\Framework;

abstract class Assert {
	/**
	 * Asserts that two variables are equal.
	 *
	 * @throws ExpectationFailedException
	 * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
	 */
	public static function assertEquals( $expected, $actual, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false ): void {
	}
}
