[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/piper.svg?style=flat-square)](https://packagist.org/packages/spatie/piper)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/spatie/piper/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/spatie/piper/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/spatie/piper/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/spatie/piper/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/piper.svg?style=flat-square)](https://packagist.org/packages/spatie/piper)

Piper is a pipe operator-first PHP utility library for working with plain arrays and strings. It ports Laravel's collection and string utility methods to standalone functions.

```php
use function Spatie\Piper\Arr\{filter, join, map, values};
use function Spatie\Piper\Str\{prefix, suffix};

[1, 2, 3, 4, 5, 6]
    |> filter(fn (int $i) => $i % 2 === 0)
    |> map(fn (int $i) => pow($i, 2))
    |> values()
    |> join(', ', ', and ')
    |> prefix('The winning numbers are ')
    |> suffix('.');

// "The winning numbers are 4, 16, and 36."
```

Piper can be installed using Composer.

```bash
composer require spatie/piper
```

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/piper.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/piper)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source).

You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Documentation

### Array functions

Each array function returns a function that can be used to transform an array with the pipe operator. Refer to Laravel's [collection docs](https://laravel.com/docs/13.x/collections) for detailed usage notes & examples.

```php
use function Spatie\Piper\Arr\chunkWhile;

[0, 1, 1, 2, 3, 5]
    |> chunkWhile(fn (int $i) => $i < 3);

// [[0, 1, 1, 3], [3, 5]]
```

```php
namespace Spatie\Piper\Arr;

function after(mixed $value, bool $strict = false)
function average(callable|string|int|array|null $callback = null)
function avg(callable|string|int|array|null $callback = null)
function before(mixed $value, bool $strict = false)
function chunk(int $size, bool $preserveKeys = false)
function chunkWhile(callable $callback)
function collapse()
function collapseWithKeys()
function combine(mixed $values)
function concat(iterable $source)
function contains(mixed ...$arguments)
function containsStrict(mixed $key, mixed $value = null, bool $hasValue = false)
function count()
function countBy(callable|string|int|array|null $callback = null)
function crossJoin(mixed ...$lists)
function diff(mixed $other)
function diffAssoc(mixed $other)
function diffAssocUsing(mixed $other, callable $callback)
function diffKeys(mixed $other)
function diffKeysUsing(mixed $other, callable $callback)
function diffUsing(mixed $other, callable $callback)
function doesntContain(mixed ...$arguments)
function doesntContainStrict(mixed $key, mixed $value = null, bool $hasValue = false)
function dot(string $prepend = '')
function duplicates(callable|string|int|array|null $callback = null, bool $strict = false)
function duplicatesStrict(callable|string|int|array|null $callback = null)
function each(callable $callback)
function eachSpread(callable $callback)
function ensure(string|array $type)
function every(mixed ...$arguments)
function except(mixed $keys)
function filter(?callable $callback = null)
function first(?callable $callback = null, mixed $default = null)
function firstOrFail(?callable $callback = null)
function firstWhere(mixed ...$arguments)
function flatMap(callable $callback)
function flatten(float|int $depth = INF)
function flip()
function forget(mixed $keys)
function forPage(int $page, int $perPage)
function fromJson(string $json, int $depth = 512, int $flags = 0): array
function get(mixed $key, mixed $default = null)
function getOrPut(mixed $key, mixed $value)
function groupBy(mixed $groupBy, bool $preserveKeys = false)
function has(mixed ...$keys)
function hasAny(mixed ...$keys)
function hasMany(mixed ...$arguments)
function hasSole(mixed ...$arguments)
function implode(mixed $value, ?string $glue = null)
function intersect(mixed $other)
function intersectAssoc(mixed $other)
function intersectAssocUsing(mixed $other, callable $callback)
function intersectByKeys(mixed $other)
function intersectUsing(mixed $other, callable $callback)
function isEmpty()
function isNotEmpty()
function join(string $glue, string $finalGlue = '')
function keyBy(mixed $keyBy)
function keys()
function last(?callable $callback = null, mixed $default = null)
function make(mixed $items = []): array
function map(callable $callback)
function mapInto(string $class)
function mapSpread(callable $callback)
function mapToDictionary(callable $callback)
function mapToGroups(callable $callback)
function mapWithKeys(callable $callback)
function max(callable|string|int|array|null $callback = null)
function median(string|int|array|null $key = null)
function merge(mixed $other)
function mergeRecursive(mixed $other)
function min(callable|string|int|array|null $callback = null)
function mode(string|int|array|null $key = null)
function multiply(int $multiplier)
function nth(int $step, int $offset = 0)
function only(mixed $keys)
function pad(int $size, mixed $value)
function partition(mixed ...$arguments)
function percentage(callable $callback, int $precision = 2)
function pluck(callable|string|int|array|null $value, callable|string|int|array|null $key = null)
function pop(int $count = 1)
function prepend(mixed $value, mixed $key = null, bool $hasKey = false)
function pull(mixed $key, mixed $default = null)
function push(mixed ...$values)
function put(mixed $key, mixed $value)
function random(callable|int|null $number = null, bool $preserveKeys = false)
function range(int $from, int $to, int $step = 1): array
function reduce(callable $callback, mixed $initial = null)
function reduceSpread(callable $callback, mixed ...$initial)
function reduceWithKeys(callable $callback, mixed $initial = null)
function reject(mixed $callback = true)
function replace(mixed $other)
function replaceRecursive(mixed $other)
function reverse()
function search(mixed $value, bool $strict = false)
function select(mixed $keys)
function shift(int $count = 1)
function shuffle()
function skip(int $count)
function skipUntil(mixed $value)
function skipWhile(mixed $value)
function slice(int $offset, ?int $length = null)
function sliding(int $size = 2, int $step = 1)
function sole(?callable $callback = null)
function some(mixed ...$arguments)
function sort(?callable $callback = null)
function sortBy(mixed $callback, int $options = SORT_REGULAR, bool $descending = false)
function sortByDesc(mixed $callback, int $options = SORT_REGULAR)
function sortDesc(int $options = SORT_REGULAR)
function sortKeys(int $options = SORT_REGULAR, bool $descending = false)
function sortKeysDesc(int $options = SORT_REGULAR)
function sortKeysUsing(callable $callback)
function splice(int $offset, ?int $length = null, mixed $replacement = [])
function split(int $numberOfGroups)
function splitIn(int $numberOfGroups)
function sum(callable|string|int|array|null $callback = null)
function take(int $limit)
function takeUntil(mixed $value)
function takeWhile(mixed $value)
function tap(callable $callback)
function times(int $number, ?callable $callback = null): array
function toArray()
function toJson(int $options = 0)
function toPrettyJson(int $options = 0)
function transform(callable $callback)
function undot()
function union(mixed $other)
function unique(callable|string|int|array|null $key = null, bool $strict = false)
function uniqueStrict(callable|string|int|array|null $key = null)
function unless(mixed $value, callable $callback, ?callable $default = null)
function unlessEmpty(callable $callback, ?callable $default = null)
function unlessNotEmpty(callable $callback, ?callable $default = null)
function unwrap(mixed $value): mixed
function value(string|int|array|null $key, mixed $default = null)
function values()
function when(mixed $value, callable $callback, ?callable $default = null)
function whenEmpty(callable $callback, ?callable $default = null)
function whenNotEmpty(callable $callback, ?callable $default = null)
function where(mixed ...$arguments)
function whereBetween(mixed $key, iterable $values)
function whereIn(mixed $key, iterable $values, bool $strict = false)
function whereInstanceOf(string|array $type)
function whereInStrict(mixed $key, iterable $values)
function whereNotBetween(mixed $key, iterable $values)
function whereNotIn(mixed $key, iterable $values, bool $strict = false)
function whereNotInStrict(mixed $key, iterable $values)
function whereNotNull(mixed $key = null)
function whereNull(mixed $key = null)
function whereStrict(mixed $key, mixed $value)
function wrap(mixed $value): array
function zip(mixed ...$arrays)
```

### String functions

Each array function returns a function that can be used to transform an array with the pipe operator. Refer to Laravel's [strings docs](https://laravel.com/docs/13.x/strings) for detailed usage notes & examples.

```php
use function Spatie\Piper\Str\camel;

"pipe operator"
    |> camel();

// "pipeOperator"
```

```php
namespace Spatie\Piper\Str;

function after(string $search)
function afterLast(string $search)
function append(string ...$values)
function before(string $search)
function beforeLast(string $search)
function between(string $from, string $to)
function betweenFirst(string $from, string $to)
function camel()
function charAt(int $index)
function contains(string|iterable $needles, bool $ignoreCase = false)
function deduplicate(string $character = ' ')
function endsWith(string|iterable $needles)
function exactly(string $value)
function explode(string $separator, int $limit = PHP_INT_MAX)
function finish(string $cap)
function fromBase64(bool $strict = false)
function headline()
function is(string|iterable $patterns, bool $ignoreCase = false)
function isAscii()
function isEmpty()
function isJson()
function isMatch(string|array $pattern)
function isNotEmpty()
function isUlid()
function isUuid(int|string|null $version = null)
function kebab()
function lcfirst()
function length(?string $encoding = 'UTF-8')
function limit(int $limit = 100, string $end = '...', bool $preserveWords = false)
function lower()
function ltrim(?string $characters = null)
function mask(string $character, int $index, ?int $length = null, string $encoding = 'UTF-8')
function matchAll(string $pattern)
function newLine(int $count = 1)
function numbers()
function padBoth(int $length, string $pad = ' ')
function padLeft(int $length, string $pad = ' ')
function padRight(int $length, string $pad = ' ')
function password(int $length = 32, bool $letters = true, bool $numbers = true, bool $symbols = true, bool $spaces = false): string
function position(string $needle, int $offset = 0, ?string $encoding = 'UTF-8')
function prepend(string ...$values)
function random(int $length = 16): string
function remove(string|iterable $search, bool $caseSensitive = true)
function repeat(int $times)
function replace(string|iterable $search, string|iterable $replace, bool $caseSensitive = true)
function replaceArray(string $search, iterable $replace)
function replaceEnd(string $search, string $replace)
function replaceFirst(string $search, string $replace)
function replaceLast(string $search, string $replace)
function replaceMatches(string $pattern, string|callable $replace, int $limit = -1)
function replaceStart(string $search, string $replace)
function reverse()
function rtrim(?string $characters = null)
function scan(string $format)
function snake(string $delimiter = '_')
function split(string $pattern, int $limit = -1, int $flags = 0)
function squish()
function start(string $prefix)
function startsWith(string|iterable $needles)
function stripTags(?string $allowedTags = null)
function studly()
function substr(int $start, ?int $length = null, string $encoding = 'UTF-8')
function substrCount(string $needle, int $offset = 0, ?int $length = null)
function substrReplace(string|array $replace, int|array $offset = 0, int|array|null $length = null)
function swap(array $map)
function take(int $limit)
function test(string|array $pattern)
function title()
function toBase64()
function toBoolean()
function toFloat()
function toInteger()
function toString()
function trim(?string $characters = null)
function ucfirst()
function unwrap(string $before, ?string $after = null)
function upper()
function wordCount(?string $characters = null)
function words(int $words = 100, string $end = '...')
function wordWrap(int $characters = 75, string $break = "\n", bool $cutLongWords = false)
function wrap(string $before, ?string $after = null)
```

## Testing

You can run the tests with:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sebastian De Deyne](https://github.com/sebastiandedeyne)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
