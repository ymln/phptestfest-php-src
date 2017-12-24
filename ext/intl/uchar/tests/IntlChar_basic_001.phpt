--TEST--
IntlChar basic functionality
--SKIPIF--
<?php if (!extension_loaded('intl')) die("skip requires ext/intl") ?>
--FILE--
<?php

function unicode_info($cp) {
  $proplist = array(
    IntlChar::PROPERTY_ALPHABETIC,
  );
  $methodList = array(
    'isUAlphabetic',
    'isUUppercase', 'isupper',
    'isULowercase', 'islower',
    'isUWhiteSpace', 'isWhitespace',
    'istitle', 'isdigit', 'isalpha', 'isalnum',
    'isxdigit', 'ispunct', 'ispunct', 'isgraph',
    'isblank', 'isdefined', 'isspace', 'iscntrl',
    'isMirrored', 'isIDStart', 'isIDPart',
    'getBlockCode', 'charName', 'chr', 'digit',
    'getFC_NFKC_Closure', 'isJavaSpaceChar',
    'isISOControl', 'isprint', 'isbase',
    'isIDIgnorable', 'isJavaIDStart', 'isJavaIDPart',
    'charDirection', 'charType', 'getCombiningClass',
    'charDigitValue', 'charMirror', 'tolower',
    'toupper', 'totitle'
  );

  $ncp = IntlChar::ord($cp);
  printf("Codepoint U+%04x\n", $ncp);

  foreach($proplist as $prop) {
    printf("  hasBinaryProperty(%s): %s\n",
      IntlChar::getPropertyName($prop),
      IntlChar::hasBinaryProperty($cp, $prop) ? "true" : "false"
    );
  }
  foreach($methodList as $method) {
    echo "  $method(): ";
    var_dump(IntlChar::$method($cp));
  }
  echo "  charAge(): ", implode('.', IntlChar::charAge($cp)), "\n";
  echo "\n";
}

printf("Codepoint range: %04x-%04x\n", IntlChar::CODEPOINT_MIN, IntlChar::CODEPOINT_MAX);
$codepoints = array('P', 0xDF, 0x2603);
foreach($codepoints as $cp) {
  unicode_info($cp);
}
--EXPECT--
Codepoint range: 0000-10ffff
Codepoint U+0050
  hasBinaryProperty(Alphabetic): true
  isUAlphabetic(): bool(true)
  isUUppercase(): bool(true)
  isupper(): bool(true)
  isULowercase(): bool(false)
  islower(): bool(false)
  isUWhiteSpace(): bool(false)
  isWhitespace(): bool(false)
  istitle(): bool(false)
  isdigit(): bool(false)
  isalpha(): bool(true)
  isalnum(): bool(true)
  isxdigit(): bool(false)
  ispunct(): bool(false)
  ispunct(): bool(false)
  isgraph(): bool(true)
  isblank(): bool(false)
  isdefined(): bool(true)
  isspace(): bool(false)
  iscntrl(): bool(false)
  isMirrored(): bool(false)
  isIDStart(): bool(true)
  isIDPart(): bool(true)
  getBlockCode(): int(1)
  charName(): string(22) "LATIN CAPITAL LETTER P"
  chr(): string(1) "P"
  digit(): bool(false)
  getFC_NFKC_Closure(): string(0) ""
  isJavaSpaceChar(): bool(false)
  isISOControl(): bool(false)
  isprint(): bool(true)
  isbase(): bool(true)
  isIDIgnorable(): bool(false)
  isJavaIDStart(): bool(true)
  isJavaIDPart(): bool(true)
  charDirection(): int(0)
  charType(): int(1)
  getCombiningClass(): int(0)
  charDigitValue(): int(-1)
  charMirror(): string(1) "P"
  tolower(): string(1) "p"
  toupper(): string(1) "P"
  totitle(): string(1) "P"
  charAge(): 1.1.0.0

Codepoint U+00df
  hasBinaryProperty(Alphabetic): true
  isUAlphabetic(): bool(true)
  isUUppercase(): bool(false)
  isupper(): bool(false)
  isULowercase(): bool(true)
  islower(): bool(true)
  isUWhiteSpace(): bool(false)
  isWhitespace(): bool(false)
  istitle(): bool(false)
  isdigit(): bool(false)
  isalpha(): bool(true)
  isalnum(): bool(true)
  isxdigit(): bool(false)
  ispunct(): bool(false)
  ispunct(): bool(false)
  isgraph(): bool(true)
  isblank(): bool(false)
  isdefined(): bool(true)
  isspace(): bool(false)
  iscntrl(): bool(false)
  isMirrored(): bool(false)
  isIDStart(): bool(true)
  isIDPart(): bool(true)
  getBlockCode(): int(2)
  charName(): string(26) "LATIN SMALL LETTER SHARP S"
  chr(): string(2) "ß"
  digit(): bool(false)
  getFC_NFKC_Closure(): string(0) ""
  isJavaSpaceChar(): bool(false)
  isISOControl(): bool(false)
  isprint(): bool(true)
  isbase(): bool(true)
  isIDIgnorable(): bool(false)
  isJavaIDStart(): bool(true)
  isJavaIDPart(): bool(true)
  charDirection(): int(0)
  charType(): int(2)
  getCombiningClass(): int(0)
  charDigitValue(): int(-1)
  charMirror(): int(223)
  tolower(): int(223)
  toupper(): int(223)
  totitle(): int(223)
  charAge(): 1.1.0.0

Codepoint U+2603
  hasBinaryProperty(Alphabetic): false
  isUAlphabetic(): bool(false)
  isUUppercase(): bool(false)
  isupper(): bool(false)
  isULowercase(): bool(false)
  islower(): bool(false)
  isUWhiteSpace(): bool(false)
  isWhitespace(): bool(false)
  istitle(): bool(false)
  isdigit(): bool(false)
  isalpha(): bool(false)
  isalnum(): bool(false)
  isxdigit(): bool(false)
  ispunct(): bool(false)
  ispunct(): bool(false)
  isgraph(): bool(true)
  isblank(): bool(false)
  isdefined(): bool(true)
  isspace(): bool(false)
  iscntrl(): bool(false)
  isMirrored(): bool(false)
  isIDStart(): bool(false)
  isIDPart(): bool(false)
  getBlockCode(): int(55)
  charName(): string(7) "SNOWMAN"
  chr(): string(3) "☃"
  digit(): bool(false)
  getFC_NFKC_Closure(): string(0) ""
  isJavaSpaceChar(): bool(false)
  isISOControl(): bool(false)
  isprint(): bool(true)
  isbase(): bool(false)
  isIDIgnorable(): bool(false)
  isJavaIDStart(): bool(false)
  isJavaIDPart(): bool(false)
  charDirection(): int(10)
  charType(): int(27)
  getCombiningClass(): int(0)
  charDigitValue(): int(-1)
  charMirror(): int(9731)
  tolower(): int(9731)
  toupper(): int(9731)
  totitle(): int(9731)
  charAge(): 1.1.0.0
