# Piper Laravel Collection Port Plan

## Goal

Piper is a Laravel-package-shaped PHP package that ports Laravel's `Collection`
API to plain arrays and pipe-native functions.

The package should let users write collection-style transformations without a
wrapper object:

```php
use function Spatie\Piper\filter;
use function Spatie\Piper\map;
use function Spatie\Piper\values;

$result = [1, 2, 3, 4]
    |> map(fn (int $value): int => $value * 2)
    |> filter(fn (int $value): bool => $value > 4)
    |> values();
```

This targets PHP 8.5's native pipe operator. The pipe operator passes the left
side into a single callable on the right, so public Piper functions should be
closure factories. Internal first-argument implementations live in an internal
namespace and do the actual work.

## Confirmed Decisions

- Vendor and namespace: `Spatie\Piper`.
- Composer package name: `spatie/piper`, unless changed before publishing.
- Public function imports use PHP function import syntax:

```php
use function Spatie\Piper\map;
```

- Public functions live in the `Spatie\Piper` namespace.
- Public functions are pipe-native closure factories, for example
  `map(callable $callback): Closure`.
- Implementations are inline in the public function files. Small shared helper
  functions for behavior like dot access and callback normalization live in
  `src/Functions/support.php`.
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
  Functions/
    map.php
    filter.php
    ...
  functions.php
  internal.php
tests/
  Functions/
    MapTest.php
    FilterTest.php
    ...
  TestCase.php
```

`src/Functions/*.php` files define the public `Spatie\Piper` functions.
`src/Functions/*.php` files define the public `Spatie\Piper` functions and
inline their implementations in the returned closures. `Spatie\Piper\Support`
contains only shared primitives. `src/functions.php` is the Composer autoload
entrypoint that requires the individual function files.

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
namespace Spatie\Piper;

use Closure;

use function Spatie\Piper\Internal\map as internal_map;

function map(callable $callback): Closure
{
    return fn (array $items): array => internal_map($items, $callback);
}
```

For methods without extra arguments:

```php
namespace Spatie\Piper;

use Closure;

use function Spatie\Piper\Internal\values as internal_values;

function values(): Closure
{
    return fn (array $items): array => internal_values($items);
}
```

For constructors or source-producing methods that do not transform an input
array, return arrays directly:

```php
$numbers = Spatie\Piper\range(1, 10);
$items = Spatie\Piper\fromJson($json);
```

Be careful with names that collide with PHP native functions. They are safe
inside `Spatie\Piper`, but examples should always import explicitly or call the
fully qualified function.

## Internal API Pattern

Internal functions take the data first and can call each other directly:

```php
namespace Spatie\Piper\Internal;

function map(array $items, callable $callback): array
{
    $result = [];

    foreach ($items as $key => $value) {
        $result[$key] = $callback($value, $key);
    }

    return $result;
}
```

Internal composition should prefer Piper internals over PHP one-liners when that
keeps behavior aligned with Laravel semantics. Do not use Laravel's
`Collection`, `Arr`, helpers, or contracts.

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
all
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

## Semantic Notes

`all`
: Returns the input array unchanged. It exists for parity, though most Piper
  chains naturally end with a plain array already.

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

## Testing Strategy

Use Pest from the Spatie skeleton. Port Laravel's
`SupportCollectionTest.php` test cases into Piper's API.

Rules:

- Public function tests must use the pipe operator.
- Do not call public transformation functions as normal direct functions in
  tests.
- Constructor/source helpers may be called directly because they do not consume
  a piped array.
- Test internal functions only when the public API cannot expose a behavior
  directly.
- Preserve Laravel's edge cases where Piper claims parity.
- Adjust tests where Piper intentionally differs because arrays are immutable or
  there is no wrapper object.

Example test style:

```php
use function Spatie\Piper\filter;
use function Spatie\Piper\map;

it('maps and filters values', function () {
    $result = [1, 2, 3]
        |> map(fn (int $value): int => $value * 2)
        |> filter(fn (int $value): bool => $value > 2);

    expect($result)->toBe([1 => 4, 2 => 6]);
});
```

Create one focused test file per public function where practical. Some aliases
or tightly coupled methods can share files, for example `avg` and `average`.

Priority order:

1. Core traversal and selection: `map`, `filter`, `reject`, `values`, `keys`,
   `first`, `last`, `get`, `has`.
2. Data access and where helpers: `pluck`, `where`, `whereIn`, `whereBetween`,
   `firstWhere`, `value`.
3. Aggregates: `count`, `sum`, `avg`, `min`, `max`, `median`, `mode`,
   `percentage`.
4. Reshaping: `chunk`, `collapse`, `flatten`, `groupBy`, `keyBy`, `partition`,
   `mapWithKeys`, `mapToGroups`.
5. Sorting and uniqueness: `sort`, `sortBy`, `unique`, `duplicates`.
6. Set operations and merging: `diff`, `intersect`, `merge`, `union`,
   `replace`.
7. Edge behavior and parity cases from Laravel's suite.

## README Strategy

Use Laravel's collection documentation as the base structure and adapt every
example to Piper's pipe-native API.

Documentation rules:

- Include attribution to Laravel's MIT licensed documentation.
- Replace `collect([...])->method(...)` examples with pipe chains.
- Use `use function Spatie\Piper\...` imports in examples.
- Call out that Piper returns plain arrays, not collection objects.
- Call out that functions with options return closures for pipe compatibility.
- Include a "Not implemented" section matching this plan.
- Do not document higher-order collection messages or lazy collections yet.

Example conversion:

```php
use function Spatie\Piper\map;
use function Spatie\Piper\reject;

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
9. Write README examples as methods stabilize.
10. Run the full test suite, static analysis, and formatting.

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
