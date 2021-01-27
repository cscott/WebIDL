<?php




/* File-scope initializer */
namespace Wikimedia\WebIDL;


class Grammar extends \WikiPEG\PEGParserBase {
  // initializer
  
  	/** @var string */
  	private $filename = '';
  	/** @var int */
  	private $lineNum = 1;
  
  	/**
  	 * @param string $filename
  	 * @param string $contents
  	 * @return array
  	 */
  	public static function load( string $filename, string $contents ) {
  		$g = new Grammar();
  		$g->filename = $filename;
  		return $g->parse( $contents );
  	}
  

  // cache init
  

  // expectations
  protected $expectations = [
    0 => ["type" => "end", "description" => "end of input"],
    1 => ["type" => "class", "value" => "[\\t ]", "description" => "[\\t ]"],
    2 => ["type" => "literal", "value" => "//", "description" => "\"//\""],
    3 => ["type" => "class", "value" => "[^\\n\\r]", "description" => "[^\\n\\r]"],
    4 => ["type" => "literal", "value" => "/*", "description" => "\"/*\""],
    5 => ["type" => "class", "value" => "[^\\n\\r*]", "description" => "[^\\n\\r*]"],
    6 => ["type" => "literal", "value" => "*", "description" => "\"*\""],
    7 => ["type" => "literal", "value" => "*/", "description" => "\"*/\""],
    8 => ["type" => "literal", "value" => "[", "description" => "\"[\""],
    9 => ["type" => "literal", "value" => "]", "description" => "\"]\""],
    10 => ["type" => "literal", "value" => "\x0a", "description" => "\"\\n\""],
    11 => ["type" => "literal", "value" => "\x0d\x0a", "description" => "\"\\r\\n\""],
    12 => ["type" => "literal", "value" => "\x0d", "description" => "\"\\r\""],
    13 => ["type" => "literal", "value" => "(", "description" => "\"(\""],
    14 => ["type" => "literal", "value" => ")", "description" => "\")\""],
    15 => ["type" => "literal", "value" => "{", "description" => "\"{\""],
    16 => ["type" => "literal", "value" => "}", "description" => "\"}\""],
    17 => ["type" => "literal", "value" => ",", "description" => "\",\""],
    18 => ["type" => "literal", "value" => "callback", "description" => "\"callback\""],
    19 => ["type" => "literal", "value" => "interface", "description" => "\"interface\""],
    20 => ["type" => "literal", "value" => "namespace", "description" => "\"namespace\""],
    21 => ["type" => "literal", "value" => ";", "description" => "\";\""],
    22 => ["type" => "literal", "value" => "partial", "description" => "\"partial\""],
    23 => ["type" => "literal", "value" => "dictionary", "description" => "\"dictionary\""],
    24 => ["type" => "literal", "value" => "enum", "description" => "\"enum\""],
    25 => ["type" => "literal", "value" => "typedef", "description" => "\"typedef\""],
    26 => ["type" => "literal", "value" => "includes", "description" => "\"includes\""],
    27 => ["type" => "literal", "value" => "-", "description" => "\"-\""],
    28 => ["type" => "literal", "value" => "-Infinity", "description" => "\"-Infinity\""],
    29 => ["type" => "literal", "value" => ".", "description" => "\".\""],
    30 => ["type" => "literal", "value" => "...", "description" => "\"...\""],
    31 => ["type" => "literal", "value" => ":", "description" => "\":\""],
    32 => ["type" => "literal", "value" => "<", "description" => "\"<\""],
    33 => ["type" => "literal", "value" => "=", "description" => "\"=\""],
    34 => ["type" => "literal", "value" => ">", "description" => "\">\""],
    35 => ["type" => "literal", "value" => "?", "description" => "\"?\""],
    36 => ["type" => "literal", "value" => "ByteString", "description" => "\"ByteString\""],
    37 => ["type" => "literal", "value" => "DOMString", "description" => "\"DOMString\""],
    38 => ["type" => "literal", "value" => "FrozenArray", "description" => "\"FrozenArray\""],
    39 => ["type" => "literal", "value" => "Infinity", "description" => "\"Infinity\""],
    40 => ["type" => "literal", "value" => "NaN", "description" => "\"NaN\""],
    41 => ["type" => "literal", "value" => "ObservableArray", "description" => "\"ObservableArray\""],
    42 => ["type" => "literal", "value" => "Promise", "description" => "\"Promise\""],
    43 => ["type" => "literal", "value" => "USVString", "description" => "\"USVString\""],
    44 => ["type" => "literal", "value" => "any", "description" => "\"any\""],
    45 => ["type" => "literal", "value" => "bigint", "description" => "\"bigint\""],
    46 => ["type" => "literal", "value" => "boolean", "description" => "\"boolean\""],
    47 => ["type" => "literal", "value" => "byte", "description" => "\"byte\""],
    48 => ["type" => "literal", "value" => "double", "description" => "\"double\""],
    49 => ["type" => "literal", "value" => "false", "description" => "\"false\""],
    50 => ["type" => "literal", "value" => "float", "description" => "\"float\""],
    51 => ["type" => "literal", "value" => "long", "description" => "\"long\""],
    52 => ["type" => "literal", "value" => "null", "description" => "\"null\""],
    53 => ["type" => "literal", "value" => "object", "description" => "\"object\""],
    54 => ["type" => "literal", "value" => "octet", "description" => "\"octet\""],
    55 => ["type" => "literal", "value" => "or", "description" => "\"or\""],
    56 => ["type" => "literal", "value" => "optional", "description" => "\"optional\""],
    57 => ["type" => "literal", "value" => "record", "description" => "\"record\""],
    58 => ["type" => "literal", "value" => "sequence", "description" => "\"sequence\""],
    59 => ["type" => "literal", "value" => "short", "description" => "\"short\""],
    60 => ["type" => "literal", "value" => "symbol", "description" => "\"symbol\""],
    61 => ["type" => "literal", "value" => "true", "description" => "\"true\""],
    62 => ["type" => "literal", "value" => "unsigned", "description" => "\"unsigned\""],
    63 => ["type" => "literal", "value" => "undefined", "description" => "\"undefined\""],
    64 => ["type" => "class", "value" => "[-_]", "description" => "[-_]"],
    65 => ["type" => "class", "value" => "[A-Za-z]", "description" => "[A-Za-z]"],
    66 => ["type" => "class", "value" => "[-_0-9A-Za-z]", "description" => "[-_0-9A-Za-z]"],
    67 => ["type" => "class", "value" => "[0-9]", "description" => "[0-9]"],
    68 => ["type" => "class", "value" => "[Ee]", "description" => "[Ee]"],
    69 => ["type" => "class", "value" => "[+-]", "description" => "[+-]"],
    70 => ["type" => "literal", "value" => "\"", "description" => "\"\\\"\""],
    71 => ["type" => "class", "value" => "[^\\\"]", "description" => "[^\\\"]"],
    72 => ["type" => "class", "value" => "[^\\t\\n\\r 0-9A-Za-z]", "description" => "[^\\t\\n\\r 0-9A-Za-z]"],
    73 => ["type" => "literal", "value" => "async", "description" => "\"async\""],
    74 => ["type" => "literal", "value" => "attribute", "description" => "\"attribute\""],
    75 => ["type" => "literal", "value" => "const", "description" => "\"const\""],
    76 => ["type" => "literal", "value" => "constructor", "description" => "\"constructor\""],
    77 => ["type" => "literal", "value" => "deleter", "description" => "\"deleter\""],
    78 => ["type" => "literal", "value" => "getter", "description" => "\"getter\""],
    79 => ["type" => "literal", "value" => "inherit", "description" => "\"inherit\""],
    80 => ["type" => "literal", "value" => "iterable", "description" => "\"iterable\""],
    81 => ["type" => "literal", "value" => "maplike", "description" => "\"maplike\""],
    82 => ["type" => "literal", "value" => "mixin", "description" => "\"mixin\""],
    83 => ["type" => "literal", "value" => "readonly", "description" => "\"readonly\""],
    84 => ["type" => "literal", "value" => "required", "description" => "\"required\""],
    85 => ["type" => "literal", "value" => "setlike", "description" => "\"setlike\""],
    86 => ["type" => "literal", "value" => "setter", "description" => "\"setter\""],
    87 => ["type" => "literal", "value" => "static", "description" => "\"static\""],
    88 => ["type" => "literal", "value" => "stringifier", "description" => "\"stringifier\""],
    89 => ["type" => "literal", "value" => "unrestricted", "description" => "\"unrestricted\""],
    90 => ["type" => "literal", "value" => "ArrayBuffer", "description" => "\"ArrayBuffer\""],
    91 => ["type" => "literal", "value" => "DataView", "description" => "\"DataView\""],
    92 => ["type" => "literal", "value" => "Int8Array", "description" => "\"Int8Array\""],
    93 => ["type" => "literal", "value" => "Int16Array", "description" => "\"Int16Array\""],
    94 => ["type" => "literal", "value" => "Int32Array", "description" => "\"Int32Array\""],
    95 => ["type" => "literal", "value" => "Uint8Array", "description" => "\"Uint8Array\""],
    96 => ["type" => "literal", "value" => "Uint16Array", "description" => "\"Uint16Array\""],
    97 => ["type" => "literal", "value" => "Uint32Array", "description" => "\"Uint32Array\""],
    98 => ["type" => "literal", "value" => "Uint8ClampedArray", "description" => "\"Uint8ClampedArray\""],
    99 => ["type" => "literal", "value" => "Float32Array", "description" => "\"Float32Array\""],
    100 => ["type" => "literal", "value" => "Float64Array", "description" => "\"Float64Array\""],
    101 => ["type" => "class", "value" => "[1-9]", "description" => "[1-9]"],
    102 => ["type" => "literal", "value" => "0x", "description" => "\"0x\""],
    103 => ["type" => "literal", "value" => "0X", "description" => "\"0X\""],
    104 => ["type" => "class", "value" => "[0-9A-Fa-f]", "description" => "[0-9A-Fa-f]"],
    105 => ["type" => "literal", "value" => "0", "description" => "\"0\""],
    106 => ["type" => "class", "value" => "[0-7]", "description" => "[0-7]"],
  ];

  // actions
  private function a0($nl) {
   $this->lineNum++; return $nl; 
  }
  private function a1() {
  error_log("yo");return true;
  }
  private function a2($s) {
   return $s; 
  }
  private function a3($c) {
   error_log("Found other char $c"); return $c; 
  }
  private function a4($m, $n) {
  
  	return m*n;
  
  }
  private function a5($s) {
   return floatval( $s ); 
  }
  private function a6() {
   return -1; 
  }
  private function a7() {
   return 1; 
  }
  private function a8($s) {
   return intval($s); 
  }
  private function a9($s) {
   return hexdec($s); 
  }
  private function a10($s) {
   return octdec( $s ); 
  }
  private function a11() {
  error_log("union type");return true; 
  }
  private function a12($i) {
   return $i; 
  }
  private function a13() {
   return true; 
  }
  private function a14() {
   return false; 
  }
  private function a15($f) {
   return $f; 
  }
  private function a16() {
   return -INF; 
  }
  private function a17() {
   return INF; 
  }
  private function a18() {
   return NAN; 
  }

  // generated
  private function parsestart($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parse_($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseDefinitions($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parse_($silence) {
    $r1 = [];
    for (;;) {
      // start choice_1
      $r2 = $this->parsewhitespace($silence);
      if ($r2!==self::$FAILED) {
        goto choice_1;
      }
      $r2 = $this->parsecomment($silence);
      choice_1:
      if ($r2!==self::$FAILED) {
        $r1[] = $r2;
      } else {
        break;
      }
    }
    // free $r2
    return $r1;
  }
  private function parseDefinitions($silence) {
    $r1 = [];
    for (;;) {
      // start seq_1
      $p3 = $this->currPos;
      $r4 = $this->parseExtendedAttributeList($silence);
      if ($r4===self::$FAILED) {
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r5 = $this->parseDefinition($silence);
      if ($r5===self::$FAILED) {
        $this->currPos = $p3;
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r2 = [$r4,$r5];
      seq_1:
      if ($r2!==self::$FAILED) {
        $r1[] = $r2;
      } else {
        break;
      }
      // free $p3
    }
    // free $r2
    return $r1;
  }
  private function parsewhitespace($silence) {
    $r1 = [];
    for (;;) {
      // start choice_1
      $r2 = $this->input[$this->currPos] ?? '';
      if ($r2 === "\x09" || $r2 === " ") {
        $this->currPos++;
        goto choice_1;
      } else {
        $r2 = self::$FAILED;
        if (!$silence) {$this->fail(1);}
      }
      $r2 = $this->parseeol($silence);
      choice_1:
      if ($r2!==self::$FAILED) {
        $r1[] = $r2;
      } else {
        break;
      }
    }
    if (count($r1) === 0) {
      $r1 = self::$FAILED;
    }
    // free $r2
    return $r1;
  }
  private function parsecomment($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "//", $this->currPos, 2, false) === 0) {
      $r3 = "//";
      $this->currPos += 2;
    } else {
      if (!$silence) {$this->fail(2);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = [];
    for (;;) {
      $r5 = self::charAt($this->input, $this->currPos);
      if ($r5 !== '' && !($r5 === "\x0a" || $r5 === "\x0d")) {
        $this->currPos += strlen($r5);
        $r4[] = $r5;
      } else {
        $r5 = self::$FAILED;
        if (!$silence) {$this->fail(3);}
        break;
      }
    }
    // free $r5
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "/*", $this->currPos, 2, false) === 0) {
      $r5 = "/*";
      $this->currPos += 2;
    } else {
      if (!$silence) {$this->fail(4);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = [];
    for (;;) {
      // start choice_2
      $r7 = [];
      for (;;) {
        if (strcspn($this->input, "\x0a\x0d*", $this->currPos, 1) !== 0) {
          $r8 = self::consumeChar($this->input, $this->currPos);
          $r7[] = $r8;
        } else {
          $r8 = self::$FAILED;
          if (!$silence) {$this->fail(5);}
          break;
        }
      }
      if (count($r7) === 0) {
        $r7 = self::$FAILED;
      }
      if ($r7!==self::$FAILED) {
        goto choice_2;
      }
      // free $r8
      $r7 = $this->parseeol($silence);
      if ($r7!==self::$FAILED) {
        goto choice_2;
      }
      // start seq_3
      $p9 = $this->currPos;
      if (($this->input[$this->currPos] ?? null) === "*") {
        $this->currPos++;
        $r8 = "*";
      } else {
        if (!$silence) {$this->fail(6);}
        $r8 = self::$FAILED;
        $r7 = self::$FAILED;
        goto seq_3;
      }
      $p10 = $this->currPos;
      if (($this->input[$this->currPos] ?? null) === "/") {
        $this->currPos++;
        $r11 = "/";
      } else {
        $r11 = self::$FAILED;
      }
      if ($r11 === self::$FAILED) {
        $r11 = false;
      } else {
        $r11 = self::$FAILED;
        $this->currPos = $p10;
        $this->currPos = $p9;
        $r7 = self::$FAILED;
        goto seq_3;
      }
      // free $p10
      $r7 = [$r8,$r11];
      seq_3:
      // free $p9
      choice_2:
      if ($r7!==self::$FAILED) {
        $r6[] = $r7;
      } else {
        break;
      }
    }
    // free $r7
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "*/", $this->currPos, 2, false) === 0) {
      $r7 = "*/";
      $this->currPos += 2;
    } else {
      if (!$silence) {$this->fail(7);}
      $r7 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r5,$r6,$r7];
    seq_2:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseExtendedAttributeList($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r3 = "[";
    } else {
      if (!$silence) {$this->fail(8);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseExtendedAttribute($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseExtendedAttributes($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "]") {
      $this->currPos++;
      $r7 = "]";
    } else {
      if (!$silence) {$this->fail(9);}
      $r7 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5,$r6,$r7,$r8];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = '';
    choice_1:
    return $r1;
  }
  private function parseDefinition($silence) {
    // start choice_1
    $r1 = $this->parseCallbackOrInterfaceOrMixin($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseNamespace($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parsePartial($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseDictionary($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseEnum($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseTypedef($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseIncludesStatement($silence);
    choice_1:
    return $r1;
  }
  private function parseeol($silence) {
    $p2 = $this->currPos;
    // start choice_1
    if (($this->input[$this->currPos] ?? null) === "\x0a") {
      $this->currPos++;
      $r3 = "\x0a";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(10);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "\x0d\x0a", $this->currPos, 2, false) === 0) {
      $r3 = "\x0d\x0a";
      $this->currPos += 2;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(11);}
      $r3 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "\x0d") {
      $this->currPos++;
      $r3 = "\x0d";
    } else {
      if (!$silence) {$this->fail(12);}
      $r3 = self::$FAILED;
    }
    choice_1:
    // nl <- $r3
    $r1 = $r3;
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a0($r3);
    }
    return $r1;
  }
  private function parseExtendedAttribute($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "(") {
      $this->currPos++;
      $r3 = "(";
    } else {
      if (!$silence) {$this->fail(13);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseExtendedAttributeInner($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r6 = ")";
    } else {
      if (!$silence) {$this->fail(14);}
      $r6 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parse_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parseExtendedAttributeRest($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5,$r6,$r7,$r8];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r9 = "[";
    } else {
      if (!$silence) {$this->fail(8);}
      $r9 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r10 = $this->parse_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $this->savedPos = $this->currPos;
    $r11 = $this->a1();
    if ($r11) {
      $r11 = false;
    } else {
      $r11 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r12 = $this->parseExtendedAttributeInner($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    if (($this->input[$this->currPos] ?? null) === "]") {
      $this->currPos++;
      $r13 = "]";
    } else {
      if (!$silence) {$this->fail(9);}
      $r13 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r14 = $this->parse_($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r15 = $this->parseExtendedAttributeRest($silence);
    if ($r15===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r9,$r10,$r11,$r12,$r13,$r14,$r15];
    seq_2:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_3
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r16 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r16 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r17 = $this->parse_($silence);
    if ($r17===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r18 = $this->parseExtendedAttributeInner($silence);
    if ($r18===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r19 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r19 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r20 = $this->parse_($silence);
    if ($r20===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r21 = $this->parseExtendedAttributeRest($silence);
    if ($r21===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = [$r16,$r17,$r18,$r19,$r20,$r21];
    seq_3:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_4
    $p2 = $this->currPos;
    $r22 = $this->parseOther($silence);
    if ($r22===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r23 = $this->parseExtendedAttributeRest($silence);
    if ($r23===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = [$r22,$r23];
    seq_4:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseExtendedAttributes($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r3 = ",";
    } else {
      if (!$silence) {$this->fail(17);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseExtendedAttribute($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseExtendedAttributes($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5,$r6];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = '';
    choice_1:
    return $r1;
  }
  private function parseCallbackOrInterfaceOrMixin($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "callback", $this->currPos, 8, false) === 0) {
      $r3 = "callback";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(18);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseCallbackRestOrInterface($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "interface", $this->currPos, 9, false) === 0) {
      $r6 = "interface";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(19);}
      $r6 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r7 = $this->parse_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r8 = $this->parseInterfaceOrMixin($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r6,$r7,$r8];
    seq_2:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseNamespace($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "namespace", $this->currPos, 9, false) === 0) {
      $r3 = "namespace";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(20);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseidentifier($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r7 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parseNamespaceMembers($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r10 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r10 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r11 = $this->parse_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r12 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r12 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r13 = $this->parse_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12,$r13];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parsePartial($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "partial", $this->currPos, 7, false) === 0) {
      $r3 = "partial";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(22);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parsePartialDefinition($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseDictionary($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "dictionary", $this->currPos, 10, false) === 0) {
      $r3 = "dictionary";
      $this->currPos += 10;
    } else {
      if (!$silence) {$this->fail(23);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseidentifier($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseInheritance($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r8 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parseDictionaryMembers($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r11 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r11 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r13 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r13 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r14 = $this->parse_($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12,$r13,$r14];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseEnum($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "enum", $this->currPos, 4, false) === 0) {
      $r3 = "enum";
      $this->currPos += 4;
    } else {
      if (!$silence) {$this->fail(24);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseidentifier($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r7 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parseEnumValueList($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r10 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r10 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r11 = $this->parse_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r12 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r12 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r13 = $this->parse_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12,$r13];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseTypedef($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "typedef", $this->currPos, 7, false) === 0) {
      $r3 = "typedef";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(25);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseidentifier($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parse_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r8 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseIncludesStatement($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseidentifier($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "includes", $this->currPos, 8, false) === 0) {
      $r5 = "includes";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(26);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseidentifier($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r9 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r9 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parse_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseExtendedAttributeInner($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "(") {
      $this->currPos++;
      $r3 = "(";
    } else {
      if (!$silence) {$this->fail(13);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseExtendedAttributeInner($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r6 = ")";
    } else {
      if (!$silence) {$this->fail(14);}
      $r6 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parse_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parseExtendedAttributeInner($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5,$r6,$r7,$r8];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r9 = "[";
    } else {
      if (!$silence) {$this->fail(8);}
      $r9 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r10 = $this->parse_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r11 = $this->parseExtendedAttributeInner($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    if (($this->input[$this->currPos] ?? null) === "]") {
      $this->currPos++;
      $r12 = "]";
    } else {
      if (!$silence) {$this->fail(9);}
      $r12 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r13 = $this->parse_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r14 = $this->parseExtendedAttributeInner($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r9,$r10,$r11,$r12,$r13,$r14];
    seq_2:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_3
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r15 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r15 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r16 = $this->parse_($silence);
    if ($r16===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r17 = $this->parseExtendedAttributeInner($silence);
    if ($r17===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r18 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r18 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r19 = $this->parse_($silence);
    if ($r19===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r20 = $this->parseExtendedAttributeInner($silence);
    if ($r20===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = [$r15,$r16,$r17,$r18,$r19,$r20];
    seq_3:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_4
    $p2 = $this->currPos;
    $r21 = $this->parseOtherOrComma($silence);
    if ($r21===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r22 = $this->parseExtendedAttributeInner($silence);
    if ($r22===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = [$r21,$r22];
    seq_4:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = '';
    choice_1:
    return $r1;
  }
  private function parseExtendedAttributeRest($silence) {
    $r1 = $this->parseExtendedAttribute($silence);
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    return $r1;
  }
  private function parseOther($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    // start choice_2
    $r3 = $this->parseinteger($silence);
    if ($r3!==self::$FAILED) {
      goto choice_2;
    }
    $r3 = $this->parsedecimal($silence);
    if ($r3!==self::$FAILED) {
      goto choice_2;
    }
    $r3 = $this->parseidentifier($silence);
    if ($r3!==self::$FAILED) {
      goto choice_2;
    }
    $r3 = $this->parsestring($silence);
    if ($r3!==self::$FAILED) {
      goto choice_2;
    }
    $r3 = $this->parseotherchar($silence);
    if ($r3!==self::$FAILED) {
      goto choice_2;
    }
    if (($this->input[$this->currPos] ?? null) === "-") {
      $this->currPos++;
      $r3 = "-";
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(27);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "-Infinity", $this->currPos, 9, false) === 0) {
      $r3 = "-Infinity";
      $this->currPos += 9;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(28);}
      $r3 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ".") {
      $this->currPos++;
      $r3 = ".";
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(29);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "...", $this->currPos, 3, false) === 0) {
      $r3 = "...";
      $this->currPos += 3;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(30);}
      $r3 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ":") {
      $this->currPos++;
      $r3 = ":";
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(31);}
      $r3 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r3 = ";";
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(21);}
      $r3 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r3 = "<";
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(32);}
      $r3 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "=") {
      $this->currPos++;
      $r3 = "=";
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(33);}
      $r3 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r3 = ">";
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(34);}
      $r3 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "?") {
      $this->currPos++;
      $r3 = "?";
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(35);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ByteString", $this->currPos, 10, false) === 0) {
      $r3 = "ByteString";
      $this->currPos += 10;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(36);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "DOMString", $this->currPos, 9, false) === 0) {
      $r3 = "DOMString";
      $this->currPos += 9;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(37);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "FrozenArray", $this->currPos, 11, false) === 0) {
      $r3 = "FrozenArray";
      $this->currPos += 11;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(38);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Infinity", $this->currPos, 8, false) === 0) {
      $r3 = "Infinity";
      $this->currPos += 8;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(39);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "NaN", $this->currPos, 3, false) === 0) {
      $r3 = "NaN";
      $this->currPos += 3;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(40);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ObservableArray", $this->currPos, 15, false) === 0) {
      $r3 = "ObservableArray";
      $this->currPos += 15;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(41);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Promise", $this->currPos, 7, false) === 0) {
      $r3 = "Promise";
      $this->currPos += 7;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(42);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "USVString", $this->currPos, 9, false) === 0) {
      $r3 = "USVString";
      $this->currPos += 9;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(43);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "any", $this->currPos, 3, false) === 0) {
      $r3 = "any";
      $this->currPos += 3;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(44);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "bigint", $this->currPos, 6, false) === 0) {
      $r3 = "bigint";
      $this->currPos += 6;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(45);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "boolean", $this->currPos, 7, false) === 0) {
      $r3 = "boolean";
      $this->currPos += 7;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(46);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "byte", $this->currPos, 4, false) === 0) {
      $r3 = "byte";
      $this->currPos += 4;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(47);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "double", $this->currPos, 6, false) === 0) {
      $r3 = "double";
      $this->currPos += 6;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(48);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "false", $this->currPos, 5, false) === 0) {
      $r3 = "false";
      $this->currPos += 5;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(49);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "float", $this->currPos, 5, false) === 0) {
      $r3 = "float";
      $this->currPos += 5;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(50);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "long", $this->currPos, 4, false) === 0) {
      $r3 = "long";
      $this->currPos += 4;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(51);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "null", $this->currPos, 4, false) === 0) {
      $r3 = "null";
      $this->currPos += 4;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(52);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "object", $this->currPos, 6, false) === 0) {
      $r3 = "object";
      $this->currPos += 6;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(53);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "octet", $this->currPos, 5, false) === 0) {
      $r3 = "octet";
      $this->currPos += 5;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(54);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "or", $this->currPos, 2, false) === 0) {
      $r3 = "or";
      $this->currPos += 2;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(55);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "optional", $this->currPos, 8, false) === 0) {
      $r3 = "optional";
      $this->currPos += 8;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(56);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "record", $this->currPos, 6, false) === 0) {
      $r3 = "record";
      $this->currPos += 6;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(57);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "sequence", $this->currPos, 8, false) === 0) {
      $r3 = "sequence";
      $this->currPos += 8;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(58);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "short", $this->currPos, 5, false) === 0) {
      $r3 = "short";
      $this->currPos += 5;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(59);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "symbol", $this->currPos, 6, false) === 0) {
      $r3 = "symbol";
      $this->currPos += 6;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(60);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "true", $this->currPos, 4, false) === 0) {
      $r3 = "true";
      $this->currPos += 4;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(61);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "unsigned", $this->currPos, 8, false) === 0) {
      $r3 = "unsigned";
      $this->currPos += 8;
      goto choice_2;
    } else {
      if (!$silence) {$this->fail(62);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "undefined", $this->currPos, 9, false) === 0) {
      $r3 = "undefined";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(63);}
      $r3 = self::$FAILED;
    }
    choice_2:
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = $this->parseArgumentNameKeyword($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseBufferRelatedType($silence);
    choice_1:
    return $r1;
  }
  private function parseCallbackRestOrInterface($silence) {
    // start choice_1
    $r1 = $this->parseCallbackRest($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "interface", $this->currPos, 9, false) === 0) {
      $r3 = "interface";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(19);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseidentifier($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r7 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r7 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parseCallbackInterfaceMembers($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r10 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r10 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r11 = $this->parse_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r12 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r12 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r13 = $this->parse_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12,$r13];
    seq_1:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseInterfaceOrMixin($silence) {
    // start choice_1
    $r1 = $this->parseInterfaceRest($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseMixinRest($silence);
    choice_1:
    return $r1;
  }
  private function parseidentifier($silence) {
    $p2 = $this->currPos;
    $p4 = $this->currPos;
    // start seq_1
    $p5 = $this->currPos;
    $r6 = $this->input[$this->currPos] ?? '';
    if ($r6 === "-" || $r6 === "_") {
      $this->currPos++;
    } else {
      $r6 = self::$FAILED;
      if (!$silence) {$this->fail(64);}
      $r6 = null;
    }
    $r7 = $this->input[$this->currPos] ?? '';
    if (preg_match("/^[A-Za-z]/", $r7)) {
      $this->currPos++;
    } else {
      $r7 = self::$FAILED;
      if (!$silence) {$this->fail(65);}
      $this->currPos = $p5;
      $r3 = self::$FAILED;
      goto seq_1;
    }
    for (;;) {
      $r9 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[\\-_0-9A-Za-z]/", $r9)) {
        $this->currPos++;
      } else {
        $r9 = self::$FAILED;
        if (!$silence) {$this->fail(66);}
        break;
      }
    }
    // free $r9
    $r8 = true;
    if ($r8===self::$FAILED) {
      $this->currPos = $p5;
      $r3 = self::$FAILED;
      goto seq_1;
    }
    // free $r8
    $r3 = true;
    seq_1:
    // s <- $r3
    if ($r3!==self::$FAILED) {
      $r3 = substr($this->input, $p4, $this->currPos - $p4);
    } else {
      $r3 = self::$FAILED;
    }
    // free $p5
    // free $p4
    $r1 = $r3;
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a2($r3);
    }
    return $r1;
  }
  private function parseNamespaceMembers($silence) {
    $r1 = [];
    for (;;) {
      // start seq_1
      $p3 = $this->currPos;
      $r4 = $this->parseExtendedAttributeList($silence);
      if ($r4===self::$FAILED) {
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r5 = $this->parseNamespaceMember($silence);
      if ($r5===self::$FAILED) {
        $this->currPos = $p3;
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r2 = [$r4,$r5];
      seq_1:
      if ($r2!==self::$FAILED) {
        $r1[] = $r2;
      } else {
        break;
      }
      // free $p3
    }
    // free $r2
    return $r1;
  }
  private function parsePartialDefinition($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "interface", $this->currPos, 9, false) === 0) {
      $r3 = "interface";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(19);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parsePartialInterfaceOrPartialMixin($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = $this->parsePartialDictionary($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseNamespace($silence);
    choice_1:
    return $r1;
  }
  private function parseInheritance($silence) {
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ":") {
      $this->currPos++;
      $r3 = ":";
    } else {
      if (!$silence) {$this->fail(31);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseidentifier($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5,$r6];
    seq_1:
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    // free $p2
    return $r1;
  }
  private function parseDictionaryMembers($silence) {
    $r1 = [];
    for (;;) {
      $r2 = $this->parseDictionaryMember($silence);
      if ($r2!==self::$FAILED) {
        $r1[] = $r2;
      } else {
        break;
      }
    }
    // free $r2
    return $r1;
  }
  private function parseEnumValueList($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parsestring($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseEnumValueListComma($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseTypeWithExtendedAttributes($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseExtendedAttributeList($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseType($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseOtherOrComma($silence) {
    // start choice_1
    $p2 = $this->currPos;
    $r3 = $this->parseOther($silence);
    // c <- $r3
    $r1 = $r3;
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a3($r3);
      goto choice_1;
    }
    // start seq_1
    $p4 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r5 = ",";
    } else {
      if (!$silence) {$this->fail(17);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p4;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r5,$r6];
    seq_1:
    // free $p4
    choice_1:
    return $r1;
  }
  private function parseinteger($silence) {
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    $r4 = $this->parseopt_minus($silence);
    // m <- $r4
    if ($r4===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // start choice_1
    $r5 = $this->parsedecimal_integer($silence);
    if ($r5!==self::$FAILED) {
      goto choice_1;
    }
    $r5 = $this->parsehex_integer($silence);
    if ($r5!==self::$FAILED) {
      goto choice_1;
    }
    $r5 = $this->parseoctal_integer($silence);
    choice_1:
    // n <- $r5
    if ($r5===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a4($r4, $r5);
    }
    // free $p3
    return $r1;
  }
  private function parsedecimal($silence) {
    $p2 = $this->currPos;
    $p4 = $this->currPos;
    // start seq_1
    $p5 = $this->currPos;
    $r6 = $this->parseopt_minus($silence);
    // m <- $r6
    if ($r6===self::$FAILED) {
      $r3 = self::$FAILED;
      goto seq_1;
    }
    // start choice_1
    // start seq_2
    $p8 = $this->currPos;
    // start choice_2
    // start seq_3
    $p10 = $this->currPos;
    $r11 = self::$FAILED;
    for (;;) {
      $r12 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-9]/", $r12)) {
        $this->currPos++;
        $r11 = true;
      } else {
        $r12 = self::$FAILED;
        if (!$silence) {$this->fail(67);}
        break;
      }
    }
    if ($r11===self::$FAILED) {
      $r9 = self::$FAILED;
      goto seq_3;
    }
    // free $r12
    if (($this->input[$this->currPos] ?? null) === ".") {
      $this->currPos++;
      $r12 = ".";
    } else {
      if (!$silence) {$this->fail(29);}
      $r12 = self::$FAILED;
      $this->currPos = $p10;
      $r9 = self::$FAILED;
      goto seq_3;
    }
    for (;;) {
      $r14 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-9]/", $r14)) {
        $this->currPos++;
      } else {
        $r14 = self::$FAILED;
        if (!$silence) {$this->fail(67);}
        break;
      }
    }
    // free $r14
    $r13 = true;
    if ($r13===self::$FAILED) {
      $this->currPos = $p10;
      $r9 = self::$FAILED;
      goto seq_3;
    }
    // free $r13
    $r9 = true;
    seq_3:
    if ($r9!==self::$FAILED) {
      goto choice_2;
    }
    // free $p10
    // start seq_4
    $p10 = $this->currPos;
    for (;;) {
      $r14 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-9]/", $r14)) {
        $this->currPos++;
      } else {
        $r14 = self::$FAILED;
        if (!$silence) {$this->fail(67);}
        break;
      }
    }
    // free $r14
    $r13 = true;
    if ($r13===self::$FAILED) {
      $r9 = self::$FAILED;
      goto seq_4;
    }
    // free $r13
    if (($this->input[$this->currPos] ?? null) === ".") {
      $this->currPos++;
      $r13 = ".";
    } else {
      if (!$silence) {$this->fail(29);}
      $r13 = self::$FAILED;
      $this->currPos = $p10;
      $r9 = self::$FAILED;
      goto seq_4;
    }
    $r14 = self::$FAILED;
    for (;;) {
      $r15 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-9]/", $r15)) {
        $this->currPos++;
        $r14 = true;
      } else {
        $r15 = self::$FAILED;
        if (!$silence) {$this->fail(67);}
        break;
      }
    }
    if ($r14===self::$FAILED) {
      $this->currPos = $p10;
      $r9 = self::$FAILED;
      goto seq_4;
    }
    // free $r15
    $r9 = true;
    seq_4:
    // free $p10
    choice_2:
    if ($r9===self::$FAILED) {
      $r7 = self::$FAILED;
      goto seq_2;
    }
    // start seq_5
    $p10 = $this->currPos;
    $r16 = $this->input[$this->currPos] ?? '';
    if ($r16 === "E" || $r16 === "e") {
      $this->currPos++;
    } else {
      $r16 = self::$FAILED;
      if (!$silence) {$this->fail(68);}
      $r15 = self::$FAILED;
      goto seq_5;
    }
    $r17 = $this->input[$this->currPos] ?? '';
    if ($r17 === "+" || $r17 === "-") {
      $this->currPos++;
    } else {
      $r17 = self::$FAILED;
      if (!$silence) {$this->fail(69);}
      $r17 = null;
    }
    $r18 = self::$FAILED;
    for (;;) {
      $r19 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-9]/", $r19)) {
        $this->currPos++;
        $r18 = true;
      } else {
        $r19 = self::$FAILED;
        if (!$silence) {$this->fail(67);}
        break;
      }
    }
    if ($r18===self::$FAILED) {
      $this->currPos = $p10;
      $r15 = self::$FAILED;
      goto seq_5;
    }
    // free $r19
    $r15 = true;
    seq_5:
    if ($r15===self::$FAILED) {
      $r15 = null;
    }
    // free $p10
    $r7 = true;
    seq_2:
    if ($r7!==self::$FAILED) {
      goto choice_1;
    }
    // free $p8
    // start seq_6
    $p8 = $this->currPos;
    $r19 = self::$FAILED;
    for (;;) {
      $r20 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-9]/", $r20)) {
        $this->currPos++;
        $r19 = true;
      } else {
        $r20 = self::$FAILED;
        if (!$silence) {$this->fail(67);}
        break;
      }
    }
    if ($r19===self::$FAILED) {
      $r7 = self::$FAILED;
      goto seq_6;
    }
    // free $r20
    $r20 = $this->input[$this->currPos] ?? '';
    if ($r20 === "E" || $r20 === "e") {
      $this->currPos++;
    } else {
      $r20 = self::$FAILED;
      if (!$silence) {$this->fail(68);}
      $this->currPos = $p8;
      $r7 = self::$FAILED;
      goto seq_6;
    }
    $r21 = $this->input[$this->currPos] ?? '';
    if ($r21 === "+" || $r21 === "-") {
      $this->currPos++;
    } else {
      $r21 = self::$FAILED;
      if (!$silence) {$this->fail(69);}
      $r21 = null;
    }
    $r22 = self::$FAILED;
    for (;;) {
      $r23 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-9]/", $r23)) {
        $this->currPos++;
        $r22 = true;
      } else {
        $r23 = self::$FAILED;
        if (!$silence) {$this->fail(67);}
        break;
      }
    }
    if ($r22===self::$FAILED) {
      $this->currPos = $p8;
      $r7 = self::$FAILED;
      goto seq_6;
    }
    // free $r23
    $r7 = true;
    seq_6:
    // free $p8
    choice_1:
    if ($r7===self::$FAILED) {
      $this->currPos = $p5;
      $r3 = self::$FAILED;
      goto seq_1;
    }
    $r3 = true;
    seq_1:
    // s <- $r3
    if ($r3!==self::$FAILED) {
      $r3 = substr($this->input, $p4, $this->currPos - $p4);
    } else {
      $r3 = self::$FAILED;
    }
    // free $p5
    // free $p4
    $r1 = $r3;
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a5($r3);
    }
    return $r1;
  }
  private function parsestring($silence) {
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "\"") {
      $this->currPos++;
      $r4 = "\"";
    } else {
      if (!$silence) {$this->fail(70);}
      $r4 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $p6 = $this->currPos;
    for (;;) {
      $r7 = self::charAt($this->input, $this->currPos);
      if ($r7 !== '' && !($r7 === "\"")) {
        $this->currPos += strlen($r7);
      } else {
        $r7 = self::$FAILED;
        if (!$silence) {$this->fail(71);}
        break;
      }
    }
    // free $r7
    $r5 = true;
    // s <- $r5
    if ($r5!==self::$FAILED) {
      $r5 = substr($this->input, $p6, $this->currPos - $p6);
    } else {
      $r5 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $p6
    if (($this->input[$this->currPos] ?? null) === "\"") {
      $this->currPos++;
      $r7 = "\"";
    } else {
      if (!$silence) {$this->fail(70);}
      $r7 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a2($r5);
    }
    // free $p3
    return $r1;
  }
  private function parseotherchar($silence) {
    $r1 = self::charAt($this->input, $this->currPos);
    if (preg_match("/^[^\\x09\\x0a\\x0d 0-9A-Za-z]/", $r1)) {
      $this->currPos += strlen($r1);
    } else {
      $r1 = self::$FAILED;
      if (!$silence) {$this->fail(72);}
    }
    return $r1;
  }
  private function parseArgumentNameKeyword($silence) {
    // start seq_1
    $p1 = $this->currPos;
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "async", $this->currPos, 5, false) === 0) {
      $r3 = "async";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(73);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "attribute", $this->currPos, 9, false) === 0) {
      $r3 = "attribute";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(74);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "callback", $this->currPos, 8, false) === 0) {
      $r3 = "callback";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(18);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "const", $this->currPos, 5, false) === 0) {
      $r3 = "const";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(75);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "constructor", $this->currPos, 11, false) === 0) {
      $r3 = "constructor";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(76);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "deleter", $this->currPos, 7, false) === 0) {
      $r3 = "deleter";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(77);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "dictionary", $this->currPos, 10, false) === 0) {
      $r3 = "dictionary";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(23);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "enum", $this->currPos, 4, false) === 0) {
      $r3 = "enum";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(24);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "getter", $this->currPos, 6, false) === 0) {
      $r3 = "getter";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(78);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "includes", $this->currPos, 8, false) === 0) {
      $r3 = "includes";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(26);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "inherit", $this->currPos, 7, false) === 0) {
      $r3 = "inherit";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(79);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "interface", $this->currPos, 9, false) === 0) {
      $r3 = "interface";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(19);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "iterable", $this->currPos, 8, false) === 0) {
      $r3 = "iterable";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(80);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "maplike", $this->currPos, 7, false) === 0) {
      $r3 = "maplike";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(81);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "mixin", $this->currPos, 5, false) === 0) {
      $r3 = "mixin";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(82);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "namespace", $this->currPos, 9, false) === 0) {
      $r3 = "namespace";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(20);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "partial", $this->currPos, 7, false) === 0) {
      $r3 = "partial";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(22);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "readonly", $this->currPos, 8, false) === 0) {
      $r3 = "readonly";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(83);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "required", $this->currPos, 8, false) === 0) {
      $r3 = "required";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(84);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "setlike", $this->currPos, 7, false) === 0) {
      $r3 = "setlike";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(85);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "setter", $this->currPos, 6, false) === 0) {
      $r3 = "setter";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(86);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "static", $this->currPos, 6, false) === 0) {
      $r3 = "static";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(87);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "stringifier", $this->currPos, 11, false) === 0) {
      $r3 = "stringifier";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(88);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "typedef", $this->currPos, 7, false) === 0) {
      $r3 = "typedef";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(25);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "unrestricted", $this->currPos, 12, false) === 0) {
      $r3 = "unrestricted";
      $this->currPos += 12;
    } else {
      if (!$silence) {$this->fail(89);}
      $r3 = self::$FAILED;
    }
    choice_1:
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseBufferRelatedType($silence) {
    // start seq_1
    $p1 = $this->currPos;
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ArrayBuffer", $this->currPos, 11, false) === 0) {
      $r3 = "ArrayBuffer";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(90);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "DataView", $this->currPos, 8, false) === 0) {
      $r3 = "DataView";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(91);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int8Array", $this->currPos, 9, false) === 0) {
      $r3 = "Int8Array";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(92);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int16Array", $this->currPos, 10, false) === 0) {
      $r3 = "Int16Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(93);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int32Array", $this->currPos, 10, false) === 0) {
      $r3 = "Int32Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(94);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint8Array", $this->currPos, 10, false) === 0) {
      $r3 = "Uint8Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(95);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint16Array", $this->currPos, 11, false) === 0) {
      $r3 = "Uint16Array";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(96);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint32Array", $this->currPos, 11, false) === 0) {
      $r3 = "Uint32Array";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(97);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint8ClampedArray", $this->currPos, 17, false) === 0) {
      $r3 = "Uint8ClampedArray";
      $this->currPos += 17;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(98);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Float32Array", $this->currPos, 12, false) === 0) {
      $r3 = "Float32Array";
      $this->currPos += 12;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(99);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Float64Array", $this->currPos, 12, false) === 0) {
      $r3 = "Float64Array";
      $this->currPos += 12;
    } else {
      if (!$silence) {$this->fail(100);}
      $r3 = self::$FAILED;
    }
    choice_1:
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseCallbackRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseidentifier($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "=") {
      $this->currPos++;
      $r5 = "=";
    } else {
      if (!$silence) {$this->fail(33);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseType($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "(") {
      $this->currPos++;
      $r8 = "(";
    } else {
      if (!$silence) {$this->fail(13);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parseArgumentList($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r11 = ")";
    } else {
      if (!$silence) {$this->fail(14);}
      $r11 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r13 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r13 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r14 = $this->parse_($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12,$r13,$r14];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseCallbackInterfaceMembers($silence) {
    $r1 = [];
    for (;;) {
      // start seq_1
      $p3 = $this->currPos;
      $r4 = $this->parseExtendedAttributeList($silence);
      if ($r4===self::$FAILED) {
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r5 = $this->parseCallbackInterfaceMember($silence);
      if ($r5===self::$FAILED) {
        $this->currPos = $p3;
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r2 = [$r4,$r5];
      seq_1:
      if ($r2!==self::$FAILED) {
        $r1[] = $r2;
      } else {
        break;
      }
      // free $p3
    }
    // free $r2
    return $r1;
  }
  private function parseInterfaceRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseidentifier($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseInheritance($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r6 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r6 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parse_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parseInterfaceMembers($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r9 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r9 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parse_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r11 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r11 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseMixinRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "mixin", $this->currPos, 5, false) === 0) {
      $r3 = "mixin";
      $this->currPos += 5;
    } else {
      if (!$silence) {$this->fail(82);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseidentifier($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r7 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parseMixinMembers($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r10 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r10 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r11 = $this->parse_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r12 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r12 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r13 = $this->parse_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12,$r13];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseNamespaceMember($silence) {
    // start choice_1
    $r1 = $this->parseRegularOperation($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "readonly", $this->currPos, 8, false) === 0) {
      $r3 = "readonly";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(83);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseAttributeRest($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5];
    seq_1:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parsePartialInterfaceOrPartialMixin($silence) {
    // start choice_1
    $r1 = $this->parsePartialInterfaceRest($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseMixinRest($silence);
    choice_1:
    return $r1;
  }
  private function parsePartialDictionary($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "dictionary", $this->currPos, 10, false) === 0) {
      $r3 = "dictionary";
      $this->currPos += 10;
    } else {
      if (!$silence) {$this->fail(23);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseidentifier($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r7 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parseDictionaryMembers($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r10 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r10 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r11 = $this->parse_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r12 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r12 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r13 = $this->parse_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12,$r13];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseDictionaryMember($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseExtendedAttributeList($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseDictionaryMemberRest($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseEnumValueListComma($silence) {
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r3 = ",";
    } else {
      if (!$silence) {$this->fail(17);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseEnumValueListString($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5];
    seq_1:
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    // free $p2
    return $r1;
  }
  private function parseType($silence) {
    // start choice_1
    $r1 = $this->parseSingleType($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseUnionType($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseNull($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseopt_minus($silence) {
    // start choice_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "-") {
      $this->currPos++;
      $r1 = "-";
      $this->savedPos = $p2;
      $r1 = $this->a6();
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(27);}
      $r1 = self::$FAILED;
    }
    $p3 = $this->currPos;
    $r1 = '';
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p3;
      $r1 = $this->a7();
    }
    choice_1:
    return $r1;
  }
  private function parsedecimal_integer($silence) {
    $p2 = $this->currPos;
    $p4 = $this->currPos;
    // start seq_1
    $p5 = $this->currPos;
    $r6 = $this->input[$this->currPos] ?? '';
    if (preg_match("/^[1-9]/", $r6)) {
      $this->currPos++;
    } else {
      $r6 = self::$FAILED;
      if (!$silence) {$this->fail(101);}
      $r3 = self::$FAILED;
      goto seq_1;
    }
    for (;;) {
      $r8 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-9]/", $r8)) {
        $this->currPos++;
      } else {
        $r8 = self::$FAILED;
        if (!$silence) {$this->fail(67);}
        break;
      }
    }
    // free $r8
    $r7 = true;
    if ($r7===self::$FAILED) {
      $this->currPos = $p5;
      $r3 = self::$FAILED;
      goto seq_1;
    }
    // free $r7
    $r3 = true;
    seq_1:
    // s <- $r3
    if ($r3!==self::$FAILED) {
      $r3 = substr($this->input, $p4, $this->currPos - $p4);
    } else {
      $r3 = self::$FAILED;
    }
    // free $p5
    // free $p4
    $r1 = $r3;
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a8($r3);
    }
    return $r1;
  }
  private function parsehex_integer($silence) {
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "0x", $this->currPos, 2, false) === 0) {
      $r4 = "0x";
      $this->currPos += 2;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(102);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "0X", $this->currPos, 2, false) === 0) {
      $r4 = "0X";
      $this->currPos += 2;
    } else {
      if (!$silence) {$this->fail(103);}
      $r4 = self::$FAILED;
    }
    choice_1:
    if ($r4===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $p6 = $this->currPos;
    $r5 = self::$FAILED;
    for (;;) {
      $r7 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-9A-Fa-f]/", $r7)) {
        $this->currPos++;
        $r5 = true;
      } else {
        $r7 = self::$FAILED;
        if (!$silence) {$this->fail(104);}
        break;
      }
    }
    // s <- $r5
    if ($r5!==self::$FAILED) {
      $r5 = substr($this->input, $p6, $this->currPos - $p6);
    } else {
      $r5 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $r7
    // free $p6
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a9($r5);
    }
    // free $p3
    return $r1;
  }
  private function parseoctal_integer($silence) {
    $p2 = $this->currPos;
    $p4 = $this->currPos;
    // start seq_1
    $p5 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "0") {
      $this->currPos++;
      $r6 = "0";
    } else {
      if (!$silence) {$this->fail(105);}
      $r6 = self::$FAILED;
      $r3 = self::$FAILED;
      goto seq_1;
    }
    for (;;) {
      $r8 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-7]/", $r8)) {
        $this->currPos++;
      } else {
        $r8 = self::$FAILED;
        if (!$silence) {$this->fail(106);}
        break;
      }
    }
    // free $r8
    $r7 = true;
    if ($r7===self::$FAILED) {
      $this->currPos = $p5;
      $r3 = self::$FAILED;
      goto seq_1;
    }
    // free $r7
    $r3 = true;
    seq_1:
    // s <- $r3
    if ($r3!==self::$FAILED) {
      $r3 = substr($this->input, $p4, $this->currPos - $p4);
    } else {
      $r3 = self::$FAILED;
    }
    // free $p5
    // free $p4
    $r1 = $r3;
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a10($r3);
    }
    return $r1;
  }
  private function parseArgumentList($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseArgument($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseArguments($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = '';
    choice_1:
    return $r1;
  }
  private function parseCallbackInterfaceMember($silence) {
    // start choice_1
    $r1 = $this->parseConst($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseRegularOperation($silence);
    choice_1:
    return $r1;
  }
  private function parseInterfaceMembers($silence) {
    $r1 = [];
    for (;;) {
      // start seq_1
      $p3 = $this->currPos;
      $r4 = $this->parseExtendedAttributeList($silence);
      if ($r4===self::$FAILED) {
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r5 = $this->parseInterfaceMember($silence);
      if ($r5===self::$FAILED) {
        $this->currPos = $p3;
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r2 = [$r4,$r5];
      seq_1:
      if ($r2!==self::$FAILED) {
        $r1[] = $r2;
      } else {
        break;
      }
      // free $p3
    }
    // free $r2
    return $r1;
  }
  private function parseMixinMembers($silence) {
    $r1 = [];
    for (;;) {
      // start seq_1
      $p3 = $this->currPos;
      $r4 = $this->parseExtendedAttributeList($silence);
      if ($r4===self::$FAILED) {
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r5 = $this->parseMixinMember($silence);
      if ($r5===self::$FAILED) {
        $this->currPos = $p3;
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r2 = [$r4,$r5];
      seq_1:
      if ($r2!==self::$FAILED) {
        $r1[] = $r2;
      } else {
        break;
      }
      // free $p3
    }
    // free $r2
    return $r1;
  }
  private function parseRegularOperation($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseType($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseOperationRest($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseAttributeRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "attribute", $this->currPos, 9, false) === 0) {
      $r3 = "attribute";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(74);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseAttributeName($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r7 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parsePartialInterfaceRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseidentifier($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r5 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parsePartialInterfaceMembers($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r8 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r10 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r10 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r11 = $this->parse_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseDictionaryMemberRest($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "required", $this->currPos, 8, false) === 0) {
      $r3 = "required";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(84);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseidentifier($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parse_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r8 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r8 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    $r10 = $this->parseType($silence);
    if ($r10===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r11 = $this->parseidentifier($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r13 = $this->parseDefault($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r14 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r14 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r15 = $this->parse_($silence);
    if ($r15===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r10,$r11,$r12,$r13,$r14,$r15];
    seq_2:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseEnumValueListString($silence) {
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parsestring($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseEnumValueListComma($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5];
    seq_1:
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    // free $p2
    return $r1;
  }
  private function parseSingleType($silence) {
    // start choice_1
    $r1 = $this->parseDistinguishableType($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "any", $this->currPos, 3, false) === 0) {
      $r3 = "any";
      $this->currPos += 3;
    } else {
      if (!$silence) {$this->fail(44);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = $this->parsePromiseType($silence);
    choice_1:
    return $r1;
  }
  private function parseUnionType($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "(") {
      $this->currPos++;
      $r3 = "(";
    } else {
      if (!$silence) {$this->fail(13);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $this->savedPos = $this->currPos;
    $r4 = $this->a11();
    if ($r4) {
      $r4 = false;
    } else {
      $r4 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parse_($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseUnionMemberType($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = [];
    for (;;) {
      // start seq_2
      $p9 = $this->currPos;
      if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "or", $this->currPos, 2, false) === 0) {
        $r10 = "or";
        $this->currPos += 2;
      } else {
        if (!$silence) {$this->fail(55);}
        $r10 = self::$FAILED;
        $r8 = self::$FAILED;
        goto seq_2;
      }
      $r11 = $this->parse_($silence);
      if ($r11===self::$FAILED) {
        $this->currPos = $p9;
        $r8 = self::$FAILED;
        goto seq_2;
      }
      $r12 = $this->parseUnionMemberType($silence);
      if ($r12===self::$FAILED) {
        $this->currPos = $p9;
        $r8 = self::$FAILED;
        goto seq_2;
      }
      $r8 = [$r10,$r11,$r12];
      seq_2:
      if ($r8!==self::$FAILED) {
        $r7[] = $r8;
      } else {
        break;
      }
      // free $p9
    }
    if (count($r7) === 0) {
      $r7 = self::$FAILED;
    }
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    // free $r8
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r8 = ")";
    } else {
      if (!$silence) {$this->fail(14);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r13 = $this->parse_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r13];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseNull($silence) {
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "?") {
      $this->currPos++;
      $r3 = "?";
    } else {
      if (!$silence) {$this->fail(35);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    // free $p2
    return $r1;
  }
  private function parseArgument($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseExtendedAttributeList($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseArgumentRest($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseArguments($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r3 = ",";
    } else {
      if (!$silence) {$this->fail(17);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseArgument($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseArguments($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5,$r6];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = '';
    choice_1:
    return $r1;
  }
  private function parseConst($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "const", $this->currPos, 5, false) === 0) {
      $r3 = "const";
      $this->currPos += 5;
    } else {
      if (!$silence) {$this->fail(75);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseConstType($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseidentifier($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parse_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "=") {
      $this->currPos++;
      $r8 = "=";
    } else {
      if (!$silence) {$this->fail(33);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parseConstValue($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r11 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r11 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseInterfaceMember($silence) {
    // start choice_1
    $r1 = $this->parsePartialInterfaceMember($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseConstructor($silence);
    choice_1:
    return $r1;
  }
  private function parseMixinMember($silence) {
    // start choice_1
    $r1 = $this->parseConst($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseRegularOperation($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseStringifier($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseOptionalReadOnly($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseAttributeRest($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseOperationRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseOptionalOperationName($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "(") {
      $this->currPos++;
      $r4 = "(";
    } else {
      if (!$silence) {$this->fail(13);}
      $r4 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parse_($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseArgumentList($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r7 = ")";
    } else {
      if (!$silence) {$this->fail(14);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r9 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r9 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parse_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseAttributeName($silence) {
    // start choice_1
    $r1 = $this->parseAttributeNameKeyword($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseidentifier($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parsePartialInterfaceMembers($silence) {
    $r1 = [];
    for (;;) {
      // start seq_1
      $p3 = $this->currPos;
      $r4 = $this->parseExtendedAttributeList($silence);
      if ($r4===self::$FAILED) {
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r5 = $this->parsePartialInterfaceMember($silence);
      if ($r5===self::$FAILED) {
        $this->currPos = $p3;
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r2 = [$r4,$r5];
      seq_1:
      if ($r2!==self::$FAILED) {
        $r1[] = $r2;
      } else {
        break;
      }
      // free $p3
    }
    // free $r2
    return $r1;
  }
  private function parseDefault($silence) {
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "=") {
      $this->currPos++;
      $r3 = "=";
    } else {
      if (!$silence) {$this->fail(33);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseDefaultValue($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5];
    seq_1:
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    // free $p2
    return $r1;
  }
  private function parseDistinguishableType($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parsePrimitiveType($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseNull($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    $r5 = $this->parseStringType($silence);
    if ($r5===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parseNull($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r5,$r6];
    seq_2:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_3
    $p2 = $this->currPos;
    $r7 = $this->parseidentifier($silence);
    if ($r7===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r9 = $this->parseNull($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = [$r7,$r8,$r9];
    seq_3:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_4
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "sequence", $this->currPos, 8, false) === 0) {
      $r10 = "sequence";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(58);}
      $r10 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r11 = $this->parse_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r12 = "<";
    } else {
      if (!$silence) {$this->fail(32);}
      $r12 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r13 = $this->parse_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r14 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r15 = ">";
    } else {
      if (!$silence) {$this->fail(34);}
      $r15 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r16 = $this->parse_($silence);
    if ($r16===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r17 = $this->parseNull($silence);
    if ($r17===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = [$r10,$r11,$r12,$r13,$r14,$r15,$r16,$r17];
    seq_4:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_5
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "object", $this->currPos, 6, false) === 0) {
      $r18 = "object";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(53);}
      $r18 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_5;
    }
    $r19 = $this->parse_($silence);
    if ($r19===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_5;
    }
    $r20 = $this->parseNull($silence);
    if ($r20===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_5;
    }
    $r1 = [$r18,$r19,$r20];
    seq_5:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_6
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "symbol", $this->currPos, 6, false) === 0) {
      $r21 = "symbol";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(60);}
      $r21 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_6;
    }
    $r22 = $this->parse_($silence);
    if ($r22===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_6;
    }
    $r23 = $this->parseNull($silence);
    if ($r23===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_6;
    }
    $r1 = [$r21,$r22,$r23];
    seq_6:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_7
    $p2 = $this->currPos;
    $r24 = $this->parseBufferRelatedType($silence);
    if ($r24===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r25 = $this->parseNull($silence);
    if ($r25===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r1 = [$r24,$r25];
    seq_7:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_8
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "FrozenArray", $this->currPos, 11, false) === 0) {
      $r26 = "FrozenArray";
      $this->currPos += 11;
    } else {
      if (!$silence) {$this->fail(38);}
      $r26 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r27 = $this->parse_($silence);
    if ($r27===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r28 = "<";
    } else {
      if (!$silence) {$this->fail(32);}
      $r28 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r29 = $this->parse_($silence);
    if ($r29===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r30 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r30===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r31 = ">";
    } else {
      if (!$silence) {$this->fail(34);}
      $r31 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r32 = $this->parse_($silence);
    if ($r32===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r33 = $this->parseNull($silence);
    if ($r33===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r1 = [$r26,$r27,$r28,$r29,$r30,$r31,$r32,$r33];
    seq_8:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_9
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ObservableArray", $this->currPos, 15, false) === 0) {
      $r34 = "ObservableArray";
      $this->currPos += 15;
    } else {
      if (!$silence) {$this->fail(41);}
      $r34 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    $r35 = $this->parse_($silence);
    if ($r35===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r36 = "<";
    } else {
      if (!$silence) {$this->fail(32);}
      $r36 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    $r37 = $this->parse_($silence);
    if ($r37===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    $r38 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r38===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r39 = ">";
    } else {
      if (!$silence) {$this->fail(34);}
      $r39 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    $r40 = $this->parse_($silence);
    if ($r40===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    $r41 = $this->parseNull($silence);
    if ($r41===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    $r1 = [$r34,$r35,$r36,$r37,$r38,$r39,$r40,$r41];
    seq_9:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_10
    $p2 = $this->currPos;
    $r42 = $this->parseRecordType($silence);
    if ($r42===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_10;
    }
    $r43 = $this->parseNull($silence);
    if ($r43===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_10;
    }
    $r1 = [$r42,$r43];
    seq_10:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parsePromiseType($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Promise", $this->currPos, 7, false) === 0) {
      $r3 = "Promise";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(42);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r5 = "<";
    } else {
      if (!$silence) {$this->fail(32);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseType($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r8 = ">";
    } else {
      if (!$silence) {$this->fail(34);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseUnionMemberType($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseExtendedAttributeList($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseDistinguishableType($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    $r5 = $this->parseUnionType($silence);
    if ($r5===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parseNull($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r5,$r6];
    seq_2:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseArgumentRest($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "optional", $this->currPos, 8, false) === 0) {
      $r3 = "optional";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(56);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseArgumentName($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseDefault($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5,$r6,$r7];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    $r8 = $this->parseType($silence);
    if ($r8===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r9 = $this->parseEllipsis($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r10 = $this->parseArgumentName($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r8,$r9,$r10];
    seq_2:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseConstType($silence) {
    // start choice_1
    $r1 = $this->parsePrimitiveType($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseidentifier($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseConstValue($silence) {
    // start choice_1
    $r1 = $this->parseBooleanLiteral($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseFloatLiteral($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    $r4 = $this->parseinteger($silence);
    // i <- $r4
    if ($r4===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->discard_($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a12($r4);
    }
    // free $p3
    choice_1:
    return $r1;
  }
  private function parsePartialInterfaceMember($silence) {
    // start choice_1
    $r1 = $this->parseConst($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseOperation($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseStringifier($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseStaticMember($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseIterable($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseAsyncIterable($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseReadOnlyMember($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseAttributeRest($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseMaplikeRest($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseSetlikeRest($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseInheritAttribute($silence);
    choice_1:
    return $r1;
  }
  private function parseConstructor($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "constructor", $this->currPos, 11, false) === 0) {
      $r3 = "constructor";
      $this->currPos += 11;
    } else {
      if (!$silence) {$this->fail(76);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "(") {
      $this->currPos++;
      $r5 = "(";
    } else {
      if (!$silence) {$this->fail(13);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseArgumentList($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r8 = ")";
    } else {
      if (!$silence) {$this->fail(14);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r10 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r10 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r11 = $this->parse_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseStringifier($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "stringifier", $this->currPos, 11, false) === 0) {
      $r3 = "stringifier";
      $this->currPos += 11;
    } else {
      if (!$silence) {$this->fail(88);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseStringifierRest($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseOptionalReadOnly($silence) {
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "readonly", $this->currPos, 8, false) === 0) {
      $r3 = "readonly";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(83);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    // free $p2
    return $r1;
  }
  private function parseOptionalOperationName($silence) {
    $r1 = $this->parseOperationName($silence);
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    return $r1;
  }
  private function parseAttributeNameKeyword($silence) {
    // start seq_1
    $p1 = $this->currPos;
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "async", $this->currPos, 5, false) === 0) {
      $r3 = "async";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(73);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "required", $this->currPos, 8, false) === 0) {
      $r3 = "required";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(84);}
      $r3 = self::$FAILED;
    }
    choice_1:
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseDefaultValue($silence) {
    // start choice_1
    $r1 = $this->parseConstValue($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parsestring($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r5 = "[";
    } else {
      if (!$silence) {$this->fail(8);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    if (($this->input[$this->currPos] ?? null) === "]") {
      $this->currPos++;
      $r7 = "]";
    } else {
      if (!$silence) {$this->fail(9);}
      $r7 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r5,$r6,$r7,$r8];
    seq_2:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_3
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r9 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r9 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r10 = $this->parse_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r11 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r11 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = [$r9,$r10,$r11,$r12];
    seq_3:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_4
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "null", $this->currPos, 4, false) === 0) {
      $r13 = "null";
      $this->currPos += 4;
    } else {
      if (!$silence) {$this->fail(52);}
      $r13 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r14 = $this->parse_($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = [$r13,$r14];
    seq_4:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parsePrimitiveType($silence) {
    // start choice_1
    $r1 = $this->parseUnsignedIntegerType($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseUnrestrictedFloatType($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "undefined", $this->currPos, 9, false) === 0) {
      $r3 = "undefined";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(63);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "boolean", $this->currPos, 7, false) === 0) {
      $r5 = "boolean";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(46);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r5,$r6];
    seq_2:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_3
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "byte", $this->currPos, 4, false) === 0) {
      $r7 = "byte";
      $this->currPos += 4;
    } else {
      if (!$silence) {$this->fail(47);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = [$r7,$r8];
    seq_3:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_4
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "octet", $this->currPos, 5, false) === 0) {
      $r9 = "octet";
      $this->currPos += 5;
    } else {
      if (!$silence) {$this->fail(54);}
      $r9 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r10 = $this->parse_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = [$r9,$r10];
    seq_4:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_5
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "bigint", $this->currPos, 6, false) === 0) {
      $r11 = "bigint";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(45);}
      $r11 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_5;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_5;
    }
    $r1 = [$r11,$r12];
    seq_5:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseStringType($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ByteString", $this->currPos, 10, false) === 0) {
      $r3 = "ByteString";
      $this->currPos += 10;
    } else {
      if (!$silence) {$this->fail(36);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "DOMString", $this->currPos, 9, false) === 0) {
      $r5 = "DOMString";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(37);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r5,$r6];
    seq_2:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_3
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "USVString", $this->currPos, 9, false) === 0) {
      $r7 = "USVString";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(43);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = [$r7,$r8];
    seq_3:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseRecordType($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "record", $this->currPos, 6, false) === 0) {
      $r3 = "record";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(57);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r5 = "<";
    } else {
      if (!$silence) {$this->fail(32);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseStringType($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r8 = ",";
    } else {
      if (!$silence) {$this->fail(17);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r11 = ">";
    } else {
      if (!$silence) {$this->fail(34);}
      $r11 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseArgumentName($silence) {
    // start choice_1
    $r1 = $this->parseArgumentNameKeyword($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseidentifier($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseEllipsis($silence) {
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "...", $this->currPos, 3, false) === 0) {
      $r3 = "...";
      $this->currPos += 3;
    } else {
      if (!$silence) {$this->fail(30);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    // free $p2
    return $r1;
  }
  private function parseBooleanLiteral($silence) {
    // start choice_1
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "true", $this->currPos, 4, false) === 0) {
      $r4 = "true";
      $this->currPos += 4;
    } else {
      if (!$silence) {$this->fail(61);}
      $r4 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->discard_($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a13();
      goto choice_1;
    }
    // free $p3
    $p3 = $this->currPos;
    // start seq_2
    $p6 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "false", $this->currPos, 5, false) === 0) {
      $r7 = "false";
      $this->currPos += 5;
    } else {
      if (!$silence) {$this->fail(49);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r8 = $this->discard_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p6;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = true;
    seq_2:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p3;
      $r1 = $this->a14();
    }
    // free $p6
    choice_1:
    return $r1;
  }
  private function parseFloatLiteral($silence) {
    // start choice_1
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    $r4 = $this->parsedecimal($silence);
    // f <- $r4
    if ($r4===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->discard_($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a15($r4);
      goto choice_1;
    }
    // free $p3
    $p3 = $this->currPos;
    // start seq_2
    $p6 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "-Infinity", $this->currPos, 9, false) === 0) {
      $r7 = "-Infinity";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(28);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r8 = $this->discard_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p6;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = true;
    seq_2:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p3;
      $r1 = $this->a16();
      goto choice_1;
    }
    // free $p6
    $p6 = $this->currPos;
    // start seq_3
    $p9 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Infinity", $this->currPos, 8, false) === 0) {
      $r10 = "Infinity";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(39);}
      $r10 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r11 = $this->discard_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p9;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = true;
    seq_3:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p6;
      $r1 = $this->a17();
      goto choice_1;
    }
    // free $p9
    $p9 = $this->currPos;
    // start seq_4
    $p12 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "NaN", $this->currPos, 3, false) === 0) {
      $r13 = "NaN";
      $this->currPos += 3;
    } else {
      if (!$silence) {$this->fail(40);}
      $r13 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r14 = $this->discard_($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p12;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = true;
    seq_4:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p9;
      $r1 = $this->a18();
    }
    // free $p12
    choice_1:
    return $r1;
  }
  private function discard_($silence) {
    for (;;) {
      // start choice_1
      $r2 = $this->discardwhitespace($silence);
      if ($r2!==self::$FAILED) {
        goto choice_1;
      }
      $r2 = $this->discardcomment($silence);
      choice_1:
      if ($r2===self::$FAILED) {
        break;
      }
    }
    // free $r2
    $r1 = true;
    // free $r1
    return $r1;
  }
  private function parseOperation($silence) {
    // start choice_1
    $r1 = $this->parseRegularOperation($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseSpecialOperation($silence);
    choice_1:
    return $r1;
  }
  private function parseStaticMember($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "static", $this->currPos, 6, false) === 0) {
      $r3 = "static";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(87);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseStaticMemberRest($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseIterable($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "iterable", $this->currPos, 8, false) === 0) {
      $r3 = "iterable";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(80);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r5 = "<";
    } else {
      if (!$silence) {$this->fail(32);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parseOptionalType($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r9 = ">";
    } else {
      if (!$silence) {$this->fail(34);}
      $r9 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parse_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r11 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r11 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseAsyncIterable($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "async", $this->currPos, 5, false) === 0) {
      $r3 = "async";
      $this->currPos += 5;
    } else {
      if (!$silence) {$this->fail(73);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "iterable", $this->currPos, 8, false) === 0) {
      $r5 = "iterable";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(80);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r7 = "<";
    } else {
      if (!$silence) {$this->fail(32);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parseOptionalType($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r11 = ">";
    } else {
      if (!$silence) {$this->fail(34);}
      $r11 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r13 = $this->parseOptionalArgumentList($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r14 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r14 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r15 = $this->parse_($silence);
    if ($r15===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12,$r13,$r14,$r15];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseReadOnlyMember($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "readonly", $this->currPos, 8, false) === 0) {
      $r3 = "readonly";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(83);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseReadOnlyMemberRest($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseMaplikeRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "maplike", $this->currPos, 7, false) === 0) {
      $r3 = "maplike";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(81);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r5 = "<";
    } else {
      if (!$silence) {$this->fail(32);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r8 = ",";
    } else {
      if (!$silence) {$this->fail(17);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r11 = ">";
    } else {
      if (!$silence) {$this->fail(34);}
      $r11 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r13 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r13 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r14 = $this->parse_($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11,$r12,$r13,$r14];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseSetlikeRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "setlike", $this->currPos, 7, false) === 0) {
      $r3 = "setlike";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(85);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r5 = "<";
    } else {
      if (!$silence) {$this->fail(32);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r8 = ">";
    } else {
      if (!$silence) {$this->fail(34);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parse_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r10 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r10 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r11 = $this->parse_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9,$r10,$r11];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseInheritAttribute($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "inherit", $this->currPos, 7, false) === 0) {
      $r3 = "inherit";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(79);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseAttributeRest($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseStringifierRest($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseOptionalReadOnly($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseAttributeRest($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = $this->parseRegularOperation($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_2
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r5 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r5,$r6];
    seq_2:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseOperationName($silence) {
    // start choice_1
    $r1 = $this->parseOperationNameKeyword($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseidentifier($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseUnsignedIntegerType($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "unsigned", $this->currPos, 8, false) === 0) {
      $r3 = "unsigned";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(62);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseIntegerType($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = $this->parseIntegerType($silence);
    choice_1:
    return $r1;
  }
  private function parseUnrestrictedFloatType($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "unrestricted", $this->currPos, 12, false) === 0) {
      $r3 = "unrestricted";
      $this->currPos += 12;
    } else {
      if (!$silence) {$this->fail(89);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseFloatType($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = $this->parseFloatType($silence);
    choice_1:
    return $r1;
  }
  private function discardwhitespace($silence) {
    $r1 = self::$FAILED;
    for (;;) {
      // start choice_1
      $r2 = $this->input[$this->currPos] ?? '';
      if ($r2 === "\x09" || $r2 === " ") {
        $this->currPos++;
        goto choice_1;
      } else {
        $r2 = self::$FAILED;
        if (!$silence) {$this->fail(1);}
      }
      $r2 = $this->discardeol($silence);
      choice_1:
      if ($r2!==self::$FAILED) {
        $r1 = true;
      } else {
        break;
      }
    }
    // free $r2
    return $r1;
  }
  private function discardcomment($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "//", $this->currPos, 2, false) === 0) {
      $r3 = "//";
      $this->currPos += 2;
    } else {
      if (!$silence) {$this->fail(2);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    for (;;) {
      $r5 = self::charAt($this->input, $this->currPos);
      if ($r5 !== '' && !($r5 === "\x0a" || $r5 === "\x0d")) {
        $this->currPos += strlen($r5);
      } else {
        $r5 = self::$FAILED;
        if (!$silence) {$this->fail(3);}
        break;
      }
    }
    // free $r5
    $r4 = true;
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $r4
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "/*", $this->currPos, 2, false) === 0) {
      $r4 = "/*";
      $this->currPos += 2;
    } else {
      if (!$silence) {$this->fail(4);}
      $r4 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    for (;;) {
      // start choice_2
      $r6 = self::$FAILED;
      for (;;) {
        if (strcspn($this->input, "\x0a\x0d*", $this->currPos, 1) !== 0) {
          $r7 = self::consumeChar($this->input, $this->currPos);
          $r6 = true;
        } else {
          $r7 = self::$FAILED;
          if (!$silence) {$this->fail(5);}
          break;
        }
      }
      if ($r6!==self::$FAILED) {
        goto choice_2;
      }
      // free $r7
      $r6 = $this->discardeol($silence);
      if ($r6!==self::$FAILED) {
        goto choice_2;
      }
      // start seq_3
      $p8 = $this->currPos;
      if (($this->input[$this->currPos] ?? null) === "*") {
        $this->currPos++;
        $r7 = "*";
      } else {
        if (!$silence) {$this->fail(6);}
        $r7 = self::$FAILED;
        $r6 = self::$FAILED;
        goto seq_3;
      }
      $p9 = $this->currPos;
      if (($this->input[$this->currPos] ?? null) === "/") {
        $this->currPos++;
        $r10 = "/";
      } else {
        $r10 = self::$FAILED;
      }
      if ($r10 === self::$FAILED) {
        $r10 = false;
      } else {
        $r10 = self::$FAILED;
        $this->currPos = $p9;
        $this->currPos = $p8;
        $r6 = self::$FAILED;
        goto seq_3;
      }
      // free $p9
      $r6 = true;
      seq_3:
      // free $p8
      choice_2:
      if ($r6===self::$FAILED) {
        break;
      }
    }
    // free $r6
    $r5 = true;
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    // free $r5
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "*/", $this->currPos, 2, false) === 0) {
      $r5 = "*/";
      $this->currPos += 2;
    } else {
      if (!$silence) {$this->fail(7);}
      $r5 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = true;
    seq_2:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseSpecialOperation($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseSpecial($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseRegularOperation($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseStaticMemberRest($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseOptionalReadOnly($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseAttributeRest($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = $this->parseRegularOperation($silence);
    choice_1:
    return $r1;
  }
  private function parseOptionalType($silence) {
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r3 = ",";
    } else {
      if (!$silence) {$this->fail(17);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5];
    seq_1:
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    // free $p2
    return $r1;
  }
  private function parseOptionalArgumentList($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "(") {
      $this->currPos++;
      $r3 = "(";
    } else {
      if (!$silence) {$this->fail(13);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseArgumentList($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r6 = ")";
    } else {
      if (!$silence) {$this->fail(14);}
      $r6 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parse_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4,$r5,$r6,$r7];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = '';
    choice_1:
    return $r1;
  }
  private function parseReadOnlyMemberRest($silence) {
    // start choice_1
    $r1 = $this->parseAttributeRest($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseMaplikeRest($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseSetlikeRest($silence);
    choice_1:
    return $r1;
  }
  private function parseOperationNameKeyword($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "includes", $this->currPos, 8, false) === 0) {
      $r3 = "includes";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(26);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseIntegerType($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "short", $this->currPos, 5, false) === 0) {
      $r3 = "short";
      $this->currPos += 5;
    } else {
      if (!$silence) {$this->fail(59);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "long", $this->currPos, 4, false) === 0) {
      $r5 = "long";
      $this->currPos += 4;
    } else {
      if (!$silence) {$this->fail(51);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r7 = $this->parseOptionalLong($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r5,$r6,$r7];
    seq_2:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseFloatType($silence) {
    // start seq_1
    $p1 = $this->currPos;
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "float", $this->currPos, 5, false) === 0) {
      $r3 = "float";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(50);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "double", $this->currPos, 6, false) === 0) {
      $r3 = "double";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(48);}
      $r3 = self::$FAILED;
    }
    choice_1:
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function discardeol($silence) {
    $p2 = $this->currPos;
    // start choice_1
    if (($this->input[$this->currPos] ?? null) === "\x0a") {
      $this->currPos++;
      $r3 = "\x0a";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(10);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "\x0d\x0a", $this->currPos, 2, false) === 0) {
      $r3 = "\x0d\x0a";
      $this->currPos += 2;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(11);}
      $r3 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "\x0d") {
      $this->currPos++;
      $r3 = "\x0d";
    } else {
      if (!$silence) {$this->fail(12);}
      $r3 = self::$FAILED;
    }
    choice_1:
    // nl <- $r3
    $r1 = $r3;
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a0($r3);
    }
    return $r1;
  }
  private function parseSpecial($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "getter", $this->currPos, 6, false) === 0) {
      $r3 = "getter";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(78);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_2
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "setter", $this->currPos, 6, false) === 0) {
      $r5 = "setter";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(86);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parse_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r5,$r6];
    seq_2:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_3
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "deleter", $this->currPos, 7, false) === 0) {
      $r7 = "deleter";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(77);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r8 = $this->parse_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = [$r7,$r8];
    seq_3:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseOptionalLong($silence) {
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "long", $this->currPos, 4, false) === 0) {
      $r3 = "long";
      $this->currPos += 4;
    } else {
      if (!$silence) {$this->fail(51);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = [$r3,$r4];
    seq_1:
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    // free $p2
    return $r1;
  }

  public function parse($input, $options = []) {
    $this->initInternal($input, $options);
    $startRule = $options['startRule'] ?? '(DEFAULT)';
    $result = null;

    if (!empty($options['stream'])) {
      switch ($startRule) {
        
        default:
          throw new \WikiPEG\InternalError("Can't stream rule $startRule.");
      }
    } else {
      switch ($startRule) {
        case '(DEFAULT)':
        case "start":
          $result = $this->parsestart(false);
          break;
        default:
          throw new \WikiPEG\InternalError("Can't start parsing from rule $startRule.");
      }
    }

    if ($result !== self::$FAILED && $this->currPos === $this->inputLength) {
      return $result;
    } else {
      if ($result !== self::$FAILED && $this->currPos < $this->inputLength) {
        $this->fail(0);
      }
      throw $this->buildParseException();
    }
  }
}

