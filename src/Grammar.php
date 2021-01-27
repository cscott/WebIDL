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
    1 => ["type" => "literal", "value" => "[", "description" => "\"[\""],
    2 => ["type" => "literal", "value" => "]", "description" => "\"]\""],
    3 => ["type" => "literal", "value" => "(", "description" => "\"(\""],
    4 => ["type" => "literal", "value" => ")", "description" => "\")\""],
    5 => ["type" => "literal", "value" => "{", "description" => "\"{\""],
    6 => ["type" => "literal", "value" => "}", "description" => "\"}\""],
    7 => ["type" => "literal", "value" => ",", "description" => "\",\""],
    8 => ["type" => "literal", "value" => "callback", "description" => "\"callback\""],
    9 => ["type" => "literal", "value" => "partial", "description" => "\"partial\""],
    10 => ["type" => "literal", "value" => "dictionary", "description" => "\"dictionary\""],
    11 => ["type" => "literal", "value" => ";", "description" => "\";\""],
    12 => ["type" => "literal", "value" => "enum", "description" => "\"enum\""],
    13 => ["type" => "literal", "value" => "typedef", "description" => "\"typedef\""],
    14 => ["type" => "literal", "value" => "implements", "description" => "\"implements\""],
    15 => ["type" => "literal", "value" => "-", "description" => "\"-\""],
    16 => ["type" => "literal", "value" => "-Infinity", "description" => "\"-Infinity\""],
    17 => ["type" => "literal", "value" => ".", "description" => "\".\""],
    18 => ["type" => "literal", "value" => "...", "description" => "\"...\""],
    19 => ["type" => "literal", "value" => ":", "description" => "\":\""],
    20 => ["type" => "literal", "value" => "<", "description" => "\"<\""],
    21 => ["type" => "literal", "value" => "=", "description" => "\"=\""],
    22 => ["type" => "literal", "value" => ">", "description" => "\">\""],
    23 => ["type" => "literal", "value" => "?", "description" => "\"?\""],
    24 => ["type" => "literal", "value" => "ByteString", "description" => "\"ByteString\""],
    25 => ["type" => "literal", "value" => "DOMString", "description" => "\"DOMString\""],
    26 => ["type" => "literal", "value" => "Infinity", "description" => "\"Infinity\""],
    27 => ["type" => "literal", "value" => "NaN", "description" => "\"NaN\""],
    28 => ["type" => "literal", "value" => "USVString", "description" => "\"USVString\""],
    29 => ["type" => "literal", "value" => "any", "description" => "\"any\""],
    30 => ["type" => "literal", "value" => "boolean", "description" => "\"boolean\""],
    31 => ["type" => "literal", "value" => "byte", "description" => "\"byte\""],
    32 => ["type" => "literal", "value" => "double", "description" => "\"double\""],
    33 => ["type" => "literal", "value" => "false", "description" => "\"false\""],
    34 => ["type" => "literal", "value" => "float", "description" => "\"float\""],
    35 => ["type" => "literal", "value" => "long", "description" => "\"long\""],
    36 => ["type" => "literal", "value" => "null", "description" => "\"null\""],
    37 => ["type" => "literal", "value" => "object", "description" => "\"object\""],
    38 => ["type" => "literal", "value" => "octet", "description" => "\"octet\""],
    39 => ["type" => "literal", "value" => "or", "description" => "\"or\""],
    40 => ["type" => "literal", "value" => "optional", "description" => "\"optional\""],
    41 => ["type" => "literal", "value" => "sequence", "description" => "\"sequence\""],
    42 => ["type" => "literal", "value" => "short", "description" => "\"short\""],
    43 => ["type" => "literal", "value" => "true", "description" => "\"true\""],
    44 => ["type" => "literal", "value" => "unsigned", "description" => "\"unsigned\""],
    45 => ["type" => "literal", "value" => "void", "description" => "\"void\""],
    46 => ["type" => "literal", "value" => "interface", "description" => "\"interface\""],
    47 => ["type" => "literal", "value" => "_", "description" => "\"_\""],
    48 => ["type" => "class", "value" => "[A-Za-z]", "description" => "[A-Za-z]"],
    49 => ["type" => "class", "value" => "[-_0-9A-Za-z]", "description" => "[-_0-9A-Za-z]"],
    50 => ["type" => "class", "value" => "[0-9]", "description" => "[0-9]"],
    51 => ["type" => "class", "value" => "[Ee]", "description" => "[Ee]"],
    52 => ["type" => "class", "value" => "[+-]", "description" => "[+-]"],
    53 => ["type" => "literal", "value" => "\"", "description" => "\"\\\"\""],
    54 => ["type" => "class", "value" => "[^\\\"]", "description" => "[^\\\"]"],
    55 => ["type" => "class", "value" => "[^\\t\\n\\r 0-9A-Za-z]", "description" => "[^\\t\\n\\r 0-9A-Za-z]"],
    56 => ["type" => "literal", "value" => "attribute", "description" => "\"attribute\""],
    57 => ["type" => "literal", "value" => "const", "description" => "\"const\""],
    58 => ["type" => "literal", "value" => "deleter", "description" => "\"deleter\""],
    59 => ["type" => "literal", "value" => "getter", "description" => "\"getter\""],
    60 => ["type" => "literal", "value" => "inherit", "description" => "\"inherit\""],
    61 => ["type" => "literal", "value" => "iterable", "description" => "\"iterable\""],
    62 => ["type" => "literal", "value" => "legacycaller", "description" => "\"legacycaller\""],
    63 => ["type" => "literal", "value" => "required", "description" => "\"required\""],
    64 => ["type" => "literal", "value" => "serializer", "description" => "\"serializer\""],
    65 => ["type" => "literal", "value" => "setter", "description" => "\"setter\""],
    66 => ["type" => "literal", "value" => "static", "description" => "\"static\""],
    67 => ["type" => "literal", "value" => "stringifier", "description" => "\"stringifier\""],
    68 => ["type" => "literal", "value" => "unrestricted", "description" => "\"unrestricted\""],
    69 => ["type" => "literal", "value" => "ArrayBuffer", "description" => "\"ArrayBuffer\""],
    70 => ["type" => "literal", "value" => "DataView", "description" => "\"DataView\""],
    71 => ["type" => "literal", "value" => "Int8Array", "description" => "\"Int8Array\""],
    72 => ["type" => "literal", "value" => "Int16Array", "description" => "\"Int16Array\""],
    73 => ["type" => "literal", "value" => "Int32Array", "description" => "\"Int32Array\""],
    74 => ["type" => "literal", "value" => "Uint8Array", "description" => "\"Uint8Array\""],
    75 => ["type" => "literal", "value" => "Uint16Array", "description" => "\"Uint16Array\""],
    76 => ["type" => "literal", "value" => "Uint32Array", "description" => "\"Uint32Array\""],
    77 => ["type" => "literal", "value" => "Uint8ClampedArray", "description" => "\"Uint8ClampedArray\""],
    78 => ["type" => "literal", "value" => "Float32Array", "description" => "\"Float32Array\""],
    79 => ["type" => "literal", "value" => "Float64Array", "description" => "\"Float64Array\""],
    80 => ["type" => "class", "value" => "[1-9]", "description" => "[1-9]"],
    81 => ["type" => "literal", "value" => "0x", "description" => "\"0x\""],
    82 => ["type" => "literal", "value" => "0X", "description" => "\"0X\""],
    83 => ["type" => "class", "value" => "[0-9A-Fa-f]", "description" => "[0-9A-Fa-f]"],
    84 => ["type" => "literal", "value" => "0", "description" => "\"0\""],
    85 => ["type" => "class", "value" => "[0-7]", "description" => "[0-7]"],
    86 => ["type" => "literal", "value" => "Error", "description" => "\"Error\""],
    87 => ["type" => "literal", "value" => "DOMException", "description" => "\"DOMException\""],
    88 => ["type" => "literal", "value" => "readonly", "description" => "\"readonly\""],
    89 => ["type" => "literal", "value" => "Promise", "description" => "\"Promise\""],
  ];

  // actions
  private function a0($s) {
   return $s; 
  }
  private function a1($m, $n) {
  
  	return m*n;
  
  }
  private function a2($s) {
   return floatval( $s ); 
  }
  private function a3() {
   return -1; 
  }
  private function a4() {
   return 1; 
  }
  private function a5($s) {
   return intval($s); 
  }
  private function a6($s) {
   return hexdec($s); 
  }
  private function a7($s) {
   return octdec( $s ); 
  }
  private function a8() {
   return null; 
  }
  private function a9() {
   return true; 
  }
  private function a10() {
   return false; 
  }
  private function a11() {
   return -INF; 
  }
  private function a12() {
   return INF; 
  }
  private function a13() {
   return NAN; 
  }

  // generated
  private function parsestart($silence) {
    $r1 = $this->parseDefinitions($silence);
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
  private function parseExtendedAttributeList($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r3 = "[";
    } else {
      if (!$silence) {$this->fail(1);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseExtendedAttribute($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseExtendedAttributes($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "]") {
      $this->currPos++;
      $r6 = "]";
    } else {
      if (!$silence) {$this->fail(2);}
      $r6 = self::$FAILED;
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
  private function parseDefinition($silence) {
    // start choice_1
    $r1 = $this->parseCallbackOrInterface($silence);
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
    $r1 = $this->parseImplementsStatement($silence);
    choice_1:
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
      if (!$silence) {$this->fail(3);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseExtendedAttributeInner($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r5 = ")";
    } else {
      if (!$silence) {$this->fail(4);}
      $r5 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseExtendedAttributeRest($silence);
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
    // start seq_2
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r7 = "[";
    } else {
      if (!$silence) {$this->fail(1);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r8 = $this->parseExtendedAttributeInner($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    if (($this->input[$this->currPos] ?? null) === "]") {
      $this->currPos++;
      $r9 = "]";
    } else {
      if (!$silence) {$this->fail(2);}
      $r9 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r10 = $this->parseExtendedAttributeRest($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r7,$r8,$r9,$r10];
    seq_2:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_3
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r11 = "{";
    } else {
      if (!$silence) {$this->fail(5);}
      $r11 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r12 = $this->parseExtendedAttributeInner($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r13 = "}";
    } else {
      if (!$silence) {$this->fail(6);}
      $r13 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r14 = $this->parseExtendedAttributeRest($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = [$r11,$r12,$r13,$r14];
    seq_3:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_4
    $p2 = $this->currPos;
    $r15 = $this->parseOther($silence);
    if ($r15===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r16 = $this->parseExtendedAttributeRest($silence);
    if ($r16===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = [$r15,$r16];
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
      if (!$silence) {$this->fail(7);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseExtendedAttribute($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseExtendedAttributes($silence);
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
    $r1 = '';
    choice_1:
    return $r1;
  }
  private function parseCallbackOrInterface($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "callback", $this->currPos, 8, false) === 0) {
      $r3 = "callback";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(8);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseCallbackRestOrInterface($silence);
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
    $r1 = $this->parseInterface($silence);
    choice_1:
    return $r1;
  }
  private function parsePartial($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "partial", $this->currPos, 7, false) === 0) {
      $r3 = "partial";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(9);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parsePartialDefinition($silence);
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
  private function parseDictionary($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "dictionary", $this->currPos, 10, false) === 0) {
      $r3 = "dictionary";
      $this->currPos += 10;
    } else {
      if (!$silence) {$this->fail(10);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseidentifier($silence);
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
      if (!$silence) {$this->fail(5);}
      $r6 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseDictionaryMembers($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r8 = "}";
    } else {
      if (!$silence) {$this->fail(6);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r9 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r9 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9];
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
      if (!$silence) {$this->fail(12);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseidentifier($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r5 = "{";
    } else {
      if (!$silence) {$this->fail(5);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseEnumValueList($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r7 = "}";
    } else {
      if (!$silence) {$this->fail(6);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r8 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8];
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
      if (!$silence) {$this->fail(13);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseType($silence);
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
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r6 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r6 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseImplementsStatement($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseidentifier($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "implements", $this->currPos, 10, false) === 0) {
      $r4 = "implements";
      $this->currPos += 10;
    } else {
      if (!$silence) {$this->fail(14);}
      $r4 = self::$FAILED;
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
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r6 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r6 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6];
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
      if (!$silence) {$this->fail(3);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseExtendedAttributeInner($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r5 = ")";
    } else {
      if (!$silence) {$this->fail(4);}
      $r5 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseExtendedAttributeInner($silence);
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
    // start seq_2
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r7 = "[";
    } else {
      if (!$silence) {$this->fail(1);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r8 = $this->parseExtendedAttributeInner($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    if (($this->input[$this->currPos] ?? null) === "]") {
      $this->currPos++;
      $r9 = "]";
    } else {
      if (!$silence) {$this->fail(2);}
      $r9 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r10 = $this->parseExtendedAttributeInner($silence);
    if ($r10===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r7,$r8,$r9,$r10];
    seq_2:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_3
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r11 = "{";
    } else {
      if (!$silence) {$this->fail(5);}
      $r11 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r12 = $this->parseExtendedAttributeInner($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r13 = "}";
    } else {
      if (!$silence) {$this->fail(6);}
      $r13 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r14 = $this->parseExtendedAttributeInner($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r1 = [$r11,$r12,$r13,$r14];
    seq_3:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_4
    $p2 = $this->currPos;
    $r15 = $this->parseOtherOrComma($silence);
    if ($r15===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r16 = $this->parseExtendedAttributeInner($silence);
    if ($r16===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r1 = [$r15,$r16];
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
    $r1 = $this->parseinteger($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parsefloat($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseidentifier($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parsestring($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseotherchar($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    if (($this->input[$this->currPos] ?? null) === "-") {
      $this->currPos++;
      $r1 = "-";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(15);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "-Infinity", $this->currPos, 9, false) === 0) {
      $r1 = "-Infinity";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(16);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ".") {
      $this->currPos++;
      $r1 = ".";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(17);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "...", $this->currPos, 3, false) === 0) {
      $r1 = "...";
      $this->currPos += 3;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(18);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ":") {
      $this->currPos++;
      $r1 = ":";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(19);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r1 = ";";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(11);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r1 = "<";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(20);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "=") {
      $this->currPos++;
      $r1 = "=";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(21);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r1 = ">";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(22);}
      $r1 = self::$FAILED;
    }
    if (($this->input[$this->currPos] ?? null) === "?") {
      $this->currPos++;
      $r1 = "?";
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(23);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ByteString", $this->currPos, 10, false) === 0) {
      $r1 = "ByteString";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(24);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "DOMString", $this->currPos, 9, false) === 0) {
      $r1 = "DOMString";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(25);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Infinity", $this->currPos, 8, false) === 0) {
      $r1 = "Infinity";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(26);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "NaN", $this->currPos, 3, false) === 0) {
      $r1 = "NaN";
      $this->currPos += 3;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(27);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "USVString", $this->currPos, 9, false) === 0) {
      $r1 = "USVString";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(28);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "any", $this->currPos, 3, false) === 0) {
      $r1 = "any";
      $this->currPos += 3;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(29);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "boolean", $this->currPos, 7, false) === 0) {
      $r1 = "boolean";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(30);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "byte", $this->currPos, 4, false) === 0) {
      $r1 = "byte";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(31);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "double", $this->currPos, 6, false) === 0) {
      $r1 = "double";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(32);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "false", $this->currPos, 5, false) === 0) {
      $r1 = "false";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(33);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "float", $this->currPos, 5, false) === 0) {
      $r1 = "float";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(34);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "long", $this->currPos, 4, false) === 0) {
      $r1 = "long";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(35);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "null", $this->currPos, 4, false) === 0) {
      $r1 = "null";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(36);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "object", $this->currPos, 6, false) === 0) {
      $r1 = "object";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(37);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "octet", $this->currPos, 5, false) === 0) {
      $r1 = "octet";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(38);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "or", $this->currPos, 2, false) === 0) {
      $r1 = "or";
      $this->currPos += 2;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(39);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "optional", $this->currPos, 8, false) === 0) {
      $r1 = "optional";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(40);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "sequence", $this->currPos, 8, false) === 0) {
      $r1 = "sequence";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(41);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "short", $this->currPos, 5, false) === 0) {
      $r1 = "short";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(42);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "true", $this->currPos, 4, false) === 0) {
      $r1 = "true";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(43);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "unsigned", $this->currPos, 8, false) === 0) {
      $r1 = "unsigned";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(44);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "void", $this->currPos, 4, false) === 0) {
      $r1 = "void";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(45);}
      $r1 = self::$FAILED;
    }
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
    $r1 = $this->parseInterface($silence);
    choice_1:
    return $r1;
  }
  private function parseInterface($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "interface", $this->currPos, 9, false) === 0) {
      $r3 = "interface";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(46);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseidentifier($silence);
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
      if (!$silence) {$this->fail(5);}
      $r6 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseInterfaceMembers($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r8 = "}";
    } else {
      if (!$silence) {$this->fail(6);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r9 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r9 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parsePartialDefinition($silence) {
    // start choice_1
    $r1 = $this->parsePartialInterface($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parsePartialDictionary($silence);
    choice_1:
    return $r1;
  }
  private function parseidentifier($silence) {
    $p2 = $this->currPos;
    $p4 = $this->currPos;
    // start seq_1
    $p5 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "_") {
      $this->currPos++;
      $r6 = "_";
    } else {
      if (!$silence) {$this->fail(47);}
      $r6 = self::$FAILED;
      $r6 = null;
    }
    $r7 = $this->input[$this->currPos] ?? '';
    if (preg_match("/^[A-Za-z]/", $r7)) {
      $this->currPos++;
    } else {
      $r7 = self::$FAILED;
      if (!$silence) {$this->fail(48);}
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
        if (!$silence) {$this->fail(49);}
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
      $r1 = $this->a0($r3);
    }
    return $r1;
  }
  private function parseInheritance($silence) {
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ":") {
      $this->currPos++;
      $r3 = ":";
    } else {
      if (!$silence) {$this->fail(19);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseidentifier($silence);
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
  private function parseDictionaryMembers($silence) {
    $r1 = [];
    for (;;) {
      // start seq_1
      $p3 = $this->currPos;
      $r4 = $this->parseExtendedAttributeList($silence);
      if ($r4===self::$FAILED) {
        $r2 = self::$FAILED;
        goto seq_1;
      }
      $r5 = $this->parseDictionaryMember($silence);
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
  private function parseEnumValueList($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parsestring($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseEnumValueListComma($silence);
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
  private function parseOtherOrComma($silence) {
    // start choice_1
    $r1 = $this->parseOther($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r1 = ",";
    } else {
      if (!$silence) {$this->fail(7);}
      $r1 = self::$FAILED;
    }
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
      $r1 = $this->a1($r4, $r5);
    }
    // free $p3
    return $r1;
  }
  private function parsefloat($silence) {
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
        if (!$silence) {$this->fail(50);}
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
      if (!$silence) {$this->fail(17);}
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
        if (!$silence) {$this->fail(50);}
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
        if (!$silence) {$this->fail(50);}
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
      if (!$silence) {$this->fail(17);}
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
        if (!$silence) {$this->fail(50);}
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
      if (!$silence) {$this->fail(51);}
      $r15 = self::$FAILED;
      goto seq_5;
    }
    $r17 = $this->input[$this->currPos] ?? '';
    if ($r17 === "+" || $r17 === "-") {
      $this->currPos++;
    } else {
      $r17 = self::$FAILED;
      if (!$silence) {$this->fail(52);}
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
        if (!$silence) {$this->fail(50);}
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
        if (!$silence) {$this->fail(50);}
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
      if (!$silence) {$this->fail(51);}
      $this->currPos = $p8;
      $r7 = self::$FAILED;
      goto seq_6;
    }
    $r21 = $this->input[$this->currPos] ?? '';
    if ($r21 === "+" || $r21 === "-") {
      $this->currPos++;
    } else {
      $r21 = self::$FAILED;
      if (!$silence) {$this->fail(52);}
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
        if (!$silence) {$this->fail(50);}
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
      $r1 = $this->a2($r3);
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
      if (!$silence) {$this->fail(53);}
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
        if (!$silence) {$this->fail(54);}
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
      if (!$silence) {$this->fail(53);}
      $r7 = self::$FAILED;
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
  private function parseotherchar($silence) {
    $r1 = self::charAt($this->input, $this->currPos);
    if (preg_match("/^[^\\x09\\x0a\\x0d 0-9A-Za-z]/", $r1)) {
      $this->currPos += strlen($r1);
    } else {
      $r1 = self::$FAILED;
      if (!$silence) {$this->fail(55);}
    }
    return $r1;
  }
  private function parseArgumentNameKeyword($silence) {
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "attribute", $this->currPos, 9, false) === 0) {
      $r1 = "attribute";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(56);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "callback", $this->currPos, 8, false) === 0) {
      $r1 = "callback";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(8);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "const", $this->currPos, 5, false) === 0) {
      $r1 = "const";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(57);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "deleter", $this->currPos, 7, false) === 0) {
      $r1 = "deleter";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(58);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "dictionary", $this->currPos, 10, false) === 0) {
      $r1 = "dictionary";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(10);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "enum", $this->currPos, 4, false) === 0) {
      $r1 = "enum";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(12);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "getter", $this->currPos, 6, false) === 0) {
      $r1 = "getter";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(59);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "implements", $this->currPos, 10, false) === 0) {
      $r1 = "implements";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(14);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "inherit", $this->currPos, 7, false) === 0) {
      $r1 = "inherit";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(60);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "interface", $this->currPos, 9, false) === 0) {
      $r1 = "interface";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(46);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "iterable", $this->currPos, 8, false) === 0) {
      $r1 = "iterable";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(61);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "legacycaller", $this->currPos, 12, false) === 0) {
      $r1 = "legacycaller";
      $this->currPos += 12;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(62);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "partial", $this->currPos, 7, false) === 0) {
      $r1 = "partial";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(9);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "required", $this->currPos, 8, false) === 0) {
      $r1 = "required";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(63);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "serializer", $this->currPos, 10, false) === 0) {
      $r1 = "serializer";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(64);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "setter", $this->currPos, 6, false) === 0) {
      $r1 = "setter";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(65);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "static", $this->currPos, 6, false) === 0) {
      $r1 = "static";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(66);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "stringifier", $this->currPos, 11, false) === 0) {
      $r1 = "stringifier";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(67);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "typedef", $this->currPos, 7, false) === 0) {
      $r1 = "typedef";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(13);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "unrestricted", $this->currPos, 12, false) === 0) {
      $r1 = "unrestricted";
      $this->currPos += 12;
    } else {
      if (!$silence) {$this->fail(68);}
      $r1 = self::$FAILED;
    }
    choice_1:
    return $r1;
  }
  private function parseBufferRelatedType($silence) {
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ArrayBuffer", $this->currPos, 11, false) === 0) {
      $r1 = "ArrayBuffer";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(69);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "DataView", $this->currPos, 8, false) === 0) {
      $r1 = "DataView";
      $this->currPos += 8;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(70);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int8Array", $this->currPos, 9, false) === 0) {
      $r1 = "Int8Array";
      $this->currPos += 9;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(71);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int16Array", $this->currPos, 10, false) === 0) {
      $r1 = "Int16Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(72);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Int32Array", $this->currPos, 10, false) === 0) {
      $r1 = "Int32Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(73);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint8Array", $this->currPos, 10, false) === 0) {
      $r1 = "Uint8Array";
      $this->currPos += 10;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(74);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint16Array", $this->currPos, 11, false) === 0) {
      $r1 = "Uint16Array";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(75);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint32Array", $this->currPos, 11, false) === 0) {
      $r1 = "Uint32Array";
      $this->currPos += 11;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(76);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Uint8ClampedArray", $this->currPos, 17, false) === 0) {
      $r1 = "Uint8ClampedArray";
      $this->currPos += 17;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(77);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Float32Array", $this->currPos, 12, false) === 0) {
      $r1 = "Float32Array";
      $this->currPos += 12;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(78);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Float64Array", $this->currPos, 12, false) === 0) {
      $r1 = "Float64Array";
      $this->currPos += 12;
    } else {
      if (!$silence) {$this->fail(79);}
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
    if (($this->input[$this->currPos] ?? null) === "=") {
      $this->currPos++;
      $r4 = "=";
    } else {
      if (!$silence) {$this->fail(21);}
      $r4 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseReturnType($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "(") {
      $this->currPos++;
      $r6 = "(";
    } else {
      if (!$silence) {$this->fail(3);}
      $r6 = self::$FAILED;
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
      if (!$silence) {$this->fail(4);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r9 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r9 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8,$r9];
    seq_1:
    // free $r2,$p1
    return $r2;
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
  private function parsePartialInterface($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "interface", $this->currPos, 9, false) === 0) {
      $r3 = "interface";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(46);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseidentifier($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r5 = "{";
    } else {
      if (!$silence) {$this->fail(5);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseInterfaceMembers($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r7 = "}";
    } else {
      if (!$silence) {$this->fail(6);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r8 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parsePartialDictionary($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "dictionary", $this->currPos, 10, false) === 0) {
      $r3 = "dictionary";
      $this->currPos += 10;
    } else {
      if (!$silence) {$this->fail(10);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseidentifier($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r5 = "{";
    } else {
      if (!$silence) {$this->fail(5);}
      $r5 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseDictionaryMembers($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r7 = "}";
    } else {
      if (!$silence) {$this->fail(6);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r8 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseDictionaryMember($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseRequired($silence);
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
    $r5 = $this->parseidentifier($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseDefault($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r7 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7];
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
      if (!$silence) {$this->fail(7);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseEnumValueListString($silence);
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
  private function parseSingleType($silence) {
    // start choice_1
    $r1 = $this->parseNonAnyType($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "any", $this->currPos, 3, false) === 0) {
      $r1 = "any";
      $this->currPos += 3;
    } else {
      if (!$silence) {$this->fail(29);}
      $r1 = self::$FAILED;
    }
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
      if (!$silence) {$this->fail(3);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseUnionMemberType($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "or", $this->currPos, 2, false) === 0) {
      $r5 = "or";
      $this->currPos += 2;
    } else {
      if (!$silence) {$this->fail(39);}
      $r5 = self::$FAILED;
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
    $r7 = $this->parseUnionMemberTypes($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r8 = ")";
    } else {
      if (!$silence) {$this->fail(4);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseNull($silence) {
    if (($this->input[$this->currPos] ?? null) === "?") {
      $this->currPos++;
      $r1 = "?";
    } else {
      if (!$silence) {$this->fail(23);}
      $r1 = self::$FAILED;
      $r1 = null;
    }
    return $r1;
  }
  private function parseopt_minus($silence) {
    // start choice_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "-") {
      $this->currPos++;
      $r1 = "-";
      $this->savedPos = $p2;
      $r1 = $this->a3();
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(15);}
      $r1 = self::$FAILED;
    }
    $p3 = $this->currPos;
    $r1 = '';
    if ($r1!==self::$FAILED) {
      $this->savedPos = $p3;
      $r1 = $this->a4();
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
      if (!$silence) {$this->fail(80);}
      $r3 = self::$FAILED;
      goto seq_1;
    }
    for (;;) {
      $r8 = $this->input[$this->currPos] ?? '';
      if (preg_match("/^[0-9]/", $r8)) {
        $this->currPos++;
      } else {
        $r8 = self::$FAILED;
        if (!$silence) {$this->fail(50);}
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
      $r1 = $this->a5($r3);
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
      if (!$silence) {$this->fail(81);}
      $r4 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "0X", $this->currPos, 2, false) === 0) {
      $r4 = "0X";
      $this->currPos += 2;
    } else {
      if (!$silence) {$this->fail(82);}
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
        if (!$silence) {$this->fail(83);}
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
      $r1 = $this->a6($r5);
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
      if (!$silence) {$this->fail(84);}
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
        if (!$silence) {$this->fail(85);}
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
      $r1 = $this->a7($r3);
    }
    return $r1;
  }
  private function parseReturnType($silence) {
    // start choice_1
    $r1 = $this->parseType($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "void", $this->currPos, 4, false) === 0) {
      $r1 = "void";
      $this->currPos += 4;
    } else {
      if (!$silence) {$this->fail(45);}
      $r1 = self::$FAILED;
    }
    choice_1:
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
  private function parseInterfaceMember($silence) {
    // start choice_1
    $r1 = $this->parseConst($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseOperation($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseSerializer($silence);
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
    $r1 = $this->parseReadOnlyMember($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseReadWriteAttribute($silence);
    choice_1:
    return $r1;
  }
  private function parseRequired($silence) {
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "required", $this->currPos, 8, false) === 0) {
      $r1 = "required";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(63);}
      $r1 = self::$FAILED;
      $r1 = null;
    }
    return $r1;
  }
  private function parseDefault($silence) {
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "=") {
      $this->currPos++;
      $r3 = "=";
    } else {
      if (!$silence) {$this->fail(21);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseDefaultValue($silence);
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
  private function parseEnumValueListString($silence) {
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parsestring($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseEnumValueListComma($silence);
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
  private function parseNonAnyType($silence) {
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
    $r5 = $this->parsePromiseType($silence);
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
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "ByteString", $this->currPos, 10, false) === 0) {
      $r7 = "ByteString";
      $this->currPos += 10;
    } else {
      if (!$silence) {$this->fail(24);}
      $r7 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_3;
    }
    $r8 = $this->parseNull($silence);
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
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "DOMString", $this->currPos, 9, false) === 0) {
      $r9 = "DOMString";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(25);}
      $r9 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_4;
    }
    $r10 = $this->parseNull($silence);
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
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "USVString", $this->currPos, 9, false) === 0) {
      $r11 = "USVString";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(28);}
      $r11 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_5;
    }
    $r12 = $this->parseNull($silence);
    if ($r12===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_5;
    }
    $r1 = [$r11,$r12];
    seq_5:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_6
    $p2 = $this->currPos;
    $r13 = $this->parseidentifier($silence);
    if ($r13===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_6;
    }
    $r14 = $this->parseNull($silence);
    if ($r14===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_6;
    }
    $r1 = [$r13,$r14];
    seq_6:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_7
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "sequence", $this->currPos, 8, false) === 0) {
      $r15 = "sequence";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(41);}
      $r15 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r16 = "<";
    } else {
      if (!$silence) {$this->fail(20);}
      $r16 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r17 = $this->parseType($silence);
    if ($r17===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r18 = ">";
    } else {
      if (!$silence) {$this->fail(22);}
      $r18 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r19 = $this->parseNull($silence);
    if ($r19===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_7;
    }
    $r1 = [$r15,$r16,$r17,$r18,$r19];
    seq_7:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_8
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "object", $this->currPos, 6, false) === 0) {
      $r20 = "object";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(37);}
      $r20 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r21 = $this->parseNull($silence);
    if ($r21===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_8;
    }
    $r1 = [$r20,$r21];
    seq_8:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_9
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Error", $this->currPos, 5, false) === 0) {
      $r22 = "Error";
      $this->currPos += 5;
    } else {
      if (!$silence) {$this->fail(86);}
      $r22 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    $r23 = $this->parseNull($silence);
    if ($r23===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_9;
    }
    $r1 = [$r22,$r23];
    seq_9:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_10
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "DOMException", $this->currPos, 12, false) === 0) {
      $r24 = "DOMException";
      $this->currPos += 12;
    } else {
      if (!$silence) {$this->fail(87);}
      $r24 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_10;
    }
    $r25 = $this->parseNull($silence);
    if ($r25===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_10;
    }
    $r1 = [$r24,$r25];
    seq_10:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    // start seq_11
    $p2 = $this->currPos;
    $r26 = $this->parseBufferRelatedType($silence);
    if ($r26===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_11;
    }
    $r27 = $this->parseNull($silence);
    if ($r27===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_11;
    }
    $r1 = [$r26,$r27];
    seq_11:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseUnionMemberType($silence) {
    // start choice_1
    $r1 = $this->parseNonAnyType($silence);
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
  private function parseUnionMemberTypes($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "or", $this->currPos, 2, false) === 0) {
      $r3 = "or";
      $this->currPos += 2;
    } else {
      if (!$silence) {$this->fail(39);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseUnionMemberType($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseUnionMemberTypes($silence);
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
    $r1 = '';
    choice_1:
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
    $r4 = $this->parseOptionalOrRequiredArgument($silence);
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
      if (!$silence) {$this->fail(7);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseArgument($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseArguments($silence);
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
      if (!$silence) {$this->fail(57);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseConstType($silence);
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
    if (($this->input[$this->currPos] ?? null) === "=") {
      $this->currPos++;
      $r6 = "=";
    } else {
      if (!$silence) {$this->fail(21);}
      $r6 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r7 = $this->parseConstValue($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r8 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseOperation($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseReturnType($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseOperationRest($silence);
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
    $r1 = $this->parseSpecialOperation($silence);
    choice_1:
    return $r1;
  }
  private function parseSerializer($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "serializer", $this->currPos, 10, false) === 0) {
      $r3 = "serializer";
      $this->currPos += 10;
    } else {
      if (!$silence) {$this->fail(64);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseSerializerRest($silence);
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
  private function parseStringifier($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "stringifier", $this->currPos, 11, false) === 0) {
      $r3 = "stringifier";
      $this->currPos += 11;
    } else {
      if (!$silence) {$this->fail(67);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseStringifierRest($silence);
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
  private function parseStaticMember($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "static", $this->currPos, 6, false) === 0) {
      $r3 = "static";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(66);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseStaticMemberRest($silence);
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
  private function parseIterable($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "iterable", $this->currPos, 8, false) === 0) {
      $r3 = "iterable";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(61);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r4 = "<";
    } else {
      if (!$silence) {$this->fail(20);}
      $r4 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseType($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseOptionalType($silence);
    if ($r6===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r7 = ">";
    } else {
      if (!$silence) {$this->fail(22);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r8 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r8 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7,$r8];
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
      if (!$silence) {$this->fail(88);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseAttributeRest($silence);
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
  private function parseReadWriteAttribute($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "inherit", $this->currPos, 7, false) === 0) {
      $r3 = "inherit";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(60);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseReadOnly($silence);
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
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = $this->parseAttributeRest($silence);
    choice_1:
    return $r1;
  }
  private function parseDefaultValue($silence) {
    // start choice_1
    $r1 = $this->parseConstValue($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parsestring($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r3 = "[";
    } else {
      if (!$silence) {$this->fail(1);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "]") {
      $this->currPos++;
      $r4 = "]";
    } else {
      if (!$silence) {$this->fail(2);}
      $r4 = self::$FAILED;
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
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "boolean", $this->currPos, 7, false) === 0) {
      $r1 = "boolean";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(30);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "byte", $this->currPos, 4, false) === 0) {
      $r1 = "byte";
      $this->currPos += 4;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(31);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "octet", $this->currPos, 5, false) === 0) {
      $r1 = "octet";
      $this->currPos += 5;
    } else {
      if (!$silence) {$this->fail(38);}
      $r1 = self::$FAILED;
    }
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
      if (!$silence) {$this->fail(89);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "<") {
      $this->currPos++;
      $r4 = "<";
    } else {
      if (!$silence) {$this->fail(20);}
      $r4 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseReturnType($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ">") {
      $this->currPos++;
      $r6 = ">";
    } else {
      if (!$silence) {$this->fail(22);}
      $r6 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseOptionalOrRequiredArgument($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "optional", $this->currPos, 8, false) === 0) {
      $r3 = "optional";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(40);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseType($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseArgumentName($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r6 = $this->parseDefault($silence);
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
    // start seq_2
    $p2 = $this->currPos;
    $r7 = $this->parseType($silence);
    if ($r7===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r8 = $this->parseEllipsis($silence);
    if ($r8===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r9 = $this->parseArgumentName($silence);
    if ($r9===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r7,$r8,$r9];
    seq_2:
    // free $p2
    choice_1:
    return $r1;
  }
  private function parseConstType($silence) {
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
    $r5 = $this->parseidentifier($silence);
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
    $r1 = $this->parseinteger($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "null", $this->currPos, 4, false) === 0) {
      $r1 = "null";
      $this->currPos += 4;
      $this->savedPos = $p2;
      $r1 = $this->a8();
    } else {
      if (!$silence) {$this->fail(36);}
      $r1 = self::$FAILED;
    }
    choice_1:
    return $r1;
  }
  private function parseOperationRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = $this->parseOptionalIdentifier($silence);
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "(") {
      $this->currPos++;
      $r4 = "(";
    } else {
      if (!$silence) {$this->fail(3);}
      $r4 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseArgumentList($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ")") {
      $this->currPos++;
      $r6 = ")";
    } else {
      if (!$silence) {$this->fail(4);}
      $r6 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r7 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r7 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6,$r7];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseSpecialOperation($silence) {
    // start seq_1
    $p1 = $this->currPos;
    $r3 = [];
    for (;;) {
      $r4 = $this->parseSpecial($silence);
      if ($r4!==self::$FAILED) {
        $r3[] = $r4;
      } else {
        break;
      }
    }
    if (count($r3) === 0) {
      $r3 = self::$FAILED;
    }
    if ($r3===self::$FAILED) {
      $r2 = self::$FAILED;
      goto seq_1;
    }
    // free $r4
    $r4 = $this->parseReturnType($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseOperationRest($silence);
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
  private function parseSerializerRest($silence) {
    // start choice_1
    $r1 = $this->parseOperationRest($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "=") {
      $this->currPos++;
      $r3 = "=";
    } else {
      if (!$silence) {$this->fail(21);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseSerializationPattern($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r5 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r5 = self::$FAILED;
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
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r1 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r1 = self::$FAILED;
    }
    choice_1:
    return $r1;
  }
  private function parseStringifierRest($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseReadOnly($silence);
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
    // start seq_2
    $p2 = $this->currPos;
    $r5 = $this->parseReturnType($silence);
    if ($r5===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parseOperationRest($silence);
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
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r1 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r1 = self::$FAILED;
    }
    choice_1:
    return $r1;
  }
  private function parseStaticMemberRest($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseReadOnly($silence);
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
    // start seq_2
    $p2 = $this->currPos;
    $r5 = $this->parseReturnType($silence);
    if ($r5===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parseOperationRest($silence);
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
  private function parseOptionalType($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r3 = ",";
    } else {
      if (!$silence) {$this->fail(7);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseType($silence);
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
  private function parseAttributeRest($silence) {
    // start seq_1
    $p1 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "attribute", $this->currPos, 9, false) === 0) {
      $r3 = "attribute";
      $this->currPos += 9;
    } else {
      if (!$silence) {$this->fail(56);}
      $r3 = self::$FAILED;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseType($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseAttributeName($silence);
    if ($r5===self::$FAILED) {
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === ";") {
      $this->currPos++;
      $r6 = ";";
    } else {
      if (!$silence) {$this->fail(11);}
      $r6 = self::$FAILED;
      $this->currPos = $p1;
      $r2 = self::$FAILED;
      goto seq_1;
    }
    $r2 = [$r3,$r4,$r5,$r6];
    seq_1:
    // free $r2,$p1
    return $r2;
  }
  private function parseReadOnly($silence) {
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "readonly", $this->currPos, 8, false) === 0) {
      $r1 = "readonly";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(88);}
      $r1 = self::$FAILED;
      $r1 = null;
    }
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
      if (!$silence) {$this->fail(44);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseIntegerType($silence);
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
      if (!$silence) {$this->fail(68);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseFloatType($silence);
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
    $r1 = $this->parseFloatType($silence);
    choice_1:
    return $r1;
  }
  private function parseArgumentName($silence) {
    // start choice_1
    $r1 = $this->parseArgumentNameKeyword($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseidentifier($silence);
    choice_1:
    return $r1;
  }
  private function parseEllipsis($silence) {
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "...", $this->currPos, 3, false) === 0) {
      $r1 = "...";
      $this->currPos += 3;
    } else {
      if (!$silence) {$this->fail(18);}
      $r1 = self::$FAILED;
      $r1 = null;
    }
    return $r1;
  }
  private function parseBooleanLiteral($silence) {
    // start choice_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "true", $this->currPos, 4, false) === 0) {
      $r1 = "true";
      $this->currPos += 4;
      $this->savedPos = $p2;
      $r1 = $this->a9();
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(43);}
      $r1 = self::$FAILED;
    }
    $p3 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "false", $this->currPos, 5, false) === 0) {
      $r1 = "false";
      $this->currPos += 5;
      $this->savedPos = $p3;
      $r1 = $this->a10();
    } else {
      if (!$silence) {$this->fail(33);}
      $r1 = self::$FAILED;
    }
    choice_1:
    return $r1;
  }
  private function parseFloatLiteral($silence) {
    // start choice_1
    $r1 = $this->parsefloat($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "-Infinity", $this->currPos, 9, false) === 0) {
      $r1 = "-Infinity";
      $this->currPos += 9;
      $this->savedPos = $p2;
      $r1 = $this->a11();
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(16);}
      $r1 = self::$FAILED;
    }
    $p3 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "Infinity", $this->currPos, 8, false) === 0) {
      $r1 = "Infinity";
      $this->currPos += 8;
      $this->savedPos = $p3;
      $r1 = $this->a12();
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(26);}
      $r1 = self::$FAILED;
    }
    $p4 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "NaN", $this->currPos, 3, false) === 0) {
      $r1 = "NaN";
      $this->currPos += 3;
      $this->savedPos = $p4;
      $r1 = $this->a13();
    } else {
      if (!$silence) {$this->fail(27);}
      $r1 = self::$FAILED;
    }
    choice_1:
    return $r1;
  }
  private function parseOptionalIdentifier($silence) {
    $r1 = $this->parseidentifier($silence);
    if ($r1===self::$FAILED) {
      $r1 = null;
    }
    return $r1;
  }
  private function parseSpecial($silence) {
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "getter", $this->currPos, 6, false) === 0) {
      $r1 = "getter";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(59);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "setter", $this->currPos, 6, false) === 0) {
      $r1 = "setter";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(65);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "deleter", $this->currPos, 7, false) === 0) {
      $r1 = "deleter";
      $this->currPos += 7;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(58);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "legacycaller", $this->currPos, 12, false) === 0) {
      $r1 = "legacycaller";
      $this->currPos += 12;
    } else {
      if (!$silence) {$this->fail(62);}
      $r1 = self::$FAILED;
    }
    choice_1:
    return $r1;
  }
  private function parseSerializationPattern($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === "{") {
      $this->currPos++;
      $r3 = "{";
    } else {
      if (!$silence) {$this->fail(5);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseSerializationPatternMap($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    if (($this->input[$this->currPos] ?? null) === "}") {
      $this->currPos++;
      $r5 = "}";
    } else {
      if (!$silence) {$this->fail(6);}
      $r5 = self::$FAILED;
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
    if (($this->input[$this->currPos] ?? null) === "[") {
      $this->currPos++;
      $r6 = "[";
    } else {
      if (!$silence) {$this->fail(1);}
      $r6 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r7 = $this->parseSerializationPatternList($silence);
    if ($r7===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    if (($this->input[$this->currPos] ?? null) === "]") {
      $this->currPos++;
      $r8 = "]";
    } else {
      if (!$silence) {$this->fail(2);}
      $r8 = self::$FAILED;
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r1 = [$r6,$r7,$r8];
    seq_2:
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    // free $p2
    $r1 = $this->parseidentifier($silence);
    choice_1:
    return $r1;
  }
  private function parseAttributeName($silence) {
    // start choice_1
    $r1 = $this->parseAttributeNameKeyword($silence);
    if ($r1!==self::$FAILED) {
      goto choice_1;
    }
    $r1 = $this->parseidentifier($silence);
    choice_1:
    return $r1;
  }
  private function parseIntegerType($silence) {
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "short", $this->currPos, 5, false) === 0) {
      $r1 = "short";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(42);}
      $r1 = self::$FAILED;
    }
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "long", $this->currPos, 4, false) === 0) {
      $r3 = "long";
      $this->currPos += 4;
    } else {
      if (!$silence) {$this->fail(35);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseOptionalLong($silence);
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
  private function parseFloatType($silence) {
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "float", $this->currPos, 5, false) === 0) {
      $r1 = "float";
      $this->currPos += 5;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(34);}
      $r1 = self::$FAILED;
    }
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "double", $this->currPos, 6, false) === 0) {
      $r1 = "double";
      $this->currPos += 6;
    } else {
      if (!$silence) {$this->fail(32);}
      $r1 = self::$FAILED;
    }
    choice_1:
    return $r1;
  }
  private function parseSerializationPatternMap($silence) {
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "getter", $this->currPos, 6, false) === 0) {
      $r1 = "getter";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(59);}
      $r1 = self::$FAILED;
    }
    // start seq_1
    $p2 = $this->currPos;
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "inherit", $this->currPos, 7, false) === 0) {
      $r3 = "inherit";
      $this->currPos += 7;
    } else {
      if (!$silence) {$this->fail(60);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseIdentifiers($silence);
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
    $r5 = $this->parseidentifier($silence);
    if ($r5===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_2;
    }
    $r6 = $this->parseIdentifiers($silence);
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
    $r1 = '';
    choice_1:
    return $r1;
  }
  private function parseSerializationPatternList($silence) {
    // start choice_1
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "getter", $this->currPos, 6, false) === 0) {
      $r1 = "getter";
      $this->currPos += 6;
      goto choice_1;
    } else {
      if (!$silence) {$this->fail(59);}
      $r1 = self::$FAILED;
    }
    // start seq_1
    $p2 = $this->currPos;
    $r3 = $this->parseidentifier($silence);
    if ($r3===self::$FAILED) {
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseIdentifiers($silence);
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
  private function parseAttributeNameKeyword($silence) {
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "required", $this->currPos, 8, false) === 0) {
      $r1 = "required";
      $this->currPos += 8;
    } else {
      if (!$silence) {$this->fail(63);}
      $r1 = self::$FAILED;
    }
    return $r1;
  }
  private function parseOptionalLong($silence) {
    if ($this->currPos >= $this->inputLength ? false : substr_compare($this->input, "long", $this->currPos, 4, false) === 0) {
      $r1 = "long";
      $this->currPos += 4;
    } else {
      if (!$silence) {$this->fail(35);}
      $r1 = self::$FAILED;
      $r1 = null;
    }
    return $r1;
  }
  private function parseIdentifiers($silence) {
    // start choice_1
    // start seq_1
    $p2 = $this->currPos;
    if (($this->input[$this->currPos] ?? null) === ",") {
      $this->currPos++;
      $r3 = ",";
    } else {
      if (!$silence) {$this->fail(7);}
      $r3 = self::$FAILED;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r4 = $this->parseidentifier($silence);
    if ($r4===self::$FAILED) {
      $this->currPos = $p2;
      $r1 = self::$FAILED;
      goto seq_1;
    }
    $r5 = $this->parseIdentifiers($silence);
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
    $r1 = '';
    choice_1:
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

