# Piper

Piper is a pipe-native alternative to Laravel's collection API for plain PHP
arrays.

Instead of wrapping values in a `Collection` object, Piper exposes namespaced
functions that return one-argument callables for PHP 8.5's native pipe operator:

```php
use function Spatie\Piper\Arr\filter;
use function Spatie\Piper\Arr\map;
use function Spatie\Piper\Arr\values;

$result = [1, 2, 3, 4]
    |> map(fn (int $value): int => $value * 2)
    |> filter(fn (int $value): bool => $value > 4)
    |> values();

// [6, 8]
```

Piper is inspired by Laravel's MIT licensed collection documentation and source,
but it returns plain arrays and values instead of collection instances. Public
function files contain the pipe-facing API and implementation directly; shared
primitives live as namespaced support functions in `src/Support`.

Piper also includes a pipe-native subset of Laravel's fluent string API under
the `Spatie\Piper\Str` namespace.

## Installation

```bash
composer require spatie/piper
```

Piper requires PHP 8.5 or newer.

## Usage

Import the functions you need:

```php
use function Spatie\Piper\Arr\groupBy;
use function Spatie\Piper\Arr\map;
use function Spatie\Piper\Arr\pluck;
use function Spatie\Piper\Arr\sortBy;
use function Spatie\Piper\Arr\values;
```

Then pipe arrays through them:

```php
$users = [
    ['name' => 'Taylor', 'team' => 'core', 'score' => 98],
    ['name' => 'Jess', 'team' => 'docs', 'score' => 91],
    ['name' => 'Abigail', 'team' => 'core', 'score' => 95],
];

$names = $users
    |> sortBy('score')
    |> pluck('name');

// ['Jess', 'Abigail', 'Taylor']
```

Strings work the same way:

```php
use function Spatie\Piper\Str\after;
use function Spatie\Piper\Str\headline;
use function Spatie\Piper\Str\squish;

$title = 'posts: writing clean pipelines'
    |> after('posts:')
    |> squish()
    |> headline();

// 'Writing Clean Pipelines'
```

Functions that create arrays are called directly:

```php
use function Spatie\Piper\Arr\range;
use function Spatie\Piper\Arr\times;

$numbers = range(1, 5);
$squares = times(5, fn (int $number): int => $number ** 2);
```

## API

Most documented Laravel collection methods have Piper equivalents, including:

```text
after, all, average, avg, before, chunk, chunkWhile, collapse,
collapseWithKeys, combine, concat, contains, containsStrict, count, countBy,
crossJoin, diff, diffAssoc, diffAssocUsing, diffKeys, diffUsing,
doesntContain, doesntContainStrict, dot, duplicates, duplicatesStrict, each,
eachSpread, ensure, every, except, filter, first, firstOrFail, firstWhere,
flatMap, flatten, flip, forget, forPage, fromJson, get, getOrPut, groupBy,
has, hasAny, hasMany, hasSole, implode, intersect, intersectUsing,
intersectAssoc, intersectAssocUsing, intersectByKeys, isEmpty, isNotEmpty,
join, keyBy, keys, last, make, map, mapInto, mapSpread, mapToDictionary,
mapToGroups, mapWithKeys, max, median, merge, mergeRecursive, min, mode,
multiply, nth, only, pad, partition, percentage, pluck, pop, prepend, pull,
push, put, random, range, reduce, reduceSpread, reduceWithKeys, reject,
replace, replaceRecursive, reverse, search, select, shift, shuffle, skip,
skipUntil, skipWhile, slice, sliding, sole, some, sort, sortBy, sortByDesc,
sortDesc, sortKeys, sortKeysDesc, sortKeysUsing, splice, split, splitIn, sum,
take, takeUntil, takeWhile, tap, times, toArray, toJson, toPrettyJson,
transform, undot, union, unique, uniqueStrict, unless, unlessEmpty,
unlessNotEmpty, unwrap, value, values, when, whenEmpty, whenNotEmpty, where,
whereStrict, whereBetween, whereIn, whereInStrict, whereInstanceOf,
whereNotBetween, whereNotIn, whereNotInStrict, whereNotNull, whereNull, wrap,
zip
```

Piper's string API includes the dependency-free parts of Laravel's `Str` and
`Stringable` APIs:

```text
after, afterLast, append, before, beforeLast, between, betweenFirst, camel,
charAt, contains, deduplicate, endsWith, exactly, explode, finish, fromBase64,
headline, is, isAscii, isEmpty, isJson, isMatch, isNotEmpty, isUlid, isUuid,
kebab, lcfirst, length, limit, lower, ltrim, mask, matchAll, newLine, numbers,
padBoth, padLeft, padRight, password, position, prepend, random, remove, repeat,
replace, replaceArray, replaceEnd, replaceFirst, replaceLast, replaceMatches,
replaceStart, reverse, rtrim, scan, snake, split, squish, start, startsWith,
stripTags, studly, substr, substrCount, substrReplace, swap, take, test, title,
toBase64, toBoolean, toFloat, toInteger, toString, trim, ucfirst, unwrap, upper,
value, wordCount, wordWrap, words, wrap
```

Dependency-heavy string helpers such as Markdown rendering, transliteration,
inflection, date parsing, and UUID/ULID object generation are intentionally not
included yet. Laravel's `match` method is also not exposed as a function because
`match` is a PHP reserved keyword.

## Differences from Laravel Collections

Piper does not have a collection object. Array-returning operations are
immutable and return new arrays.

Laravel methods that normally mutate a collection have Piper-specific behavior:

- `push`, `put`, `prepend`, `unshift`, `forget`, and `transform` return changed
  copies.
- `pop`, `shift`, `pull`, and `splice` return the extracted value or slice and
  do not return the remaining array.

These Laravel features are intentionally not implemented:

```text
collect, lazy, macro, dd, dump, pipe, pipeInto, pipeThrough, getIterator,
getCachingIterator, jsonSerialize, toBase, ArrayAccess methods, __construct,
__get, __toString, escapeWhenCastingToString, proxy, containsOneItem,
containsManyItems, add
```

The `empty` collection constructor is also not exposed as a function because
`empty` is a PHP language construct.

## Testing

```bash
composer test
```

The public test suite demonstrates Piper through the pipe operator rather than
calling transform functions directly.
