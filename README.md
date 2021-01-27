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

Will be documented.  For now, look at the [webidl2 AST
docs](https://github.com/w3c/webidl2.js#ast-abstract-syntax-tree) and
convert JavaScript objects to PHP associative arrays.

## Tests

```bash
$ composer test
```

## License and Credits

The initial version of this code was written by C. Scott Ananian and is
(c) Copyright 2019 Wikimedia Foundation.

This code is distributed under the MIT license; see LICENSE for more
info.
