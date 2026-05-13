---
title: String functions
weight: 2
---

All string functions live in the `Spatie\Piper\Str` namespace. Import them individually or in groups.

```php
use function Spatie\Piper\Str\{prefix, suffix, upper};
```

Each function takes its subject as the first argument, so it slots naturally into a pipe. The reference below lists every available function in alphabetical order. Click a name to jump straight to its description.

<table style="font-size: 1.1em;">
<tbody>
<tr><td><a href="#content-after">after</a></td><td><a href="#content-ismatch">isMatch</a></td><td><a href="#content-remove">remove</a></td><td><a href="#content-substrreplace">substrReplace</a></td></tr>
<tr><td><a href="#content-afterlast">afterLast</a></td><td><a href="#content-isnotempty">isNotEmpty</a></td><td><a href="#content-repeat">repeat</a></td><td><a href="#content-swap">swap</a></td></tr>
<tr><td><a href="#content-append">append</a></td><td><a href="#content-isulid">isUlid</a></td><td><a href="#content-replace">replace</a></td><td><a href="#content-take">take</a></td></tr>
<tr><td><a href="#content-before">before</a></td><td><a href="#content-isuuid">isUuid</a></td><td><a href="#content-replacearray">replaceArray</a></td><td><a href="#content-test">test</a></td></tr>
<tr><td><a href="#content-beforelast">beforeLast</a></td><td><a href="#content-kebab">kebab</a></td><td><a href="#content-replaceend">replaceEnd</a></td><td><a href="#content-title">title</a></td></tr>
<tr><td><a href="#content-between">between</a></td><td><a href="#content-lcfirst">lcfirst</a></td><td><a href="#content-replacefirst">replaceFirst</a></td><td><a href="#content-tobase64">toBase64</a></td></tr>
<tr><td><a href="#content-betweenfirst">betweenFirst</a></td><td><a href="#content-length">length</a></td><td><a href="#content-replacelast">replaceLast</a></td><td><a href="#content-toboolean">toBoolean</a></td></tr>
<tr><td><a href="#content-camel">camel</a></td><td><a href="#content-limit">limit</a></td><td><a href="#content-replacematches">replaceMatches</a></td><td><a href="#content-tofloat">toFloat</a></td></tr>
<tr><td><a href="#content-charat">charAt</a></td><td><a href="#content-lower">lower</a></td><td><a href="#content-replacestart">replaceStart</a></td><td><a href="#content-tointeger">toInteger</a></td></tr>
<tr><td><a href="#content-contains">contains</a></td><td><a href="#content-ltrim">ltrim</a></td><td><a href="#content-reverse">reverse</a></td><td><a href="#content-tostring">toString</a></td></tr>
<tr><td><a href="#content-deduplicate">deduplicate</a></td><td><a href="#content-mask">mask</a></td><td><a href="#content-rtrim">rtrim</a></td><td><a href="#content-trim">trim</a></td></tr>
<tr><td><a href="#content-endswith">endsWith</a></td><td><a href="#content-matchall">matchAll</a></td><td><a href="#content-scan">scan</a></td><td><a href="#content-ucfirst">ucfirst</a></td></tr>
<tr><td><a href="#content-exactly">exactly</a></td><td><a href="#content-newline">newLine</a></td><td><a href="#content-snake">snake</a></td><td><a href="#content-unwrap">unwrap</a></td></tr>
<tr><td><a href="#content-explode">explode</a></td><td><a href="#content-numbers">numbers</a></td><td><a href="#content-split">split</a></td><td><a href="#content-upper">upper</a></td></tr>
<tr><td><a href="#content-finish">finish</a></td><td><a href="#content-padboth">padBoth</a></td><td><a href="#content-squish">squish</a></td><td><a href="#content-wordcount">wordCount</a></td></tr>
<tr><td><a href="#content-frombase64">fromBase64</a></td><td><a href="#content-padleft">padLeft</a></td><td><a href="#content-start">start</a></td><td><a href="#content-wordwrap">wordWrap</a></td></tr>
<tr><td><a href="#content-headline">headline</a></td><td><a href="#content-padright">padRight</a></td><td><a href="#content-startswith">startsWith</a></td><td><a href="#content-words">words</a></td></tr>
<tr><td><a href="#content-is">is</a></td><td><a href="#content-password">password</a></td><td><a href="#content-striptags">stripTags</a></td><td><a href="#content-wrap">wrap</a></td></tr>
<tr><td><a href="#content-isascii">isAscii</a></td><td><a href="#content-position">position</a></td><td><a href="#content-studly">studly</a></td><td></td></tr>
<tr><td><a href="#content-isempty">isEmpty</a></td><td><a href="#content-prepend">prepend</a></td><td><a href="#content-substr">substr</a></td><td></td></tr>
<tr><td><a href="#content-isjson">isJson</a></td><td><a href="#content-random">random</a></td><td><a href="#content-substrcount">substrCount</a></td><td></td></tr>
</tbody>
</table>

#### `after`

Returns everything after the given value.

```php
'This is my name' |> after('This is'); // ' my name'
```

#### `afterLast`

Returns everything after the last occurrence of the given value.

```php
'App\\Models\\User' |> afterLast('\\'); // 'User'
```

#### `append`

Appends the given values to the string.

```php
'Laravel' |> append(' Framework'); // 'Laravel Framework'
```

#### `before`

Returns everything before the given value.

```php
'This is my name' |> before('my name'); // 'This is '
```

#### `beforeLast`

Returns everything before the last occurrence of the given value.

```php
'App\\Models\\User' |> beforeLast('\\'); // 'App\\Models'
```

#### `between`

Returns the portion of the string between two values.

```php
'This is my name' |> between('This', 'name'); // ' is my '
```

#### `betweenFirst`

Returns the smallest possible portion of the string between two values.

```php
'[first] middle [second]' |> betweenFirst('[', ']'); // 'first'
```

#### `camel`

Converts the string to `camelCase`.

```php
'foo_bar' |> camel(); // 'fooBar'
```

#### `charAt`

Returns the character at the given index.

```php
'Laravel' |> charAt(1); // 'a'
```

#### `contains`

Determines whether the string contains the given value.

```php
'This is my name' |> contains('my'); // true
```

#### `deduplicate`

Replaces consecutive instances of a character with a single instance.

```php
'foo--bar---baz' |> deduplicate('-'); // 'foo-bar-baz'
```

#### `endsWith`

Determines whether the string ends with the given value.

```php
'Laravel' |> endsWith('vel'); // true
```

#### `exactly`

Determines whether the string exactly matches the given value.

```php
'Laravel' |> exactly('Laravel'); // true
```

#### `explode`

Splits the string by the given separator.

```php
'a,b,c' |> explode(','); // ['a', 'b', 'c']
```

#### `finish`

Adds a single instance of the given value to the end of the string.

```php
'this/string' |> finish('/'); // 'this/string/'
```

#### `fromBase64`

Decodes a Base64 encoded string.

```php
'TGFyYXZlbA==' |> fromBase64(); // 'Laravel'
```

#### `headline`

Converts the string to headline case.

```php
'email_notification_sent' |> headline(); // 'Email Notification Sent'
```

#### `is`

Determines whether the string matches a pattern.

```php
'foo/bar' |> is('foo/*'); // true
```

#### `isAscii`

Determines whether the string is 7 bit ASCII.

```php
'Laravel' |> isAscii(); // true
```

#### `isEmpty`

Determines whether the string is empty.

```php
'' |> isEmpty(); // true
```

#### `isJson`

Determines whether the string is valid JSON.

```php
'{"name":"Taylor"}' |> isJson(); // true
```

#### `isMatch`

Determines whether the string matches a regular expression.

```php
'Laravel' |> isMatch('/Lara/'); // true
```

#### `isNotEmpty`

Determines whether the string is not empty.

```php
'Laravel' |> isNotEmpty(); // true
```

#### `isUlid`

Determines whether the string is a valid ULID.

```php
'01ARZ3NDEKTSV4RRFFQ69G5FAV' |> isUlid(); // true
```

#### `isUuid`

Determines whether the string is a valid UUID.

```php
'550e8400-e29b-41d4-a716-446655440000' |> isUuid(); // true
```

#### `kebab`

Converts the string to `kebab-case`.

```php
'fooBar' |> kebab(); // 'foo-bar'
```

#### `lcfirst`

Makes the first character of the string lowercase.

```php
'Laravel' |> lcfirst(); // 'laravel'
```

#### `length`

Returns the length of the string.

```php
'Laravel' |> length(); // 7
```

#### `limit`

Truncates the string to the given length.

```php
'The Laravel framework' |> limit(11); // 'The Laravel...'
```

#### `lower`

Converts the string to lowercase.

```php
'LARAVEL' |> lower(); // 'laravel'
```

#### `ltrim`

Trims the left side of the string.

```php
'  Laravel' |> ltrim(); // 'Laravel'
```

#### `mask`

Masks a portion of the string with a repeated character.

```php
'taylor@example.com' |> mask('*', 3); // 'tay***************'
```

#### `matchAll`

Returns all regex matches for the string.

```php
'abc123def456' |> matchAll('/\d+/'); // ['123', '456']
```

#### `newLine`

Appends one or more new lines to the string.

```php
'Laravel' |> newLine(2); // "Laravel\n\n"
```

#### `numbers`

Removes all non-numeric characters from the string.

```php
'Phone: +1 (555) 123-4567' |> numbers(); // '15551234567'
```

#### `padBoth`

Pads both sides of the string to the given length.

```php
'Laravel' |> padBoth(11, '-'); // '--Laravel--'
```

#### `padLeft`

Pads the left side of the string to the given length.

```php
'Laravel' |> padLeft(10, '-'); // '---Laravel'
```

#### `padRight`

Pads the right side of the string to the given length.

```php
'Laravel' |> padRight(10, '-'); // 'Laravel---'
```

#### `password`

Generates a secure random password.

```php
password(12); // random 12-character password
```

#### `position`

Returns the position of the first occurrence of a substring.

```php
'Laravel' |> position('vel'); // 4
```

#### `prepend`

Prepends the given values to the string.

```php
'Framework' |> prepend('Laravel '); // 'Laravel Framework'
```

#### `random`

Generates a random string of the given length.

```php
random(16); // random 16-character string
```

#### `remove`

Removes the given value from the string.

```php
'Laravel Framework' |> remove(' Framework'); // 'Laravel'
```

#### `repeat`

Repeats the string the given number of times.

```php
'ab' |> repeat(3); // 'ababab'
```

#### `replace`

Replaces a given value in the string.

```php
'Laravel 13.x' |> replace('13.x', '14.x'); // 'Laravel 14.x'
```

#### `replaceArray`

Replaces a value in the string sequentially using an array.

```php
'The event is from ? to ?' |> replaceArray('?', ['8:30', '9:00']); // 'The event is from 8:30 to 9:00'
```

#### `replaceEnd`

Replaces the last occurrence of a value if it appears at the end of the string.

```php
'Hello World' |> replaceEnd('World', 'Laravel'); // 'Hello Laravel'
```

#### `replaceFirst`

Replaces the first occurrence of a value in the string.

```php
'the quick brown fox' |> replaceFirst('the', 'a'); // 'a quick brown fox'
```

#### `replaceLast`

Replaces the last occurrence of a value in the string.

```php
'the quick brown fox jumps over the lazy dog' |> replaceLast('the', 'a'); // 'the quick brown fox jumps over a lazy dog'
```

#### `replaceMatches`

Replaces substrings matching a regular expression.

```php
'(+1) 501-555-1000' |> replaceMatches('/[^A-Za-z0-9]++/', ''); // '15015551000'
```

#### `replaceStart`

Replaces the first occurrence of a value if it appears at the start of the string.

```php
'Hello World' |> replaceStart('Hello', 'Laravel'); // 'Laravel World'
```

#### `reverse`

Reverses the string.

```php
'Laravel' |> reverse(); // 'levaraL'
```

#### `rtrim`

Trims the right side of the string.

```php
'Laravel  ' |> rtrim(); // 'Laravel'
```

#### `scan`

Parses input from the string according to a format.

```php
'filename.jpg' |> scan('%[^.].%s'); // ['filename', 'jpg']
```

#### `snake`

Converts the string to `snake_case`.

```php
'fooBar' |> snake(); // 'foo_bar'
```

#### `split`

Splits the string using a regular expression.

```php
'a b  c' |> split('/\s+/'); // ['a', 'b', 'c']
```

#### `squish`

Removes extra whitespace from the string.

```php
"  laravel\tphp   framework  " |> squish(); // 'laravel php framework'
```

#### `start`

Adds a single instance of the given value to the start of the string.

```php
'this/string' |> start('/'); // '/this/string'
```

#### `startsWith`

Determines whether the string starts with the given value.

```php
'Laravel' |> startsWith('Lar'); // true
```

#### `stripTags`

Removes HTML and PHP tags from the string.

```php
'<p>Laravel</p>' |> stripTags(); // 'Laravel'
```

#### `studly`

Converts the string to `StudlyCase`.

```php
'foo bar' |> studly(); // 'FooBar'
```

#### `substr`

Returns the portion of the string specified by start and length.

```php
'Laravel' |> substr(1, 3); // 'ara'
```

#### `substrCount`

Returns the number of occurrences of a value in the string.

```php
'one two one' |> substrCount('one'); // 2
```

#### `substrReplace`

Replaces text within a portion of the string.

```php
'1300' |> substrReplace(':', 2, 0); // '13:00'
```

#### `swap`

Replaces multiple values in the string using a map.

```php
'framework' |> swap(['frame' => 'pipe', 'work' => 'line']); // 'pipeline'
```

#### `take`

Returns the first or last characters from the string.

```php
'Laravel' |> take(-3); // 'vel'
```

#### `test`

Determines whether the string matches a regular expression.

```php
'Laravel' |> test('/Lara/'); // true
```

#### `title`

Converts the string to title case.

```php
'laravel framework' |> title(); // 'Laravel Framework'
```

#### `toBase64`

Encodes the string as Base64.

```php
'Laravel' |> toBase64(); // 'TGFyYXZlbA=='
```

#### `toBoolean`

Casts the string to a boolean.

```php
'true' |> toBoolean(); // true
```

#### `toFloat`

Casts the string to a float.

```php
'12.5' |> toFloat(); // 12.5
```

#### `toInteger`

Casts the string to an integer.

```php
'42' |> toInteger(); // 42
```

#### `toString`

Returns the string value.

```php
'Laravel' |> toString(); // 'Laravel'
```

#### `trim`

Trims both sides of the string.

```php
'  Laravel  ' |> trim(); // 'Laravel'
```

#### `ucfirst`

Makes the first character of the string uppercase.

```php
'laravel' |> ucfirst(); // 'Laravel'
```

#### `unwrap`

Removes the given strings from the beginning and end of the string.

```php
'"Laravel"' |> unwrap('"'); // 'Laravel'
```

#### `upper`

Converts the string to uppercase.

```php
'laravel' |> upper(); // 'LARAVEL'
```

#### `wordCount`

Returns the number of words in the string.

```php
'hello world' |> wordCount(); // 2
```

#### `words`

Limits the number of words in the string.

```php
'The Laravel framework' |> words(2); // 'The Laravel...'
```

#### `wordWrap`

Wraps the string to the given number of characters.

```php
'The quick brown fox' |> wordWrap(10); // "The quick\nbrown fox"
```

#### `wrap`

Wraps the string with the given strings.

```php
'Laravel' |> wrap('"'); // '"Laravel"'
```
