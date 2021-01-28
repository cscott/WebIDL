# WebIDL

__WebIDL__ is a parser for [Web
IDL](https://heycam.github.io/webidl/), a language [to specify web
APIs in interoperable
way](https://heycam.github.io/webidl/#introduction).  This library
supports PHP, and is in the same spirit as (but shares no code with)
[webidl2](https://github.com/w3c/webidl2.js) for JavaScript and the
browser.

Report issues on [Phabricator](https://phabricator.wikimedia.org/maniphest/task/edit/form/1/?projects=Parsoid&title=WebIDL:%20).

## Install

This package is [available on Packagist](https://packagist.org/packages/wikimedia/webidl):

```bash
$ composer require wikimedia/webidl
```

## Usage

WebIDL provides one function, `parse`, which converts a WebIDL string into a
syntax tree.

```php
use Wikimedia\WebIDL;

$tree = WebIDL::parse("string of WebIDL");
```

The `parse()` method optionally takes an option array with the following
keys:
* `concrete`: Boolean indicating whether the result should include an EOF node or not.
* `sourceName`: The source name, typically a filename.  Errors and validation objects can indicate their origin if you pass a value.

## AST (Abstract Syntax Tree)

The AST output matches the
[webidl2 AST docs](https://github.com/w3c/webidl2.js#ast-abstract-syntax-tree)
with PHP associative arrays replacing JavaScript objects in the usual way
(ie, JSON output deserialized in PHP with `json_decode($ast, true)`).

Briefly, the WebIDL input:
```
interface _Iroha : _Magic {};
_Iroha includes _Color;
```
Gives the following PHP array after parsing:
```php
[
     [
       "type" => "interface",
       "name" => "Iroha",
       "inheritance" => "Magic",
       "members" => [],
       "extAttrs" => [],
       "partial" => false,
     ],
     [
       "type" => "includes",
       "extAttrs" => [],
       "target" => "Iroha",
       "includes" => "Color",
     ],
]
```

Refer to the `webidl2` docs or the files in `tests/syntax/` for more
details.

## Tests

Test cases in `tests/invalid` and `tests/syntax` come from
[`webidl2.js`](https://github.com/w3c/webidl2.js/tree/gh-pages/test).
If ypu update them from upstream, please update the commit hash
in `tests/WebIDLTest.php` as well.

```bash
$ composer test
```

## Hacking
The grammar is written using [wikipeg](wikipeg), a PEG parser generator
that can output either JS or PHP code.  To regenerate the parser after
changes are made to `Grammar.php`, run:

```bash
$ npm install # once, to install the JS version of wikipeg
$ composer wikipeg
```

## License and Credits

The initial version of this code was written by C. Scott Ananian and is
(c) Copyright 2019 Wikimedia Foundation.

This code is distributed under the MIT license; see LICENSE for more
info.

Test cases used by this code were part of the
[webidl2.js](https://github.com/w3c/webidl2.js) package, which is
Copyright (c) 2014 Robin Berjon and also distributed under the MIT
license.
