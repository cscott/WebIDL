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
    27 => ["type" => "class", "value" => "[-_]", "description" => "[-_]"],
    28 => ["type" => "class", "value" => "[A-Za-z]", "description" => "[A-Za-z]"],
    29 => ["type" => "class", "value" => "[-_0-9A-Za-z]", "description" => "[-_0-9A-Za-z]"],
    30 => ["type" => "literal", "value" => ":", "description" => "\":\""],
    31 => ["type" => "literal", "value" => "ByteString", "description" => "\"ByteString\""],
    32 => ["type" => "literal", "value" => "DOMString", "description" => "\"DOMString\""],
    33 => ["type" => "literal", "value" => "FrozenArray", "description" => "\"FrozenArray\""],
    34 => ["type" => "literal", "value" => "Infinity", "description" => "\"Infinity\""],
    35 => ["type" => "literal", "value" => "NaN", "description" => "\"NaN\""],
    36 => ["type" => "literal", "value" => "ObservableArray", "description" => "\"ObservableArray\""],
    37 => ["type" => "literal", "value" => "Promise", "description" => "\"Promise\""],
    38 => ["type" => "literal", "value" => "USVString", "description" => "\"USVString\""],
    39 => ["type" => "literal", "value" => "any", "description" => "\"any\""],
    40 => ["type" => "literal", "value" => "bigint", "description" => "\"bigint\""],
    41 => ["type" => "literal", "value" => "boolean", "description" => "\"boolean\""],
    42 => ["type" => "literal", "value" => "byte", "description" => "\"byte\""],
    43 => ["type" => "literal", "value" => "double", "description" => "\"double\""],
    44 => ["type" => "literal", "value" => "false", "description" => "\"false\""],
    45 => ["type" => "literal", "value" => "float", "description" => "\"float\""],
    46 => ["type" => "literal", "value" => "long", "description" => "\"long\""],
    47 => ["type" => "literal", "value" => "null", "description" => "\"null\""],
    48 => ["type" => "literal", "value" => "object", "description" => "\"object\""],
    49 => ["type" => "literal", "value" => "octet", "description" => "\"octet\""],
    50 => ["type" => "literal", "value" => "or", "description" => "\"or\""],
    51 => ["type" => "literal", "value" => "optional", "description" => "\"optional\""],
    52 => ["type" => "literal", "value" => "record", "description" => "\"record\""],
    53 => ["type" => "literal", "value" => "sequence", "description" => "\"sequence\""],
    54 => ["type" => "literal", "value" => "short", "description" => "\"short\""],
    55 => ["type" => "literal", "value" => "symbol", "description" => "\"symbol\""],
    56 => ["type" => "literal", "value" => "true", "description" => "\"true\""],
    57 => ["type" => "literal", "value" => "unsigned", "description" => "\"unsigned\""],
    58 => ["type" => "literal", "value" => "undefined", "description" => "\"undefined\""],
    59 => ["type" => "literal", "value" => "async", "description" => "\"async\""],
    60 => ["type" => "literal", "value" => "attribute", "description" => "\"attribute\""],
    61 => ["type" => "literal", "value" => "const", "description" => "\"const\""],
    62 => ["type" => "literal", "value" => "constructor", "description" => "\"constructor\""],
    63 => ["type" => "literal", "value" => "deleter", "description" => "\"deleter\""],
    64 => ["type" => "literal", "value" => "getter", "description" => "\"getter\""],
    65 => ["type" => "literal", "value" => "inherit", "description" => "\"inherit\""],
    66 => ["type" => "literal", "value" => "iterable", "description" => "\"iterable\""],
    67 => ["type" => "literal", "value" => "maplike", "description" => "\"maplike\""],
    68 => ["type" => "literal", "value" => "mixin", "description" => "\"mixin\""],
    69 => ["type" => "literal", "value" => "readonly", "description" => "\"readonly\""],
    70 => ["type" => "literal", "value" => "required", "description" => "\"required\""],
    71 => ["type" => "literal", "value" => "setlike", "description" => "\"setlike\""],
    72 => ["type" => "literal", "value" => "setter", "description" => "\"setter\""],
    73 => ["type" => "literal", "value" => "static", "description" => "\"static\""],
    74 => ["type" => "literal", "value" => "stringifier", "description" => "\"stringifier\""],
    75 => ["type" => "literal", "value" => "unrestricted", "description" => "\"unrestricted\""],
    76 => ["type" => "literal", "value" => "ArrayBuffer", "description" => "\"ArrayBuffer\""],
    77 => ["type" => "literal", "value" => "DataView", "description" => "\"DataView\""],
    78 => ["type" => "literal", "value" => "Int8Array", "description" => "\"Int8Array\""],
    79 => ["type" => "literal", "value" => "Int16Array", "description" => "\"Int16Array\""],
    80 => ["type" => "literal", "value" => "Int32Array", "description" => "\"Int32Array\""],
    81 => ["type" => "literal", "value" => "Uint8Array", "description" => "\"Uint8Array\""],
    82 => ["type" => "literal", "value" => "Uint16Array", "description" => "\"Uint16Array\""],
    83 => ["type" => "literal", "value" => "Uint32Array", "description" => "\"Uint32Array\""],
    84 => ["type" => "literal", "value" => "Uint8ClampedArray", "description" => "\"Uint8ClampedArray\""],
    85 => ["type" => "literal", "value" => "Float32Array", "description" => "\"Float32Array\""],
    86 => ["type" => "literal", "value" => "Float64Array", "description" => "\"Float64Array\""],
    87 => ["type" => "class", "value" => "[0-9]", "description" => "[0-9]"],
    88 => ["type" => "literal", "value" => ".", "description" => "\".\""],
    89 => ["type" => "class", "value" => "[Ee]", "description" => "[Ee]"],
    90 => ["type" => "class", "value" => "[+-]", "description" => "[+-]"],
    91 => ["type" => "literal", "value" => "\"", "description" => "\"\\\"\""],
    92 => ["type" => "class", "value" => "[^\\\"]", "description" => "[^\\\"]"],
    93 => ["type" => "class", "value" => "[^\\t\\n\\r 0-9A-Za-z]", "description" => "[^\\t\\n\\r 0-9A-Za-z]"],
    94 => ["type" => "literal", "value" => "-", "description" => "\"-\""],
    95 => ["type" => "literal", "value" => "-Infinity", "description" => "\"-Infinity\""],
    96 => ["type" => "literal", "value" => "...", "description" => "\"...\""],
    97 => ["type" => "literal", "value" => "<", "description" => "\"<\""],
    98 => ["type" => "literal", "value" => "=", "description" => "\"=\""],
    99 => ["type" => "literal", "value" => ">", "description" => "\">\""],
    100 => ["type" => "literal", "value" => "?", "description" => "\"?\""],
    101 => ["type" => "class", "value" => "[1-9]", "description" => "[1-9]"],
    102 => ["type" => "literal", "value" => "0x", "description" => "\"0x\""],
    103 => ["type" => "literal", "value" => "0X", "description" => "\"0X\""],
    104 => ["type" => "class", "value" => "[0-9A-Fa-f]", "description" => "[0-9A-Fa-f]"],
    105 => ["type" => "literal", "value" => "0", "description" => "\"0\""],
    106 => ["type" => "class", "value" => "[0-7]", "description" => "[0-7]"],
  ];

  // actions
  private function a0($d) {
   return $d; 
  }
  private function a1($e, $d) {
  
  	$d['extAttrs'] = $e;
  	return $d;
  
  }
  private function a2($e, $rest) {
   array_unshift($rest, $e); return $rest; 
  }
  private function a3() {
   return []; 
  }
  private function a4($nl) {
   $this->lineNum++; return $nl; 
  }
  private function a5($im) {
  
     $im['type'] = "interface"; return $im;
   
  }
  private function a6($name, $m) {
  
     return [
        'type' => 'namespace',
        'name' => $name,
        'partial' => false,
        'members' => $m,
     ];
  
  }
  private function a7($target, $incl) {
  
      return [
         'type' => 'includes',
         'target' => $target,
         'includes' => $incl,
      ];
     
  }
  private function a8($c) {
   return $c; 
  }
  private function a9($s) {
   return $s !== "_constructor" && $s !== "_toString" && $s !== "toString"; 
  }
  private function a10($s) {
   return $s[0] == "_" ? substr($s, 1) : $s ; 
  }
  private function a11($name) {
   return $name; 
  }
  private function a12() {
   return null; 
  }
  private function a13($m, $n) {
  
  	return $m * $n;
  
  }
  private function a14($s) {
   return floatval( $s ); 
  }
  private function a15($s) {
   return $s; 
  }
  private function a16($name, $inh, $m) {
  
      return [
        'name' => $name,
        'inheritance' => $inh,
        'members' => $m,
        'partial' => false,
      ];
  
  }
  private function a17() {
   return -1; 
  }
  private function a18() {
   return 1; 
  }
  private function a19($s) {
   return intval($s); 
  }
  private function a20($s) {
   return hexdec($s); 
  }
  private function a21($s) {
   return octdec( $s ); 
  }
  private function a22($i) {
   return $i; 
  }
  private function a23() {
   return true; 
  }
  private function a24() {
   return false; 
  }
  private function a25($f) {
   return $f; 
  }
  private function a26() {
   return -INF; 
  }
  private function a27() {
   return INF; 
  }
  private function a28() {
   return NAN; 
  }

  // generated
  private function parsestart($silence) {
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    $r4 = $this->discard_($silence);
    if ($r4===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseDefinitions($silence);
    // d <- $r5
    if ($r5===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a0($r5);
    }
    // free $p3
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
  private function parseDefinitions($silence) {
    $r1 = [];
    for (;;) {
      $p3 = $this->currPos;
      // start seq_1
      $p4 = $this->currPos;
      $r5 = $this->parseExtendedAttributeList($silence);
      // e <- $r5
      if ($r5===self::$FAILED) {
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r6 = $this->parseDefinition($silence);
      // d <- $r6
      if ($r6===self::$FAILED) {
        $this->currPos = $p4;
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r2 = true;
      seq_1:
      if ($r2!==self::$FAILED) {
        $this->savedPos = $p3;
        $r2 = $this->a1($r5, $r6);
        $r1[] = $r2;
      } else {
        break;
      }
      // free $p4
    }
    // free $r2
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
  private function parseExtendedAttributeList($silence) {
    // start choice_1
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r4 = "[";
    } else {
      if (!$silence) {$this->fail(8);}
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
    $p7 = $this->currPos;
    $r6 = $this->discardExtendedAttribute($silence);
    // e <- $r6
    if ($r6!==self::$FAILED) {
      $r6 = substr($this->input, $p7, $this->currPos - $p7);
    } else {
      $r6 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $p7
    $r8 = $this->parseExtendedAttributes($silence);
    // rest <- $r8
    if ($r8===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "]") {
      $this->currPos++;
      $r9 = "]";
    } else {
      if (!$silence) {$this->fail(9);}
      $r9 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->discard_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a2($r6, $r8);
      goto choice_1;
    }
    // free $p3
    $p3 = $this->currPos;
    // start seq_2
    $p7 = $this->currPos;
    $p11 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r12 = "[";
    } else {
      $r12 = self::$FAILED;
    }
    if ($r12 === self::$FAILED) {
      $r12 = false;
    } else {
      $r12 = self::$FAILED;
      $this->currPos = $p11;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    // free $p11
    $r1 = true;
    seq_2:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p3;
      $r1 = $this->a3();
    }
    // free $p7
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
      $r1 = $this->a4($r3);
    }
    return $r1;
  }
  private function discardExtendedAttribute($silence) {
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
    $r4 = $this->discard_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->discardExtendedAttributeInner($silence);
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
    $r7 = $this->discard_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->discardExtendedAttributeRest($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
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
    $r10 = $this->discard_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r11 = $this->discardExtendedAttributeInner($silence);
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
    $r13 = $this->discard_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r14 = $this->discardExtendedAttributeRest($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = true;
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
    $r16 = $this->discard_($silence);
    if ($r16===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r17 = $this->discardExtendedAttributeInner($silence);
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
    $r19 = $this->discard_($silence);
    if ($r19===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r20 = $this->discardExtendedAttributeRest($silence);
    if ($r20===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = true;
    seq_3:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_4
    $p2 = $this->currPos;
    $r21 = self::$FAILED;
    for (;;) {
      $r22 = $this->discardOther($silence);
      if ($r22!==self::$FAILED) {
        $r21 = true;
      } else {
        break;
      }
    }
    if ($r21===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_4;
    }
    // free $r22
    $r22 = $this->discardExtendedAttributeRest($silence);
    if ($r22===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = true;
    seq_4:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseExtendedAttributes($silence) {
    // start choice_1
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r4 = ",";
    } else {
      if (!$silence) {$this->fail(17);}
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
    $p7 = $this->currPos;
    $r6 = $this->discardExtendedAttribute($silence);
    // e <- $r6
    if ($r6!==self::$FAILED) {
      $r6 = substr($this->input, $p7, $this->currPos - $p7);
    } else {
      $r6 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $p7
    $r8 = $this->parseExtendedAttributes($silence);
    // rest <- $r8
    if ($r8===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a2($r6, $r8);
      goto choice_1;
    }
    // free $p3
    $p3 = $this->currPos;
    $r1 = '';
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p3;
      $r1 = $this->a3();
    }
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
    $r4 = $this->parsei_($silence);
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
    $p2 = $this->currPos;
    // start seq_2
    $p6 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "interface", $this->currPos, 9, false) === 0) {
      $r7 = "interface";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(19);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r8 = $this->discardi_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p6;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r9 = $this->parseInterfaceOrMixin($silence);
    // im <- $r9
    if ($r9===self::$FAILED) {
      $this->currPos = $p6;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = true;
    seq_2:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a5($r9);
    }
    // free $p6
    choice_1:
    return $r1;
  }
  private function parseNamespace($silence) {
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "namespace", $this->currPos, 9, false) === 0) {
      $r4 = "namespace";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(20);}
      $r4 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->discardi_($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseidentifier($silence);
    // name <- $r6
    if ($r6===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->discard_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r8 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r8 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->discard_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r10 = $this->parseNamespaceMembers($silence);
    // m <- $r10
    if ($r10===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r11 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r11 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r12 = $this->discard_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r13 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r13 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r14 = $this->discard_($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a6($r6, $r10);
    }
    // free $p3
    return $r1;
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
    $r4 = $this->parsei_($silence);
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
    $r4 = $this->parsei_($silence);
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
    $r4 = $this->parsei_($silence);
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
    $r4 = $this->parsei_($silence);
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
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    $r4 = $this->parseidentifier($silence);
    // target <- $r4
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
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "includes", $this->currPos, 8, false) === 0) {
      $r6 = "includes";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(26);}
      $r6 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->discardi_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->parseidentifier($silence);
    // incl <- $r8
    if ($r8===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->discard_($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r10 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r10 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r11 = $this->discard_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a7($r4, $r8);
    }
    // free $p3
    return $r1;
  }
  private function discardExtendedAttributeInner($silence) {
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
    $r4 = $this->discard_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->discardExtendedAttributeInner($silence);
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
    $r7 = $this->discard_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->discardExtendedAttributeInner($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
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
    $r10 = $this->discard_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r11 = $this->discardExtendedAttributeInner($silence);
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
    $r13 = $this->discard_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r14 = $this->discardExtendedAttributeInner($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = true;
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
    $r16 = $this->discard_($silence);
    if ($r16===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r17 = $this->discardExtendedAttributeInner($silence);
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
    $r19 = $this->discard_($silence);
    if ($r19===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r20 = $this->discardExtendedAttributeInner($silence);
    if ($r20===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = true;
    seq_3:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_4
    $p2 = $this->currPos;
    $r21 = $this->discardOtherOrComma($silence);
    if ($r21===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r22 = $this->discardExtendedAttributeInner($silence);
    if ($r22===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = true;
    seq_4:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = '';
    choice_1:
    return $r1;
  }
  private function discardExtendedAttributeRest($silence) {
    $r1 = $this->discardExtendedAttribute($silence);
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    return $r1;
  }
  private function discardOther($silence) {
    // start choice_1
    $r1 = $this->discardOtherIdLike($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->discardArgumentNameKeyword($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->discardBufferRelatedType($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    $p5 = $this->currPos;
    // start choice_2
    $r4 = $this->discardinteger($silence);
    if ($r4!==self::$FAILED) {
      goto choice_2;
    }
    $r4 = $this->discarddecimal($silence);
    if ($r4!==self::$FAILED) {
      goto choice_2;
    }
    $r4 = $this->discardidentifier($silence);
    if ($r4!==self::$FAILED) {
      goto choice_2;
    }
    $r4 = $this->discardstring($silence);
    if ($r4!==self::$FAILED) {
      goto choice_2;
    }
    $r4 = $this->discardotherchar($silence);
    if ($r4!==self::$FAILED) {
      goto choice_2;
    }
    $r4 = $this->discardotherterminals($silence);
    choice_2:
    // c <- $r4
    if ($r4!==self::$FAILED) {
      $r4 = substr($this->input, $p5, $this->currPos - $p5);
    } else {
      $r4 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $p5
    $r6 = $this->discard_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a8($r4);
    }
    // free $p3
    choice_1:
    return $r1;
  }
  private function parsei_($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $p3 = $this->currPos;
    $r4 = $this->input[$this->currPos] ?? '';
    if (preg_match("/^[\\-_0-9A-Za-z]/", $r4)) {
      $this->currPos++;
    } else {
      $r4 = self::$FAILED;
    }
    if ($r4 === self::$FAILED) {
      $r4 = false;
    } else {
      $r4 = self::$FAILED;
      $this->currPos = $p3;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    // free $p3
    $r5 = $this->parse_($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r4,$r5];
    seq_1:
    // free $r2,$p1
    return $r2;
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
    $r4 = $this->parsei_($silence);
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
  private function discardi_($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $p3 = $this->currPos;
    $r4 = $this->input[$this->currPos] ?? '';
    if (preg_match("/^[\\-_0-9A-Za-z]/", $r4)) {
      $this->currPos++;
    } else {
      $r4 = self::$FAILED;
    }
    if ($r4 === self::$FAILED) {
      $r4 = false;
    } else {
      $r4 = self::$FAILED;
      $this->currPos = $p3;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    // free $p3
    $r5 = $this->discard_($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = true;
    seq_1:
    // free $r2,$p1
    return $r2;
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
    // start seq_1
    $p3 = $this->currPos;
    $p4 = $this->currPos;
    // start choice_1
    $r5 = $this->discardArgumentNameKeyword(true);
    if ($r5!==self::$FAILED) {
      goto choice_1;
    }
    $r5 = $this->discardBufferRelatedType(true);
    if ($r5!==self::$FAILED) {
      goto choice_1;
    }
    $r5 = $this->discardOtherIdLike(true);
    choice_1:
    if ($r5 === self::$FAILED) {
      $r5 = false;
    } else {
      $r5 = self::$FAILED;
      $this->currPos = $p4;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $p4
    $p4 = $this->currPos;
    // start seq_2
    $p7 = $this->currPos;
    $r8 = $this->input[$this->currPos] ?? '';
    if ($r8 === "-" || $r8 === "_") {
      $this->currPos++;
    } else {
      $r8 = self::$FAILED;
      if (!$silence) {$this->fail(27);}
      $r8 = null;
    }
    $r9 = $this->input[$this->currPos] ?? '';
    if (preg_match("/^[A-Za-z]/", $r9)) {
      $this->currPos++;
    } else {
      $r9 = self::$FAILED;
      if (!$silence) {$this->fail(28);}
      $this->currPos = $p7;
      $r6 = self::$FAILED;
      goto seq_2;
    }
    for (;;) {
      $r11 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[\\-_0-9A-Za-z]/", $r11)) {
        $this->currPos++;
      } else {
        $r11 = self::$FAILED;
        if (!$silence) {$this->fail(29);}
        break;
      }
    }
    // free $r11
    $r10 = true;
    if ($r10===self::$FAILED) {
      $this->currPos = $p7;
      $r6 = self::$FAILED;
      goto seq_2;
    }
    // free $r10
    $r6 = true;
    seq_2:
    // s <- $r6
    if ($r6!==self::$FAILED) {
      $r6 = substr($this->input, $p4, $this->currPos - $p4);
    } else {
      $r6 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $p7
    // free $p4
    $this->savedPos = $this->currPos;
    $r10 = $this->a9($r6);
    if ($r10) {
      $r10 = false;
    } else {
      $r10 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a10($r6);
    }
    // free $p3
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
    $r4 = $this->parsei_($silence);
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
  private function parseInheritance($silence) {
    // start choice_1
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ":") {
      $this->currPos++;
      $r4 = ":";
    } else {
      if (!$silence) {$this->fail(30);}
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
    $r6 = $this->parseidentifier($silence);
    // name <- $r6
    if ($r6===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->discard_($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a11($r6);
      goto choice_1;
    }
    // free $p3
    $p3 = $this->currPos;
    $r1 = '';
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p3;
      $r1 = $this->a12();
    }
    choice_1:
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
  private function discardOtherOrComma($silence) {
    // start choice_1
    $r1 = $this->discardOther($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
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
    $r4 = $this->discard_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    // free $p2
    choice_1:
    return $r1;
  }
  private function discardOtherIdLike($silence) {
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    $p5 = $this->currPos;
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ByteString", $this->currPos, 10, false) === 0) {
      $r4 = "ByteString";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(31);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "DOMString", $this->currPos, 9, false) === 0) {
      $r4 = "DOMString";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(32);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "FrozenArray", $this->currPos, 11, false) === 0) {
      $r4 = "FrozenArray";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(33);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Infinity", $this->currPos, 8, false) === 0) {
      $r4 = "Infinity";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(34);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "NaN", $this->currPos, 3, false) === 0) {
      $r4 = "NaN";
      $this->currPos += 3;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(35);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ObservableArray", $this->currPos, 15, false) === 0) {
      $r4 = "ObservableArray";
      $this->currPos += 15;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(36);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Promise", $this->currPos, 7, false) === 0) {
      $r4 = "Promise";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(37);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "USVString", $this->currPos, 9, false) === 0) {
      $r4 = "USVString";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(38);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "any", $this->currPos, 3, false) === 0) {
      $r4 = "any";
      $this->currPos += 3;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(39);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "bigint", $this->currPos, 6, false) === 0) {
      $r4 = "bigint";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(40);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "boolean", $this->currPos, 7, false) === 0) {
      $r4 = "boolean";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(41);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "byte", $this->currPos, 4, false) === 0) {
      $r4 = "byte";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(42);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "double", $this->currPos, 6, false) === 0) {
      $r4 = "double";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(43);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "false", $this->currPos, 5, false) === 0) {
      $r4 = "false";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(44);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "float", $this->currPos, 5, false) === 0) {
      $r4 = "float";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(45);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "long", $this->currPos, 4, false) === 0) {
      $r4 = "long";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(46);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "null", $this->currPos, 4, false) === 0) {
      $r4 = "null";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(47);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "object", $this->currPos, 6, false) === 0) {
      $r4 = "object";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(48);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "octet", $this->currPos, 5, false) === 0) {
      $r4 = "octet";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(49);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "or", $this->currPos, 2, false) === 0) {
      $r4 = "or";
      $this->currPos += 2;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(50);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "optional", $this->currPos, 8, false) === 0) {
      $r4 = "optional";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(51);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "record", $this->currPos, 6, false) === 0) {
      $r4 = "record";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(52);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "sequence", $this->currPos, 8, false) === 0) {
      $r4 = "sequence";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(53);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "short", $this->currPos, 5, false) === 0) {
      $r4 = "short";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(54);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "symbol", $this->currPos, 6, false) === 0) {
      $r4 = "symbol";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(55);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "true", $this->currPos, 4, false) === 0) {
      $r4 = "true";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(56);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "unsigned", $this->currPos, 8, false) === 0) {
      $r4 = "unsigned";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(57);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "undefined", $this->currPos, 9, false) === 0) {
      $r4 = "undefined";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(58);}
      $r4 = self::$FAILED;
    }
    choice_1:
    // c <- $r4
    if ($r4!==self::$FAILED) {
      $r4 = substr($this->input, $p5, $this->currPos - $p5);
    } else {
      $r4 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $p5
    $r6 = $this->discardi_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a8($r4);
    }
    // free $p3
    return $r1;
  }
  private function discardArgumentNameKeyword($silence) {
    // start seq_1
    $p1 = $this->currPos;
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "async", $this->currPos, 5, false) === 0) {
      $r3 = "async";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(59);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "attribute", $this->currPos, 9, false) === 0) {
      $r3 = "attribute";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(60);}
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
      if (!$silence) {$this->fail(61);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "constructor", $this->currPos, 11, false) === 0) {
      $r3 = "constructor";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(62);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "deleter", $this->currPos, 7, false) === 0) {
      $r3 = "deleter";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(63);}
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
      if (!$silence) {$this->fail(64);}
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
      if (!$silence) {$this->fail(65);}
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
      if (!$silence) {$this->fail(66);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "maplike", $this->currPos, 7, false) === 0) {
      $r3 = "maplike";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(67);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "mixin", $this->currPos, 5, false) === 0) {
      $r3 = "mixin";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(68);}
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
      if (!$silence) {$this->fail(69);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "required", $this->currPos, 8, false) === 0) {
      $r3 = "required";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(70);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "setlike", $this->currPos, 7, false) === 0) {
      $r3 = "setlike";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(71);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "setter", $this->currPos, 6, false) === 0) {
      $r3 = "setter";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(72);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "static", $this->currPos, 6, false) === 0) {
      $r3 = "static";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(73);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "stringifier", $this->currPos, 11, false) === 0) {
      $r3 = "stringifier";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(74);}
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
      if (!$silence) {$this->fail(75);}
      $r3 = self::$FAILED;
    }
    choice_1:
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->discardi_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = true;
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function discardBufferRelatedType($silence) {
    // start seq_1
    $p1 = $this->currPos;
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ArrayBuffer", $this->currPos, 11, false) === 0) {
      $r3 = "ArrayBuffer";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(76);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "DataView", $this->currPos, 8, false) === 0) {
      $r3 = "DataView";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(77);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int8Array", $this->currPos, 9, false) === 0) {
      $r3 = "Int8Array";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(78);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int16Array", $this->currPos, 10, false) === 0) {
      $r3 = "Int16Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(79);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int32Array", $this->currPos, 10, false) === 0) {
      $r3 = "Int32Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(80);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint8Array", $this->currPos, 10, false) === 0) {
      $r3 = "Uint8Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(81);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint16Array", $this->currPos, 11, false) === 0) {
      $r3 = "Uint16Array";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(82);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint32Array", $this->currPos, 11, false) === 0) {
      $r3 = "Uint32Array";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(83);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint8ClampedArray", $this->currPos, 17, false) === 0) {
      $r3 = "Uint8ClampedArray";
      $this->currPos += 17;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(84);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Float32Array", $this->currPos, 12, false) === 0) {
      $r3 = "Float32Array";
      $this->currPos += 12;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(85);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Float64Array", $this->currPos, 12, false) === 0) {
      $r3 = "Float64Array";
      $this->currPos += 12;
    } else {
      if (!$silence) {$this->fail(86);}
      $r3 = self::$FAILED;
    }
    choice_1:
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->discardi_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = true;
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function discardinteger($silence) {
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
      $r1 = $this->a13($r4, $r5);
    }
    // free $p3
    return $r1;
  }
  private function discarddecimal($silence) {
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
        if (!$silence) {$this->fail(87);}
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
      if (!$silence) {$this->fail(88);}
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
        if (!$silence) {$this->fail(87);}
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
        if (!$silence) {$this->fail(87);}
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
      if (!$silence) {$this->fail(88);}
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
        if (!$silence) {$this->fail(87);}
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
      if (!$silence) {$this->fail(89);}
      $r15 = self::$FAILED;
      goto seq_5;
    }
    $r17 = $this->input[$this->currPos] ?? '';
    if ($r17 === "+" || $r17 === "-") {
      $this->currPos++;
    } else {
      $r17 = self::$FAILED;
      if (!$silence) {$this->fail(90);}
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
        if (!$silence) {$this->fail(87);}
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
        if (!$silence) {$this->fail(87);}
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
      if (!$silence) {$this->fail(89);}
      $this->currPos = $p8;
      $r7 = self::$FAILED;
      goto seq_6;
    }
    $r21 = $this->input[$this->currPos] ?? '';
    if ($r21 === "+" || $r21 === "-") {
      $this->currPos++;
    } else {
      $r21 = self::$FAILED;
      if (!$silence) {$this->fail(90);}
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
        if (!$silence) {$this->fail(87);}
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
      $r1 = $this->a14($r3);
    }
    return $r1;
  }
  private function discardidentifier($silence) {
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    $p4 = $this->currPos;
    // start choice_1
    $r5 = $this->discardArgumentNameKeyword(true);
    if ($r5!==self::$FAILED) {
      goto choice_1;
    }
    $r5 = $this->discardBufferRelatedType(true);
    if ($r5!==self::$FAILED) {
      goto choice_1;
    }
    $r5 = $this->discardOtherIdLike(true);
    choice_1:
    if ($r5 === self::$FAILED) {
      $r5 = false;
    } else {
      $r5 = self::$FAILED;
      $this->currPos = $p4;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $p4
    $p4 = $this->currPos;
    // start seq_2
    $p7 = $this->currPos;
    $r8 = $this->input[$this->currPos] ?? '';
    if ($r8 === "-" || $r8 === "_") {
      $this->currPos++;
    } else {
      $r8 = self::$FAILED;
      if (!$silence) {$this->fail(27);}
      $r8 = null;
    }
    $r9 = $this->input[$this->currPos] ?? '';
    if (preg_match("/^[A-Za-z]/", $r9)) {
      $this->currPos++;
    } else {
      $r9 = self::$FAILED;
      if (!$silence) {$this->fail(28);}
      $this->currPos = $p7;
      $r6 = self::$FAILED;
      goto seq_2;
    }
    for (;;) {
      $r11 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[\\-_0-9A-Za-z]/", $r11)) {
        $this->currPos++;
      } else {
        $r11 = self::$FAILED;
        if (!$silence) {$this->fail(29);}
        break;
      }
    }
    // free $r11
    $r10 = true;
    if ($r10===self::$FAILED) {
      $this->currPos = $p7;
      $r6 = self::$FAILED;
      goto seq_2;
    }
    // free $r10
    $r6 = true;
    seq_2:
    // s <- $r6
    if ($r6!==self::$FAILED) {
      $r6 = substr($this->input, $p4, $this->currPos - $p4);
    } else {
      $r6 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    // free $p7
    // free $p4
    $this->savedPos = $this->currPos;
    $r10 = $this->a9($r6);
    if ($r10) {
      $r10 = false;
    } else {
      $r10 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a10($r6);
    }
    // free $p3
    return $r1;
  }
  private function discardstring($silence) {
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "\"") {
      $this->currPos++;
      $r4 = "\"";
    } else {
      if (!$silence) {$this->fail(91);}
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
        if (!$silence) {$this->fail(92);}
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
      if (!$silence) {$this->fail(91);}
      $r7 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a15($r5);
    }
    // free $p3
    return $r1;
  }
  private function discardotherchar($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $p3 = $this->currPos;
    $r4 = $this->discardotherterminals(true);
    if ($r4 === self::$FAILED) {
      $r4 = false;
    } else {
      $r4 = self::$FAILED;
      $this->currPos = $p3;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    // free $p3
    $p3 = $this->currPos;
    if (strspn($this->input, "()[]{},", $this->currPos, 1) !== 0) {
      $r5 = $this->input[$this->currPos++];
    } else {
      $r5 = self::$FAILED;
    }
    if ($r5 === self::$FAILED) {
      $r5 = false;
    } else {
      $r5 = self::$FAILED;
      $this->currPos = $p3;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    // free $p3
    $r6 = self::charAt($this->input, $this->currPos);
    if (preg_match("/^[^\\x09\\x0a\\x0d 0-9A-Za-z]/", $r6)) {
      $this->currPos += strlen($r6);
    } else {
      $r6 = self::$FAILED;
      if (!$silence) {$this->fail(93);}
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = true;
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function discardotherterminals($silence) {
    // start choice_1
    if (($this->input[$this->currPos] ?? null) === "-") {
      $this->currPos++;
      $r1 = "-";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(94);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "-Infinity", $this->currPos, 9, false) === 0) {
      $r1 = "-Infinity";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(95);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ".") {
      $this->currPos++;
      $r1 = ".";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(88);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "...", $this->currPos, 3, false) === 0) {
      $r1 = "...";
      $this->currPos += 3;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(96);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ":") {
      $this->currPos++;
      $r1 = ":";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(30);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r1 = ";";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(21);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r1 = "<";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(97);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "=") {
      $this->currPos++;
      $r1 = "=";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(98);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r1 = ">";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(99);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "?") {
      $this->currPos++;
      $r1 = "?";
    } else {
      if (!$silence) {$this->fail(100);}
      $r1 = self::$FAILED;
    }
    choice_1:
    return $r1;
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
      if (!$silence) {$this->fail(98);}
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
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    $r4 = $this->parseidentifier($silence);
    // name <- $r4
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
    $r6 = $this->parseInheritance($silence);
    // inh <- $r6
    if ($r6===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r7 = "{";
    } else {
      if (!$silence) {$this->fail(15);}
      $r7 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r8 = $this->discard_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r9 = $this->parseInterfaceMembers($silence);
    // m <- $r9
    if ($r9===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r10 = "}";
    } else {
      if (!$silence) {$this->fail(16);}
      $r10 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r11 = $this->discard_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r12 = ";";
    } else {
      if (!$silence) {$this->fail(21);}
      $r12 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r13 = $this->discard_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a16($r4, $r6, $r9);
    }
    // free $p3
    return $r1;
  }
  private function parseMixinRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "mixin", $this->currPos, 5, false) === 0) {
      $r3 = "mixin";
      $this->currPos += 5;
    } else {
      if (!$silence) {$this->fail(68);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(69);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
    $r4 = $this->parsei_($silence);
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
  private function parsestring($silence) {
    $p2 = $this->currPos;
    // start seq_1
    $p3 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "\"") {
      $this->currPos++;
      $r4 = "\"";
    } else {
      if (!$silence) {$this->fail(91);}
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
        if (!$silence) {$this->fail(92);}
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
      if (!$silence) {$this->fail(91);}
      $r7 = self::$FAILED;
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a15($r5);
    }
    // free $p3
    return $r1;
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
      $r1 = $this->a17();
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(94);}
      $r1 = self::$FAILED;
    }
    $p3 = $this->currPos;
    $r1 = '';
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p3;
      $r1 = $this->a18();
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
        if (!$silence) {$this->fail(87);}
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
      $r1 = $this->a19($r3);
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
      $r1 = $this->a20($r5);
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
      $r1 = $this->a21($r3);
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
      if (!$silence) {$this->fail(60);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      $r1 = $this->a4($r3);
    }
    return $r1;
  }
  private function parseDictionaryMemberRest($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "required", $this->currPos, 8, false) === 0) {
      $r3 = "required";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(70);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(39);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
    $r4 = $this->parse_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseUnionMemberType($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = [];
    for (;;) {
      // start seq_2
      $p8 = $this->currPos;
      if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "or", $this->currPos, 2, false) === 0) {
        $r9 = "or";
        $this->currPos += 2;
      } else {
        if (!$silence) {$this->fail(50);}
        $r9 = self::$FAILED;
        $r7 = self::$FAILED;
        goto seq_2;
      }
      $r10 = $this->parsei_($silence);
      if ($r10===self::$FAILED) {
        $this->currPos = $p8;
        $r7 = self::$FAILED;
        goto seq_2;
      }
      $r11 = $this->parseUnionMemberType($silence);
      if ($r11===self::$FAILED) {
        $this->currPos = $p8;
        $r7 = self::$FAILED;
        goto seq_2;
      }
      $r7 = [$r9,$r10,$r11];
      seq_2:
      if ($r7!==self::$FAILED) {
        $r6[] = $r7;
      } else {
        break;
      }
      // free $p8
    }
    if (count($r6) === 0) {
      $r6 = self::$FAILED;
    }
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    // free $r7
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
    $r12 = $this->parse_($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r12];
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
      if (!$silence) {$this->fail(100);}
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
      if (!$silence) {$this->fail(61);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(98);}
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
      if (!$silence) {$this->fail(98);}
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
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "sequence", $this->currPos, 8, false) === 0) {
      $r7 = "sequence";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(53);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r8 = $this->parsei_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r9 = "<";
    } else {
      if (!$silence) {$this->fail(97);}
      $r9 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r10 = $this->parse_($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r11 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r12 = ">";
    } else {
      if (!$silence) {$this->fail(99);}
      $r12 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r13 = $this->parse_($silence);
    if ($r13===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r14 = $this->parseNull($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = [$r7,$r8,$r9,$r10,$r11,$r12,$r13,$r14];
    seq_3:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_4
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "object", $this->currPos, 6, false) === 0) {
      $r15 = "object";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(48);}
      $r15 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r16 = $this->parsei_($silence);
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
    $r1 = [$r15,$r16,$r17];
    seq_4:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_5
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "symbol", $this->currPos, 6, false) === 0) {
      $r18 = "symbol";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(55);}
      $r18 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_5;
    }
    $r19 = $this->parsei_($silence);
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
    $r21 = $this->parseBufferRelatedType($silence);
    if ($r21===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_6;
    }
    $r22 = $this->parseNull($silence);
    if ($r22===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_6;
    }
    $r1 = [$r21,$r22];
    seq_6:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_7
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "FrozenArray", $this->currPos, 11, false) === 0) {
      $r23 = "FrozenArray";
      $this->currPos += 11;
    } else {
      if (!$silence) {$this->fail(33);}
      $r23 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r24 = $this->parsei_($silence);
    if ($r24===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r25 = "<";
    } else {
      if (!$silence) {$this->fail(97);}
      $r25 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r26 = $this->parse_($silence);
    if ($r26===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r27 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r27===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r28 = ">";
    } else {
      if (!$silence) {$this->fail(99);}
      $r28 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r29 = $this->parse_($silence);
    if ($r29===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r30 = $this->parseNull($silence);
    if ($r30===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r1 = [$r23,$r24,$r25,$r26,$r27,$r28,$r29,$r30];
    seq_7:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_8
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ObservableArray", $this->currPos, 15, false) === 0) {
      $r31 = "ObservableArray";
      $this->currPos += 15;
    } else {
      if (!$silence) {$this->fail(36);}
      $r31 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r32 = $this->parsei_($silence);
    if ($r32===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r33 = "<";
    } else {
      if (!$silence) {$this->fail(97);}
      $r33 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r34 = $this->parse_($silence);
    if ($r34===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r35 = $this->parseTypeWithExtendedAttributes($silence);
    if ($r35===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r36 = ">";
    } else {
      if (!$silence) {$this->fail(99);}
      $r36 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r37 = $this->parse_($silence);
    if ($r37===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r38 = $this->parseNull($silence);
    if ($r38===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r1 = [$r31,$r32,$r33,$r34,$r35,$r36,$r37,$r38];
    seq_8:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_9
    $p2 = $this->currPos;
    $r39 = $this->parseRecordType($silence);
    if ($r39===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_9;
    }
    $r40 = $this->parseNull($silence);
    if ($r40===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    $r1 = [$r39,$r40];
    seq_9:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_10
    $p2 = $this->currPos;
    $r41 = $this->parseidentifier($silence);
    if ($r41===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_10;
    }
    $r42 = $this->parse_($silence);
    if ($r42===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_10;
    }
    $r43 = $this->parseNull($silence);
    if ($r43===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_10;
    }
    $r1 = [$r41,$r42,$r43];
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
      if (!$silence) {$this->fail(37);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r5 = "<";
    } else {
      if (!$silence) {$this->fail(97);}
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
      if (!$silence) {$this->fail(99);}
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
      if (!$silence) {$this->fail(51);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      $r1 = $this->a22($r4);
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
      if (!$silence) {$this->fail(62);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(74);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(69);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(59);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "required", $this->currPos, 8, false) === 0) {
      $r3 = "required";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(70);}
      $r3 = self::$FAILED;
    }
    choice_1:
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(47);}
      $r13 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r14 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(58);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(41);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(42);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r8 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(49);}
      $r9 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r10 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(40);}
      $r11 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_5;
    }
    $r12 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(31);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(32);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(38);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r8 = $this->parsei_($silence);
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
  private function parseBufferRelatedType($silence) {
    // start seq_1
    $p1 = $this->currPos;
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ArrayBuffer", $this->currPos, 11, false) === 0) {
      $r3 = "ArrayBuffer";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(76);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "DataView", $this->currPos, 8, false) === 0) {
      $r3 = "DataView";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(77);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int8Array", $this->currPos, 9, false) === 0) {
      $r3 = "Int8Array";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(78);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int16Array", $this->currPos, 10, false) === 0) {
      $r3 = "Int16Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(79);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int32Array", $this->currPos, 10, false) === 0) {
      $r3 = "Int32Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(80);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint8Array", $this->currPos, 10, false) === 0) {
      $r3 = "Uint8Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(81);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint16Array", $this->currPos, 11, false) === 0) {
      $r3 = "Uint16Array";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(82);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint32Array", $this->currPos, 11, false) === 0) {
      $r3 = "Uint32Array";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(83);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint8ClampedArray", $this->currPos, 17, false) === 0) {
      $r3 = "Uint8ClampedArray";
      $this->currPos += 17;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(84);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Float32Array", $this->currPos, 12, false) === 0) {
      $r3 = "Float32Array";
      $this->currPos += 12;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(85);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Float64Array", $this->currPos, 12, false) === 0) {
      $r3 = "Float64Array";
      $this->currPos += 12;
    } else {
      if (!$silence) {$this->fail(86);}
      $r3 = self::$FAILED;
    }
    choice_1:
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
  private function parseRecordType($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "record", $this->currPos, 6, false) === 0) {
      $r3 = "record";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(52);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r5 = "<";
    } else {
      if (!$silence) {$this->fail(97);}
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
      if (!$silence) {$this->fail(99);}
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
      if (!$silence) {$this->fail(96);}
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
      if (!$silence) {$this->fail(56);}
      $r4 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->discardi_($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p3;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r1 = true;
    seq_1:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p2;
      $r1 = $this->a23();
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
      if (!$silence) {$this->fail(44);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r8 = $this->discardi_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p6;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = true;
    seq_2:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p3;
      $r1 = $this->a24();
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
      $r1 = $this->a25($r4);
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
      if (!$silence) {$this->fail(95);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r8 = $this->discardi_($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p6;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = true;
    seq_2:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p3;
      $r1 = $this->a26();
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
      if (!$silence) {$this->fail(34);}
      $r10 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r11 = $this->discardi_($silence);
    if ($r11===self::$FAILED) {
      $this->currPos = $p9;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = true;
    seq_3:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p6;
      $r1 = $this->a27();
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
      if (!$silence) {$this->fail(35);}
      $r13 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r14 = $this->discardi_($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p12;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = true;
    seq_4:
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p9;
      $r1 = $this->a28();
    }
    // free $p12
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
      $r1 = $this->a13($r4, $r5);
    }
    // free $p3
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
      if (!$silence) {$this->fail(73);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(66);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r5 = "<";
    } else {
      if (!$silence) {$this->fail(97);}
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
      if (!$silence) {$this->fail(99);}
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
      if (!$silence) {$this->fail(59);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "iterable", $this->currPos, 8, false) === 0) {
      $r5 = "iterable";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(66);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parsei_($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r7 = "<";
    } else {
      if (!$silence) {$this->fail(97);}
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
      if (!$silence) {$this->fail(99);}
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
      if (!$silence) {$this->fail(69);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(67);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r5 = "<";
    } else {
      if (!$silence) {$this->fail(97);}
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
      if (!$silence) {$this->fail(99);}
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
      if (!$silence) {$this->fail(71);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r5 = "<";
    } else {
      if (!$silence) {$this->fail(97);}
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
      if (!$silence) {$this->fail(99);}
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
      if (!$silence) {$this->fail(65);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(57);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(75);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
  private function parseArgumentNameKeyword($silence) {
    // start seq_1
    $p1 = $this->currPos;
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "async", $this->currPos, 5, false) === 0) {
      $r3 = "async";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(59);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "attribute", $this->currPos, 9, false) === 0) {
      $r3 = "attribute";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(60);}
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
      if (!$silence) {$this->fail(61);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "constructor", $this->currPos, 11, false) === 0) {
      $r3 = "constructor";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(62);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "deleter", $this->currPos, 7, false) === 0) {
      $r3 = "deleter";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(63);}
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
      if (!$silence) {$this->fail(64);}
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
      if (!$silence) {$this->fail(65);}
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
      if (!$silence) {$this->fail(66);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "maplike", $this->currPos, 7, false) === 0) {
      $r3 = "maplike";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(67);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "mixin", $this->currPos, 5, false) === 0) {
      $r3 = "mixin";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(68);}
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
      if (!$silence) {$this->fail(69);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "required", $this->currPos, 8, false) === 0) {
      $r3 = "required";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(70);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "setlike", $this->currPos, 7, false) === 0) {
      $r3 = "setlike";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(71);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "setter", $this->currPos, 6, false) === 0) {
      $r3 = "setter";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(72);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "static", $this->currPos, 6, false) === 0) {
      $r3 = "static";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(73);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "stringifier", $this->currPos, 11, false) === 0) {
      $r3 = "stringifier";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(74);}
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
      if (!$silence) {$this->fail(75);}
      $r3 = self::$FAILED;
    }
    choice_1:
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
        if (!$silence) {$this->fail(87);}
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
      if (!$silence) {$this->fail(88);}
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
        if (!$silence) {$this->fail(87);}
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
        if (!$silence) {$this->fail(87);}
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
      if (!$silence) {$this->fail(88);}
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
        if (!$silence) {$this->fail(87);}
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
      if (!$silence) {$this->fail(89);}
      $r15 = self::$FAILED;
      goto seq_5;
    }
    $r17 = $this->input[$this->currPos] ?? '';
    if ($r17 === "+" || $r17 === "-") {
      $this->currPos++;
    } else {
      $r17 = self::$FAILED;
      if (!$silence) {$this->fail(90);}
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
        if (!$silence) {$this->fail(87);}
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
        if (!$silence) {$this->fail(87);}
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
      if (!$silence) {$this->fail(89);}
      $this->currPos = $p8;
      $r7 = self::$FAILED;
      goto seq_6;
    }
    $r21 = $this->input[$this->currPos] ?? '';
    if ($r21 === "+" || $r21 === "-") {
      $this->currPos++;
    } else {
      $r21 = self::$FAILED;
      if (!$silence) {$this->fail(90);}
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
        if (!$silence) {$this->fail(87);}
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
      $r1 = $this->a14($r3);
    }
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
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(54);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(46);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(45);}
      $r3 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "double", $this->currPos, 6, false) === 0) {
      $r3 = "double";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(43);}
      $r3 = self::$FAILED;
    }
    choice_1:
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
  private function parseSpecial($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "getter", $this->currPos, 6, false) === 0) {
      $r3 = "getter";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(64);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(72);}
      $r5 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(63);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r8 = $this->parsei_($silence);
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
      if (!$silence) {$this->fail(46);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsei_($silence);
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

