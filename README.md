# The pipe operator-first utility library

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/piper.svg?style=flat-square)](https://packagist.org/packages/spatie/piper)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/spatie/piper/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/spatie/piper/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/spatie/piper/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/spatie/piper/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/piper.svg?style=flat-square)](https://packagist.org/packages/spatie/piper)

Piper is a pipe operator-first PHP utility library for array and string manipulation. It ports Laravel's collection and string utility methods to standalone functions.

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

## Array functions

#### `after`

Returns the item after the given value.

```php
[1, 2, 3] |> after(2); // 3
```

#### `average`

Returns the average of the given values.

```php
[['score' => 10], ['score' => 20]] |> average('score'); // 15
```

#### `avg`

Alias of `average`.

```php
[['score' => 10], ['score' => 20]] |> avg('score'); // 15
```

#### `before`

Returns the item before the given value.

```php
[1, 2, 3] |> before(2); // 1
```

#### `chunk`

Breaks the array into chunks of the given size.

```php
[1, 2, 3, 4, 5] |> chunk(2); // [[1, 2], [3, 4], [5]]
```

#### `chunkWhile`

Breaks the array into chunks while the callback returns `true`.

```php
str_split('AABB') |> chunkWhile(fn (string $value, int $key, array $chunk) => $value === end($chunk)); // [['A', 'A'], ['B', 'B']]
```

#### `collapse`

Collapses an array of arrays into a single array.

```php
[[1, 2], [3, 4]] |> collapse(); // [1, 2, 3, 4]
```

#### `collapseWithKeys`

Collapses an array of keyed arrays while preserving keys.

```php
[['name' => 'Taylor'], ['role' => 'admin']] |> collapseWithKeys(); // ['name' => 'Taylor', 'role' => 'admin']
```

#### `combine`

Combines the array values as keys with another set of values.

```php
['name', 'role'] |> combine(['Taylor', 'admin']); // ['name' => 'Taylor', 'role' => 'admin']
```

#### `concat`

Appends the given values to the end of the array.

```php
[1, 2] |> concat([3, 4]); // [1, 2, 3, 4]
```

#### `contains`

Determines whether the array contains the given value or passes the given truth test.

```php
['Taylor', 'Abigail'] |> contains('Taylor'); // true
```

#### `containsStrict`

Determines whether the array strictly contains the given value.

```php
[1, 2, 3] |> containsStrict('1'); // false
```

#### `count`

Returns the number of items in the array.

```php
[1, 2, 3] |> count(); // 3
```

#### `countBy`

Counts values by the result of the given callback.

```php
['laravel', 'php', 'piper'] |> countBy(fn (string $value) => strlen($value)); // [7 => 1, 3 => 1, 5 => 1]
```

#### `crossJoin`

Returns the Cartesian product of the array and the given arrays.

```php
[1, 2] |> crossJoin(['a', 'b']); // [[1, 'a'], [1, 'b'], [2, 'a'], [2, 'b']]
```

#### `diff`

Returns the values that are not present in the given array.

```php
['a', 'b', 'c'] |> diff(['b']); // [0 => 'a', 2 => 'c']
```

#### `diffAssoc`

Returns key/value pairs that are not present in the given array.

```php
['a' => 1, 'b' => 2] |> diffAssoc(['a' => 1]); // ['b' => 2]
```

#### `diffAssocUsing`

Returns key/value pairs that are not present after comparing keys with a callback.

```php
['a' => 1, 'b' => 2] |> diffAssocUsing(['A' => 1], 'strcasecmp'); // ['b' => 2]
```

#### `diffKeys`

Returns items whose keys are not present in the given array.

```php
['a' => 1, 'b' => 2] |> diffKeys(['a' => 9]); // ['b' => 2]
```

#### `diffKeysUsing`

Returns items whose keys are not present after comparing keys with a callback.

```php
['a' => 1, 'b' => 2] |> diffKeysUsing(['A' => 9], 'strcasecmp'); // ['b' => 2]
```

#### `diffUsing`

Returns values that are not present after comparing values with a callback.

```php
['a', 'b'] |> diffUsing(['A'], 'strcasecmp'); // [1 => 'b']
```

#### `doesntContain`

Determines whether the array does not contain the given value or pass the given truth test.

```php
['Taylor', 'Abigail'] |> doesntContain('Jess'); // true
```

#### `doesntContainStrict`

Determines whether the array does not strictly contain the given value.

```php
[1, 2, 3] |> doesntContainStrict('1'); // true
```

#### `dot`

Flattens a multidimensional array using dot notation.

```php
['user' => ['name' => 'Taylor']] |> dot(); // ['user.name' => 'Taylor']
```

#### `duplicates`

Returns duplicate values from the array.

```php
['a', 'b', 'a'] |> duplicates(); // [2 => 'a']
```

#### `duplicatesStrict`

Returns duplicate values using strict comparisons.

```php
[1, '1', 1] |> duplicatesStrict(); // [2 => 1]
```

#### `each`

Iterates over each item in the array.

```php
[1, 2, 3] |> each(fn (int $value) => logger($value));
```

#### `eachSpread`

Iterates over nested item values by spreading them into the callback.

```php
[[1, 2], [3, 4]] |> eachSpread(fn (int $a, int $b) => logger($a + $b));
```

#### `ensure`

Verifies that every item in the array is of the expected type.

```php
[1, 2, 3] |> ensure('int'); // [1, 2, 3]
```

#### `every`

Determines whether all items pass the given truth test.

```php
[1, 2, 3] |> every(fn (int $value) => $value > 0); // true
```

#### `except`

Returns all items except those with the given keys.

```php
['name' => 'Taylor', 'role' => 'admin'] |> except('role'); // ['name' => 'Taylor']
```

#### `filter`

Filters the array using the given callback.

```php
[1, 2, 3, 4] |> filter(fn (int $value) => $value > 2); // [2 => 3, 3 => 4]
```

#### `first`

Returns the first item that passes the given truth test.

```php
[1, 2, 3] |> first(fn (int $value) => $value > 1); // 2
```

#### `firstOrFail`

Returns the first item or throws when no item is found.

```php
[1, 2, 3] |> firstOrFail(fn (int $value) => $value > 2); // 3
```

#### `firstWhere`

Returns the first item matching the given key/value constraint.

```php
[['score' => 98], ['score' => 91]] |> firstWhere('score', '>', 95); // ['score' => 98]
```

#### `flatMap`

Maps over the array and flattens the result by one level.

```php
[1, 2] |> flatMap(fn (int $value) => [$value, $value * 10]); // [1, 10, 2, 20]
```

#### `flatten`

Flattens a multidimensional array.

```php
[1, [2, [3]]] |> flatten(); // [1, 2, 3]
```

#### `flip`

Swaps the array keys with their values.

```php
['name' => 'Taylor'] |> flip(); // ['Taylor' => 'name']
```

#### `forget`

Returns a copy of the array without the given key.

```php
['name' => 'Taylor', 'role' => 'admin'] |> forget('role'); // ['name' => 'Taylor']
```

#### `forPage`

Returns the items that would appear on the given page.

```php
[1, 2, 3, 4] |> forPage(2, 2); // [2 => 3, 3 => 4]
```

#### `fromJson`

Decodes a JSON string into an array.

```php
fromJson('{"name":"Taylor"}'); // ['name' => 'Taylor']
```

#### `get`

Returns the value for the given key, or a default value.

```php
['name' => 'Taylor'] |> get('name'); // 'Taylor'
```

#### `getOrPut`

Returns an existing value or evaluates and returns a default value.

```php
['name' => 'Taylor'] |> getOrPut('role', 'admin'); // 'admin'
```

#### `groupBy`

Groups the array items by a given key or callback.

```php
[['team' => 'core', 'name' => 'Taylor'], ['team' => 'docs', 'name' => 'Jess']] |> groupBy('team'); // ['core' => [...], 'docs' => [...]]
```

#### `has`

Determines whether the given key exists in the array.

```php
['name' => 'Taylor'] |> has('name'); // true
```

#### `hasAny`

Determines whether any of the given keys exist in the array.

```php
['name' => 'Taylor'] |> hasAny('email', 'name'); // true
```

#### `hasMany`

Determines whether more than one item passes the given truth test.

```php
[1, 2, 3] |> hasMany(fn (int $value) => $value > 1); // true
```

#### `hasSole`

Determines whether exactly one item passes the given truth test.

```php
[1, 2, 3] |> hasSole(fn (int $value) => $value === 2); // true
```

#### `implode`

Joins array values into a string.

```php
[['name' => 'Taylor'], ['name' => 'Abigail']] |> implode('name', ', '); // 'Taylor, Abigail'
```

#### `intersect`

Returns the values that are present in the given array.

```php
['a', 'b'] |> intersect(['b', 'c']); // [1 => 'b']
```

#### `intersectAssoc`

Returns key/value pairs that are present in the given array.

```php
['a' => 1, 'b' => 2] |> intersectAssoc(['a' => 1]); // ['a' => 1]
```

#### `intersectAssocUsing`

Returns key/value pairs that are present after comparing keys with a callback.

```php
['a' => 1, 'b' => 2] |> intersectAssocUsing(['A' => 1], 'strcasecmp'); // ['a' => 1]
```

#### `intersectByKeys`

Returns items whose keys are present in the given array.

```php
['a' => 1, 'b' => 2] |> intersectByKeys(['b' => 9]); // ['b' => 2]
```

#### `intersectUsing`

Returns values that are present after comparing values with a callback.

```php
['a', 'b'] |> intersectUsing(['A'], 'strcasecmp'); // [0 => 'a']
```

#### `isEmpty`

Determines whether the array is empty.

```php
[] |> isEmpty(); // true
```

#### `isNotEmpty`

Determines whether the array is not empty.

```php
[1] |> isNotEmpty(); // true
```

#### `join`

Joins array values with a final glue string.

```php
['a', 'b', 'c'] |> join(', ', ' and '); // 'a, b and c'
```

#### `keyBy`

Keys the array by the given key or callback.

```php
[['id' => 1, 'name' => 'Taylor']] |> keyBy('id'); // [1 => ['id' => 1, 'name' => 'Taylor']]
```

#### `keys`

Returns all keys from the array.

```php
['name' => 'Taylor', 'role' => 'admin'] |> keys(); // ['name', 'role']
```

#### `last`

Returns the last item that passes the given truth test.

```php
[1, 2, 3] |> last(fn (int $value) => $value < 3); // 2
```

#### `make`

Converts the given value into an array.

```php
make('Taylor'); // ['Taylor']
```

#### `map`

Maps each item using the given callback.

```php
[1, 2, 3] |> map(fn (int $value) => $value * 2); // [2, 4, 6]
```

#### `mapInto`

Maps each item into a new instance of the given class.

```php
$users |> mapInto(UserData::class); // [UserData, UserData, ...]
```

#### `mapSpread`

Maps nested item values by spreading them into the callback.

```php
[[1, 2], [3, 4]] |> mapSpread(fn (int $a, int $b) => $a + $b); // [3, 7]
```

#### `mapToDictionary`

Groups values returned by the callback into a dictionary.

```php
$users |> mapToDictionary(fn (array $user) => [$user['team'] => $user['name']]); // ['core' => ['Taylor']]
```

#### `mapToGroups`

Groups values returned by the callback.

```php
$users |> mapToGroups(fn (array $user) => [$user['team'] => $user['name']]); // ['core' => ['Taylor']]
```

#### `mapWithKeys`

Maps items into key/value pairs.

```php
$users |> mapWithKeys(fn (array $user) => [$user['email'] => $user['name']]); // ['taylor@example.com' => 'Taylor']
```

#### `max`

Returns the maximum value for a given key or callback.

```php
[['score' => 10], ['score' => 20]] |> max('score'); // 20
```

#### `median`

Returns the median value for a given key.

```php
[1, 1, 2, 4] |> median(); // 1.5
```

#### `merge`

Merges the given array into the current array.

```php
['a'] |> merge(['b']); // ['a', 'b']
```

#### `mergeRecursive`

Recursively merges the given array into the current array.

```php
['a' => ['x']] |> mergeRecursive(['a' => ['y']]); // ['a' => ['x', 'y']]
```

#### `min`

Returns the minimum value for a given key or callback.

```php
[['score' => 10], ['score' => 20]] |> min('score'); // 10
```

#### `mode`

Returns the most frequently occurring value for a given key.

```php
[1, 1, 2, 2, 3] |> mode(); // [1, 2]
```

#### `multiply`

Creates copies of the array items the given number of times.

```php
['a', 'b'] |> multiply(2); // ['a', 'b', 'a', 'b']
```

#### `nth`

Returns every nth item from the array.

```php
[1, 2, 3, 4, 5] |> nth(2); // [1, 3, 5]
```

#### `only`

Returns only the items with the given keys.

```php
['name' => 'Taylor', 'role' => 'admin'] |> only('name'); // ['name' => 'Taylor']
```

#### `pad`

Pads the array to the given size with a value.

```php
[1, 2] |> pad(4, 0); // [1, 2, 0, 0]
```

#### `partition`

Separates items that pass the truth test from those that do not.

```php
[1, 2, 3, 4] |> partition(fn (int $value) => $value % 2 === 0); // [[1 => 2, 3 => 4], [0 => 1, 2 => 3]]
```

#### `percentage`

Returns the percentage of items that pass the given truth test.

```php
[1, 2, 3, 4] |> percentage(fn (int $value) => $value > 2); // 50.0
```

#### `pluck`

Retrieves all values for a given key.

```php
[['name' => 'Taylor'], ['name' => 'Abigail']] |> pluck('name'); // ['Taylor', 'Abigail']
```

#### `pop`

Returns and removes the last item from a copy of the array.

```php
[1, 2, 3] |> pop(); // 3
```

#### `prepend`

Adds an item to the beginning of the array.

```php
['b', 'c'] |> prepend('a'); // ['a', 'b', 'c']
```

#### `pull`

Returns the value for a key from a copy of the array.

```php
['name' => 'Taylor'] |> pull('name'); // 'Taylor'
```

#### `push`

Adds one or more items to the end of the array.

```php
[1, 2] |> push(3, 4); // [1, 2, 3, 4]
```

#### `put`

Sets the given key and value on the array.

```php
['name' => 'Taylor'] |> put('role', 'admin'); // ['name' => 'Taylor', 'role' => 'admin']
```

#### `random`

Returns one or more random items from the array.

```php
['a', 'b', 'c'] |> random(); // 'b'
```

#### `range`

Creates an array containing a range of numbers.

```php
range(1, 3); // [1, 2, 3]
```

#### `reduce`

Reduces the array to a single value.

```php
[1, 2, 3] |> reduce(fn (int $carry, int $value) => $carry + $value, 0); // 6
```

#### `reduceSpread`

Reduces the array to multiple aggregate values.

```php
[1, 2, 3] |> reduceSpread(fn (int $sum, int $count, int $value) => [$sum + $value, $count + 1], 0, 0); // [6, 3]
```

#### `reduceWithKeys`

Reduces the array to a single value while receiving keys.

```php
['a' => 1, 'b' => 2] |> reduceWithKeys(fn (int $carry, int $value, string $key) => $carry + $value, 0); // 3
```

#### `reject`

Filters out items using the given callback.

```php
[1, 2, 3, 4] |> reject(fn (int $value) => $value > 2); // [0 => 1, 1 => 2]
```

#### `replace`

Replaces items in the array with items from the given array.

```php
['name' => 'Taylor'] |> replace(['name' => 'Abigail']); // ['name' => 'Abigail']
```

#### `replaceRecursive`

Recursively replaces items in the array with items from the given array.

```php
['user' => ['name' => 'Taylor']] |> replaceRecursive(['user' => ['name' => 'Abigail']]); // ['user' => ['name' => 'Abigail']]
```

#### `reverse`

Reverses the order of the array items.

```php
[1, 2, 3] |> reverse(); // [2 => 3, 1 => 2, 0 => 1]
```

#### `search`

Returns the key of the first item matching the value or callback.

```php
['a' => 1, 'b' => 2] |> search(2); // 'b'
```

#### `select`

Selects the given keys from every item in the array.

```php
$users |> select(['id', 'name']); // [['id' => 1, 'name' => 'Taylor'], ...]
```

#### `shift`

Returns and removes the first item from a copy of the array.

```php
[1, 2, 3] |> shift(); // 1
```

#### `shuffle`

Randomly shuffles the array items.

```php
[1, 2, 3] |> shuffle(); // [2, 3, 1]
```

#### `skip`

Returns the array without the first given number of items.

```php
[1, 2, 3, 4] |> skip(2); // [2 => 3, 3 => 4]
```

#### `skipUntil`

Skips items until the given value or callback is reached.

```php
[1, 2, 3, 4] |> skipUntil(3); // [2 => 3, 3 => 4]
```

#### `skipWhile`

Skips items while the given callback returns `true`.

```php
[1, 2, 3, 4] |> skipWhile(fn (int $value) => $value < 3); // [2 => 3, 3 => 4]
```

#### `slice`

Returns a slice of the array starting at the given offset.

```php
[1, 2, 3, 4] |> slice(1, 2); // [1 => 2, 2 => 3]
```

#### `sliding`

Returns a sliding window view of the array.

```php
[1, 2, 3, 4] |> sliding(3); // [[1, 2, 3], [2, 3, 4]]
```

#### `sole`

Returns the only item matching the given truth test.

```php
[1, 2, 3] |> sole(fn (int $value) => $value === 2); // 2
```

#### `some`

Alias of `contains` for truth tests.

```php
[1, 2, 3] |> some(fn (int $value) => $value === 2); // true
```

#### `sort`

Sorts the array values.

```php
[3, 1, 2] |> sort() |> values(); // [1, 2, 3]
```

#### `sortBy`

Sorts the array by a given key or callback.

```php
$users |> sortBy('score') |> values(); // lowest score first
```

#### `sortByDesc`

Sorts the array descending by a given key or callback.

```php
$users |> sortByDesc('score') |> values(); // highest score first
```

#### `sortDesc`

Sorts the array values in descending order.

```php
[3, 1, 2] |> sortDesc() |> values(); // [3, 2, 1]
```

#### `sortKeys`

Sorts the array by its keys.

```php
['b' => 2, 'a' => 1] |> sortKeys(); // ['a' => 1, 'b' => 2]
```

#### `sortKeysDesc`

Sorts the array by its keys in descending order.

```php
['a' => 1, 'b' => 2] |> sortKeysDesc(); // ['b' => 2, 'a' => 1]
```

#### `sortKeysUsing`

Sorts the array keys using a callback.

```php
['b' => 2, 'a' => 1] |> sortKeysUsing('strnatcmp'); // ['a' => 1, 'b' => 2]
```

#### `splice`

Returns a slice removed from the array.

```php
[1, 2, 3, 4] |> splice(1, 2); // [2, 3]
```

#### `split`

Splits the array into the given number of groups.

```php
[1, 2, 3, 4, 5] |> split(2); // [[1, 2, 3], [4, 5]]
```

#### `splitIn`

Splits the array into the given number of groups, filling groups as evenly as possible.

```php
[1, 2, 3, 4, 5] |> splitIn(2); // [[1, 2, 3], [4, 5]]
```

#### `sum`

Returns the sum of the given values.

```php
[['score' => 10], ['score' => 20]] |> sum('score'); // 30
```

#### `take`

Returns the first or last number of items.

```php
[1, 2, 3, 4] |> take(2); // [1, 2]
```

#### `takeUntil`

Returns items until the given value or callback is reached.

```php
[1, 2, 3, 4] |> takeUntil(3); // [1, 2]
```

#### `takeWhile`

Returns items while the given callback returns `true`.

```php
[1, 2, 3, 4] |> takeWhile(fn (int $value) => $value < 3); // [1, 2]
```

#### `tap`

Passes the array to a callback and returns the array.

```php
[1, 2, 3] |> tap(fn (array $items) => logger($items)); // [1, 2, 3]
```

#### `times`

Creates an array by invoking a callback a given number of times.

```php
times(3, fn (int $number) => $number * 2); // [2, 4, 6]
```

#### `toArray`

Converts the value to a plain array.

```php
[1, 2, 3] |> toArray(); // [1, 2, 3]
```

#### `toJson`

Converts the array to JSON.

```php
['name' => 'Taylor'] |> toJson(); // '{"name":"Taylor"}'
```

#### `toPrettyJson`

Converts the array to pretty-printed JSON.

```php
['name' => 'Taylor'] |> toPrettyJson(); // "{\n    \"name\": \"Taylor\"\n}"
```

#### `transform`

Maps each item and returns the transformed array.

```php
[1, 2] |> transform(fn (int $value) => $value * 10); // [10, 20]
```

#### `undot`

Expands a dot-notated array into a multidimensional array.

```php
['user.name' => 'Taylor'] |> undot(); // ['user' => ['name' => 'Taylor']]
```

#### `union`

Adds the given array to the current array without replacing existing keys.

```php
['a' => 1] |> union(['a' => 2, 'b' => 3]); // ['a' => 1, 'b' => 3]
```

#### `unique`

Returns the unique items in the array.

```php
['a', 'b', 'a'] |> unique(); // [0 => 'a', 1 => 'b']
```

#### `uniqueStrict`

Returns the unique items using strict comparisons.

```php
[1, '1', 1] |> uniqueStrict(); // [0 => 1, 1 => '1']
```

#### `unless`

Runs the callback unless the given value is truthy.

```php
[1] |> unless(false, fn (array $items) => [...$items, 2]); // [1, 2]
```

#### `unlessEmpty`

Runs the callback unless the array is empty.

```php
[1] |> unlessEmpty(fn (array $items) => [...$items, 2]); // [1, 2]
```

#### `unlessNotEmpty`

Runs the callback unless the array is not empty.

```php
[] |> unlessNotEmpty(fn (array $items) => ['empty']); // ['empty']
```

#### `unwrap`

Returns the given value without wrapping it in an array.

```php
unwrap(['Taylor']); // ['Taylor']
```

#### `value`

Returns the first item value for a given key.

```php
[['name' => 'Taylor'], ['name' => 'Abigail']] |> value('name'); // 'Taylor'
```

#### `values`

Returns the array with consecutive integer keys.

```php
['a' => 'Taylor', 'b' => 'Abigail'] |> values(); // ['Taylor', 'Abigail']
```

#### `when`

Runs the callback when the given value is truthy.

```php
[1] |> when(true, fn (array $items) => [...$items, 2]); // [1, 2]
```

#### `whenEmpty`

Runs the callback when the array is empty.

```php
[] |> whenEmpty(fn (array $items) => ['empty']); // ['empty']
```

#### `whenNotEmpty`

Runs the callback when the array is not empty.

```php
[1] |> whenNotEmpty(fn (array $items) => [...$items, 2]); // [1, 2]
```

#### `where`

Filters items by a key/value pair.

```php
$users |> where('team', 'core'); // users on the core team
```

#### `whereBetween`

Filters items where a key is between two values.

```php
$users |> whereBetween('score', [90, 100]); // users with scores from 90 to 100
```

#### `whereIn`

Filters items where a key is present in the given values.

```php
$users |> whereIn('name', ['Taylor', 'Jess']); // matching users
```

#### `whereInstanceOf`

Filters items by class or type.

```php
$items |> whereInstanceOf(DateTimeImmutable::class); // DateTimeImmutable instances
```

#### `whereInStrict`

Filters items where a key is strictly present in the given values.

```php
$users |> whereInStrict('id', [1, 2]); // users with matching integer IDs
```

#### `whereNotBetween`

Filters items where a key is outside two values.

```php
$users |> whereNotBetween('score', [90, 100]); // users outside the score range
```

#### `whereNotIn`

Filters items where a key is not present in the given values.

```php
$users |> whereNotIn('name', ['Taylor']); // users not named Taylor
```

#### `whereNotInStrict`

Filters items where a key is strictly not present in the given values.

```php
$users |> whereNotInStrict('id', [1, 2]); // users without those integer IDs
```

#### `whereNotNull`

Filters items where a key is not `null`.

```php
$users |> whereNotNull('email'); // users with an email address
```

#### `whereNull`

Filters items where a key is `null`.

```php
$users |> whereNull('email'); // users without an email address
```

#### `whereStrict`

Filters items by a strict key/value comparison.

```php
$users |> whereStrict('active', true); // active users
```

#### `wrap`

Wraps the given value in an array.

```php
wrap('Taylor'); // ['Taylor']
```

#### `zip`

Merges together the values of the array with the values of the given arrays.

```php
[1, 2] |> zip(['a', 'b']); // [[1, 'a'], [2, 'b']]
```

## String functions

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
