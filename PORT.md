# Piper Laravel Collection and String Port Plan

## Goal

Piper is a Laravel-package-shaped PHP package that ports Laravel's `Collection`
API and fluent `Str` API to plain arrays, strings, and pipe-native functions.

The package should let users write collection-style transformations without a
wrapper object:

```php
use function Spatie\Piper\Arr\filter;
use function Spatie\Piper\Arr\map;
use function Spatie\Piper\Arr\values;

$result = [1, 2, 3, 4]
    |> map(fn (int $value): int => $value * 2)
    |> filter(fn (int $value): bool => $value > 4)
    |> values();
```

This targets PHP 8.5's native pipe operator. The pipe operator passes the left
side into a single callable on the right, so public Piper functions should be
closure factories.

String transformations follow the same pipe-native shape:

```php
use function Spatie\Piper\Str\after;
use function Spatie\Piper\Str\headline;
use function Spatie\Piper\Str\squish;

$title = 'posts: writing clean pipelines'
    |> after('posts:')
    |> squish()
    |> headline();
```

## Confirmed Decisions

- Vendor and namespace: `Spatie\Piper`.
- Composer package name: `spatie/piper`, unless changed before publishing.
- Public function imports use PHP function import syntax:

```php
use function Spatie\Piper\Arr\map;
```

- Public array functions live in the `Spatie\Piper\Arr` namespace.
- Public string functions live in the `Spatie\Piper\Str` namespace.
- Array functions are pipe-native closure factories, for example
  `map(callable $callback): Closure`.
- String transformation functions are pipe-native closure factories, for
  example `after(string $search): Closure`.
- String source helpers that do not consume a piped string may return values
  directly, for example `random(16)`, `uuid()`, or `password()`.
- Passthrough helpers that only return the piped value unchanged are out of
  scope. Do not port `Spatie\Piper\Arr\all` or `Spatie\Piper\Str\value`.
- Implementations are inline in the public function files. Small shared helper
  functions for behavior like dot access and callback normalization live in
  `src/Support`.
- All array-returning operations are immutable.
- Methods that mutate Laravel collection instances should not mutate input
  arrays. For mutation-primary extractors such as `pop`, `shift`, `pull`, and
  `splice`, return Laravel's removed/extracted value shape and document that
  Piper cannot also mutate the original array.
- Higher order collections are out of scope.
- Lazy collections are out of scope.
- No external runtime dependencies for collection behavior.
- The README may be a close adaptation of Laravel's collection documentation
  because Laravel's documentation is MIT licensed. Keep attribution and license
  context in the package docs.

## Upstream Sources

- Laravel 13.x collection documentation:
  `https://laravel.com/docs/13.x/collections`
- Laravel 13.x collection source:
  `https://github.com/laravel/framework/tree/13.x/src/Illuminate/Collections`
- Laravel 13.x collection tests:
  `https://github.com/laravel/framework/blob/13.x/tests/Support/SupportCollectionTest.php`
- Laravel 13.x strings documentation:
  `https://laravel.com/docs/13.x/strings`
- Laravel support `Str` source:
  `https://github.com/illuminate/support/blob/master/Str.php`
- Laravel support `Stringable` source:
  `https://github.com/illuminate/support/blob/master/Stringable.php`
- Laravel 13.x `Str` tests:
  `https://github.com/laravel/framework/blob/13.x/tests/Support/SupportStrTest.php`
- Laravel 13.x `Stringable` tests:
  `https://github.com/laravel/framework/blob/13.x/tests/Support/SupportStringableTest.php`
- Spatie package skeleton:
  `https://github.com/spatie/package-skeleton-laravel`
- PHP pipe operator:
  `https://www.php.net/manual/en/language.operators.functional.php`

## Package Shape

Start from `spatie/package-skeleton-laravel`, then strip anything unnecessary for
a function-only package.

Expected structure:

```text
composer.json
README.md
PORT.md
src/
  Arr/
    map.php
    filter.php
    ...
  Str/
    after.php
    headline.php
    squish.php
    ...
  Support/
    normalize.php
    dataGet.php
    ...
  Exceptions/
    ItemNotFoundException.php
    MultipleItemsFoundException.php
  functions.php
tests/
  Functions/
    MapTest.php
    FilterTest.php
    ...
    Str/
      AfterTest.php
      SquishTest.php
      ...
  TestCase.php
```

`src/Arr/*.php` files define the public `Spatie\Piper\Arr` functions.
`src/Str/*.php` files define the public `Spatie\Piper\Str` functions. Both
namespaces inline their implementations in the returned closures.
`Spatie\Piper\Support` contains only shared primitives. `src/functions.php` is
the Composer autoload entrypoint that requires `Support`, `Arr`, and `Str`
function files.

Composer autoload should use `files` for functions:

```json
{
  "autoload": {
    "files": [
      "src/functions.php"
    ],
    "psr-4": {
      "Spatie\\Piper\\": "src/"
    }
  }
}
```

Keep the service provider only if there is a real Laravel integration need. For
the initial port, the package can be Laravel-compatible without registering a
provider.

## Public API Pattern

Every collection method gets its own public function file when implemented.

For methods with extra arguments:

```php
namespace Spatie\Piper\Arr;

use Closure;

function map(callable $callback): Closure
{
    return fn (array $items): array => array_map($callback, $items);
}
```

For methods without extra arguments:

```php
namespace Spatie\Piper\Arr;

use Closure;

function values(): Closure
{
    return fn (array $items): array => array_values($items);
}
```

For constructors or source-producing methods that do not transform an input
array, return arrays directly:

```php
$numbers = Spatie\Piper\Arr\range(1, 10);
$items = Spatie\Piper\Arr\fromJson($json);
```

Be careful with names that collide with PHP native functions. They are safe
inside `Spatie\Piper\Arr`, but examples should always import explicitly or call the
fully qualified function.

String functions use the same convention. Methods that transform a source
string return closure factories:

```php
namespace Spatie\Piper\Str;

use Closure;

function after(string $search): Closure
{
    return fn (string $subject): string => $search === ''
        ? $subject
        : array_reverse(explode($search, $subject, 2))[0];
}
```

Methods that produce a value without a source string return the value directly:

```php
namespace Spatie\Piper\Str;

function random(int $length = 16): string
{
    // ...
}
```

Laravel's fluent `Stringable` object should not be ported as a wrapper class for
the initial implementation. The Piper equivalent of `Str::of($value)->squish()`
is `(string) $value |> squish()`. Do not add a global `str()` helper unless we
later decide Piper should provide global helper aliases.

## Data Access Helpers

Several Laravel collection methods depend on Laravel helper behavior. Piper
should implement the needed subset internally:

- `data_get`-style access for arrays, objects, nulls, wildcards where needed,
  and dot notation.
- `data_has`-style checks for `value`.
- `value` helper behavior for lazy defaults.
- `enum_value` behavior for `UnitEnum` and `BackedEnum`.
- Callback normalization similar to Laravel's `valueRetriever`.
- Where-operator normalization similar to Laravel's `operatorForWhere`.
- Array normalization for `iterable`, `Traversable`, `JsonSerializable`, plain
  arrays, null, scalars, and enums.

Do not depend on Laravel's `Arrayable`, `Jsonable`, `Enumerable`, `Macroable`,
or helper package. If support for those interfaces is desired later, add it as
an optional Laravel bridge, not as a core dependency.

## Method Inventory

Implement these documented Laravel collection methods where they make sense for
plain arrays:

```text
after
average
avg
before
chunk
chunkWhile
collapse
collapseWithKeys
combine
concat
contains
containsStrict
count
countBy
crossJoin
diff
diffAssoc
diffAssocUsing
diffKeys
doesntContain
doesntContainStrict
dot
duplicates
duplicatesStrict
each
eachSpread
ensure
every
except
filter
first
firstOrFail
firstWhere
flatMap
flatten
flip
forget
forPage
fromJson
get
groupBy
has
hasAny
hasMany
hasSole
implode
intersect
intersectUsing
intersectAssoc
intersectAssocUsing
intersectByKeys
isEmpty
isNotEmpty
join
keyBy
keys
last
make
map
mapInto
mapSpread
mapToGroups
mapWithKeys
max
median
merge
mergeRecursive
min
mode
multiply
nth
only
pad
partition
percentage
pluck
pop
prepend
pull
push
put
random
range
reduce
reduceSpread
reject
replace
replaceRecursive
reverse
search
select
shift
shuffle
skip
skipUntil
skipWhile
slice
sliding
sole
some
sort
sortBy
sortByDesc
sortDesc
sortKeys
sortKeysDesc
sortKeysUsing
splice
split
splitIn
sum
take
takeUntil
takeWhile
tap
times
toArray
toJson
toPrettyJson
transform
undot
union
unique
uniqueStrict
unless
unlessEmpty
unlessNotEmpty
unwrap
value
values
when
whenEmpty
whenNotEmpty
where
whereStrict
whereBetween
whereIn
whereInStrict
whereInstanceOf
whereNotBetween
whereNotIn
whereNotInStrict
whereNotNull
whereNull
wrap
zip
```

Also consider implementing these public source methods from Laravel's actual
source, even though they are not all prominent in the docs:

```text
diffUsing
diffKeysUsing
empty
getOrPut
mapToDictionary
reduceWithKeys
unshift
```

## String Method Inventory

Implement documented Laravel string and fluent string methods where they make
sense for plain strings:

```text
after
afterLast
apa
append
ascii
basename
before
beforeLast
between
betweenFirst
camel
charAt
chopStart
chopEnd
classBasename
contains
containsAll
deduplicate
dirname
doesntContain
endsWith
exactly
excerpt
explode
finish
fromBase64
headline
inlineMarkdown
is
isAscii
isEmpty
isJson
isMatch
isNotEmpty
isUlid
isUrl
isUuid
kebab
lcfirst
length
limit
lower
markdown
mask
matchAll
newLine
padBoth
padLeft
padRight
parseCallback
password
plural
pluralStudly
position
prepend
random
remove
repeat
replace
replaceArray
replaceFirst
replaceLast
replaceMatches
replaceStart
replaceEnd
reverse
scan
singular
slug
snake
split
squish
start
startsWith
stripTags
studly
substr
substrCount
substrReplace
swap
take
tap
test
title
toBase64
toBoolean
toFloat
toHtmlString
toInteger
toString
transliterate
trim
ltrim
rtrim
ucfirst
ucsplit
ulid
unwrap
upper
uuid
uuid7
wordCount
wordWrap
words
wrap
```

Also consider implementing these public methods from Laravel's actual `Str` and
`Stringable` sources, even though they are not all prominent in the docs:

```text
convertCase
createRandomStringsNormally
createRandomStringsUsing
createRandomStringsUsingSequence
createUlidsNormally
createUlidsUsing
createUlidsUsingSequence
createUuidsNormally
createUuidsUsing
createUuidsUsingSequence
flushCache
freezeUlids
freezeUuids
numbers
orderedUuid
pascal
pluralPascal
toDate
```

Track these documented methods separately because they appeared in the Laravel
13.x strings documentation but were not present in the reviewed `Str.php` or
`Stringable.php` source:

```text
decrypt
doesntEndWith
doesntStartWith
encrypt
hash
initials
toUri
ucwords
match
whenDoesntEndWith
whenDoesntStartWith
```

## Semantic Notes

`all`, `Str\value`
: Do not implement. They are passthrough helpers that return the piped value
  unchanged, which makes them redundant in Piper chains.

`make`, `wrap`, `unwrap`, `range`, `times`, `fromJson`, `empty`
: These are source/constructor helpers. They should return arrays directly
  rather than closure factories.

`each`, `tap`
: Return the original input array after running side effects.

`transform`
: Laravel mutates the collection. Piper should behave as an alias-style
  transformation that returns a new mapped array.

`push`, `put`, `prepend`, `unshift`
: Return a new array with the added values.

`forget`
: Return a new array without the requested keys.

`pop`, `shift`, `pull`, `splice`
: Implement as extractor-style functions that return Laravel's removed value or
  removed slice shape. They do not mutate the input array and do not return the
  remaining array. If users need the remaining array later, add explicit helper
  names rather than overloading these ports.

`pipe`, `pipeInto`, `pipeThrough`
: Native PHP pipe makes `pipe` less useful. Implement `pipeThrough` only if it
  remains ergonomic with arrays. Otherwise document as not implemented.

`when`, `unless`, `whenEmpty`, `whenNotEmpty`, `unlessEmpty`,
`unlessNotEmpty`
: Implement callback-based conditionals only. Higher-order proxy behavior is out
  of scope.

`dd`, `dump`
: Document as not implemented initially unless we decide to provide a tiny
  dependency-free `var_dump`/`exit` equivalent. Laravel's versions rely on app
  debugging helpers.

## String Semantic Notes

Most Laravel `Stringable` methods return a new `Stringable` instance. Piper
should return plain strings for transformations, booleans for predicates,
integers/floats for measurements or casts, and arrays for split/extract methods.

`after`, `afterLast`, `before`, `beforeLast`, `between`, `betweenFirst`,
`substr`, `take`
: Return strings and preserve Laravel's edge cases for empty search strings,
  negative indexes, and missing delimiters.

`camel`, `kebab`, `snake`, `studly`, `pascal`
: Preserve Laravel's per-process caches and expose `flushCache()` if these
  methods are implemented with caches. `pascal` is a source alias of `studly`;
  the docs still emphasize `studly`.

`contains`, `containsAll`, `doesntContain`, `startsWith`, `endsWith`, `is`,
`isMatch`
: Return booleans. Preserve Laravel's array/iterable needle support and
  `ignoreCase` arguments where present.

`append`, `prepend`, `finish`, `start`, `wrap`, `unwrap`, `newLine`
: Return changed string copies. `append` and `prepend` should accept variadic
  values like Laravel's fluent API.

`explode`, `split`, `scan`, `matchAll`
: Return plain arrays, not collections. Keep result shapes compatible with the
  underlying Laravel behavior as closely as practical.

`tap`
: Return the original string after running side effects.

`when` and the fluent `when*` methods
: Do not implement for strings. Piper string pipelines should keep branching in
  normal PHP control flow instead of porting Laravel's fluent conditional API.

`toString`, `value`
: Both should return the current string. `toString` is useful for Laravel parity
  even though a Piper pipeline already holds a string.

`toInteger`, `toFloat`, `toBoolean`
: Return scalar casts. Match Laravel's conversion semantics, including
  `FILTER_VALIDATE_BOOLEAN` behavior for booleans.

`toDate`
: Requires a decision. Laravel's fluent method uses the `Date` facade and
  Carbon-like behavior. Piper should either omit it initially or introduce an
  explicit date dependency; do not silently use framework facades.

`markdown`, `inlineMarkdown`, `toHtmlString`
: Requires a decision. Laravel uses `league/commonmark` and returns HTML-ish
  values, with `toHtmlString` returning an `HtmlString` object. Piper should omit
  these initially unless we accept optional or required Markdown/HTML
  dependencies.

`encrypt`, `decrypt`, `hash`, `toUri`
: These are documented fluent string methods, but they are not implemented by
  `Stringable.php` in the reviewed source. Keep them out of the initial source
  inventory unless their upstream implementation lands or we intentionally add
  Piper-specific helpers.

`match`
: Do not implement as a Piper function named `match`. `match` is a PHP reserved
  keyword, so `use function Spatie\Piper\Str\match;` and `match(...)` are not a
  usable pipe-facing API.

`random`, `password`, `uuid`, `uuid7`, `orderedUuid`, `ulid`
: Source helpers. They should return values directly and need deterministic test
  hooks if factory override methods are ported.

`createRandomStringsUsing*`, `createUuidsUsing*`, `freezeUuids`,
`createUlidsUsing*`, `freezeUlids`
: Test hooks and deterministic factories from Laravel's source. Port them only
  if `random`, `uuid`, or `ulid` are included and tests need parity with
  Laravel.

`classBasename`
: Requires Piper to implement the Laravel helper behavior internally instead of
  depending on Laravel's global helper.

`ascii`, `transliterate`, `slug`
: Laravel uses `voku/portable-ascii`. Decide whether Piper accepts that
  dependency, implements a smaller native approximation, or marks these as
  intentionally different.

`plural`, `pluralStudly`, `pluralPascal`, `singular`
: Laravel behavior depends on Doctrine inflector through support internals.
  Decide whether to add an inflector dependency or document a smaller English
  inflection subset.

## Not Implemented Initially

These Laravel collection features rely on a wrapper object, Laravel runtime
behavior, lazy collections, higher-order proxies, or framework helpers that do
not fit the initial Piper API.

```text
collect
lazy
macro
dd
dump
pipe
pipeInto
pipeThrough
getIterator
getCachingIterator
jsonSerialize
toBase
offsetExists
offsetGet
offsetSet
offsetUnset
__construct
__get
__toString
escapeWhenCastingToString
proxy
containsOneItem
containsManyItems
add
```

Notes:

- `containsOneItem` and `containsManyItems` are deprecated in Laravel in favor
  of `hasSole` and `hasMany`.
- `add` is a Laravel source method, but `push` covers the documented behavior.
- `jsonSerialize`, `__toString`, ArrayAccess, iterators, and proxy methods only
  make sense on an object wrapper.
- Higher-order collection syntax such as `$collection->map->name` is explicitly
  out of scope.

For strings, these Laravel fluent features are not implemented initially.
Dependency-heavy entries may be reconsidered, but `when*` conditionals are out
of scope:

```text
Str::of
str
macro
pipe
dump
ArrayAccess
jsonSerialize
__construct
__get
__toString
Stringable object wrapper
Conditionable
Dumpable
Macroable
Tappable
when
whenContains
whenContainsAll
whenEmpty
whenEndsWith
whenExactly
whenIs
whenIsAscii
whenIsUlid
whenIsUuid
whenNotEmpty
whenNotExactly
whenStartsWith
whenTest
markdown
inlineMarkdown
toHtmlString
toDate
encrypt
decrypt
hash
toUri
doesntEndWith
doesntStartWith
initials
ucwords
match
whenDoesntEndWith
whenDoesntStartWith
```

Notes:

- Native PHP pipe makes `Stringable::pipe` redundant.
- `Str::of`, `str()`, `__toString`, ArrayAccess, and `jsonSerialize` only make
  sense when Piper has a string wrapper object, which is out of scope for the
  first string port.
- `dump` is framework/debug-helper behavior, not core string manipulation.
- `match` exists upstream, but it collides with PHP's `match` keyword in a
  function-only API.
- `encrypt`, `decrypt`, `hash`, `toUri`, `doesntEndWith`, `doesntStartWith`,
  `initials`, `ucwords`, `whenDoesntEndWith`, and `whenDoesntStartWith` are
  listed in the docs' strings tables but were not present in the reviewed
  `Str` / `Stringable` source.

## External Dependency Review

Laravel collection behavior touches these external Laravel concepts:

- `Illuminate\Support\Arr`
- `Illuminate\Support\Collection`
- `Illuminate\Support\LazyCollection`
- `Illuminate\Support\Enumerable`
- `Illuminate\Support\Traits\Macroable`
- `Illuminate\Support\Traits\Conditionable`
- `Illuminate\Support\HigherOrderCollectionProxy`
- `Illuminate\Support\HigherOrderWhenProxy`
- `Illuminate\Contracts\Support\Arrayable`
- `Illuminate\Contracts\Support\Jsonable`
- global helpers such as `data_get`, `data_has`, `value`, `enum_value`,
  `class_basename`, `dd`, `dump`, and `e`

Piper should reimplement only the behavior needed for plain arrays and simple
PHP values. Anything requiring the Laravel container, macros, lazy collection
classes, higher-order proxies, ArrayAccess, or object casting should stay out of
scope for the first port.

Laravel string behavior touches these additional external concepts:

- `Illuminate\Support\Stringable`
- `Illuminate\Support\Traits\Macroable`
- `Illuminate\Support\Traits\Conditionable`
- `Illuminate\Support\Traits\Dumpable`
- `Illuminate\Support\Traits\Tappable`
- `Illuminate\Support\Facades\Date`
- `Illuminate\Contracts\Support\Htmlable`
- `Illuminate\Support\HtmlString`
- `League\CommonMark`
- `Ramsey\Uuid`
- `Symfony\Component\Uid\Ulid`
- `voku\helper\ASCII`
- Doctrine inflector behavior through Laravel's pluralizer
- global helpers such as `class_basename`

Piper should not depend on Laravel support, facades, or helper packages for
strings. External dependencies should be deliberate, isolated, and justified by
documented parity needs.

## Testing Strategy

Use Pest from the Spatie skeleton. Port Laravel's
`SupportCollectionTest.php` & `SupportStrTest.php` test cases into Piper's API.

Rules:

- One file per method to test, mirror the structure of `src` (`tests/Arr/AfterTest.php`)
- Public function tests must use the pipe operator.
- Public string transformation tests must also use the pipe operator.
- Do not call public transformation functions as normal direct functions in
  tests.
- Constructor/source helpers may be called directly because they do not consume
  a piped array or string.
- Test internal functions only when the public API cannot expose a behavior
  directly.
- Preserve Laravel's edge cases where Piper claims parity.
- Adjust tests where Piper intentionally differs because arrays are immutable or
  there is no wrapper object.

Example test style:

```php
use function Spatie\Piper\Arr\filter;
use function Spatie\Piper\Arr\map;

it('maps and filters values', function () {
    $result = [1, 2, 3]
        |> map(fn (int $value): int => $value * 2)
        |> filter(fn (int $value): bool => $value > 2);

    expect($result)->toBe([1 => 4, 2 => 6]);
});
```

Create one focused test file per public function where practical. Some aliases
or tightly coupled methods can share files, for example `avg` and `average`.

## README Strategy

Use Laravel's collection documentation as the base structure and adapt every
example to Piper's pipe-native API.

Documentation rules:

- Include attribution to Laravel's MIT licensed documentation.
- Replace `collect([...])->method(...)` examples with pipe chains.
- Use `use function Spatie\Piper\Arr\...` imports in examples.
- Call out that Piper returns plain arrays, not collection objects.
- Call out that functions with options return closures for pipe compatibility.
- Include a "Not implemented" section matching this plan.
- Do not document higher-order collection messages or lazy collections yet.
- Add a strings section based on Laravel's strings documentation once the
  `Spatie\Piper\Str` API stabilizes.
- Replace `Str::of('...')->method(...)` examples with plain string pipe chains.
- Use `use function Spatie\Piper\Str\...` imports in string examples.
- Call out that Piper returns plain strings, arrays, booleans, and scalars
  rather than `Stringable` objects.

Example conversion:

```php
use function Spatie\Piper\Arr\map;
use function Spatie\Piper\Arr\reject;

$result = ['Taylor', 'Abigail', null]
    |> map(fn (?string $name): ?string => $name === null ? null : strtoupper($name))
    |> reject(fn (?string $name): bool => empty($name));
```

## Implementation Sequence

1. Scaffold from Spatie's Laravel package skeleton.
2. Configure Composer package metadata for `spatie/piper`.
3. Add function autoload entrypoints.
4. Add internal helper layer for array normalization, data access, callbacks,
   where operators, and enum values.
5. Implement a small vertical slice: `map`, `filter`, `reject`, `values`,
   `first`, `last`.
6. Add Pest tests that use `|>`.
7. Port Laravel tests method-by-method.
8. Implement the remaining methods in dependency order.
9. Add `src/Str` autoloading and implement a small string vertical slice:
   `after`, `before`, `contains`, `squish`, `headline`, `replace`, `trim`.
10. Port Laravel string tests method-by-method, starting with dependency-free
    methods.
11. Decide dependency-heavy string methods and implement them only after the
    dependency policy is explicit.
12. Write README examples as methods stabilize.
13. Run the full test suite, static analysis, and formatting.

## Open Risks

- PHP 8.5 is required for tests that use `|>`. Set the package requirement to
  PHP 8.5 or higher unless a non-pipe test mode is intentionally added.
- Closure-factory public functions are the right fit for PHP 8.5 pipes, but
  they differ from the original "array as first argument" phrasing. The direct
  first-argument API is intentionally internal.
- Some Laravel methods have subtle behavior around object access, wildcards,
  loose comparisons, enum handling, and key preservation. These should be driven
  by Laravel's test suite rather than reimplemented from memory.
- Sorting parity is likely to need careful tests because PHP sort flags,
  natural sorting, key preservation, and multi-sort behavior are easy to drift.
- Methods that return random values or depend on side effects need careful,
  deterministic tests.
- String parity can pull in more dependencies than arrays: Markdown, UUID/ULID,
  transliteration, inflection, and dates should not become runtime dependencies
  by accident.
- Laravel's strings docs and `Stringable` source currently disagree on some
  fluent methods. Treat the source as the implementation baseline and document
  intentional doc-only omissions.
