---
title: Array functions
weight: 1
---

All array functions live in the `Spatie\Piper\Arr` namespace. Import them individually or in groups.

```php
use function Spatie\Piper\Arr\{filter, map, values};
```

Each function takes its subject as the first argument, so it slots naturally into a pipe. The reference below lists every available function in alphabetical order. Click a name to jump straight to its description.

<table style="font-size: 1.1em;">
<tbody>
<tr><td><a href="#content-after">after</a></td><td><a href="#content-forpage">forPage</a></td><td><a href="#content-pad">pad</a></td><td><a href="#content-splitin">splitIn</a></td></tr>
<tr><td><a href="#content-average">average</a></td><td><a href="#content-forget">forget</a></td><td><a href="#content-partition">partition</a></td><td><a href="#content-sum">sum</a></td></tr>
<tr><td><a href="#content-avg">avg</a></td><td><a href="#content-fromjson">fromJson</a></td><td><a href="#content-percentage">percentage</a></td><td><a href="#content-take">take</a></td></tr>
<tr><td><a href="#content-before">before</a></td><td><a href="#content-get">get</a></td><td><a href="#content-pluck">pluck</a></td><td><a href="#content-takeuntil">takeUntil</a></td></tr>
<tr><td><a href="#content-chunk">chunk</a></td><td><a href="#content-getorput">getOrPut</a></td><td><a href="#content-pop">pop</a></td><td><a href="#content-takewhile">takeWhile</a></td></tr>
<tr><td><a href="#content-chunkwhile">chunkWhile</a></td><td><a href="#content-groupby">groupBy</a></td><td><a href="#content-prepend">prepend</a></td><td><a href="#content-tap">tap</a></td></tr>
<tr><td><a href="#content-collapse">collapse</a></td><td><a href="#content-has">has</a></td><td><a href="#content-pull">pull</a></td><td><a href="#content-times">times</a></td></tr>
<tr><td><a href="#content-collapsewithkeys">collapseWithKeys</a></td><td><a href="#content-hasany">hasAny</a></td><td><a href="#content-push">push</a></td><td><a href="#content-toarray">toArray</a></td></tr>
<tr><td><a href="#content-combine">combine</a></td><td><a href="#content-hasmany">hasMany</a></td><td><a href="#content-put">put</a></td><td><a href="#content-tojson">toJson</a></td></tr>
<tr><td><a href="#content-concat">concat</a></td><td><a href="#content-hassole">hasSole</a></td><td><a href="#content-random">random</a></td><td><a href="#content-toprettyjson">toPrettyJson</a></td></tr>
<tr><td><a href="#content-contains">contains</a></td><td><a href="#content-implode">implode</a></td><td><a href="#content-range">range</a></td><td><a href="#content-transform">transform</a></td></tr>
<tr><td><a href="#content-containsstrict">containsStrict</a></td><td><a href="#content-intersect">intersect</a></td><td><a href="#content-reduce">reduce</a></td><td><a href="#content-undot">undot</a></td></tr>
<tr><td><a href="#content-count">count</a></td><td><a href="#content-intersectassoc">intersectAssoc</a></td><td><a href="#content-reducespread">reduceSpread</a></td><td><a href="#content-union">union</a></td></tr>
<tr><td><a href="#content-countby">countBy</a></td><td><a href="#content-intersectassocusing">intersectAssocUsing</a></td><td><a href="#content-reducewithkeys">reduceWithKeys</a></td><td><a href="#content-unique">unique</a></td></tr>
<tr><td><a href="#content-crossjoin">crossJoin</a></td><td><a href="#content-intersectbykeys">intersectByKeys</a></td><td><a href="#content-reject">reject</a></td><td><a href="#content-uniquestrict">uniqueStrict</a></td></tr>
<tr><td><a href="#content-diff">diff</a></td><td><a href="#content-intersectusing">intersectUsing</a></td><td><a href="#content-replace">replace</a></td><td><a href="#content-unless">unless</a></td></tr>
<tr><td><a href="#content-diffassoc">diffAssoc</a></td><td><a href="#content-isempty">isEmpty</a></td><td><a href="#content-replacerecursive">replaceRecursive</a></td><td><a href="#content-unlessempty">unlessEmpty</a></td></tr>
<tr><td><a href="#content-diffassocusing">diffAssocUsing</a></td><td><a href="#content-isnotempty">isNotEmpty</a></td><td><a href="#content-reverse">reverse</a></td><td><a href="#content-unlessnotempty">unlessNotEmpty</a></td></tr>
<tr><td><a href="#content-diffkeys">diffKeys</a></td><td><a href="#content-join">join</a></td><td><a href="#content-search">search</a></td><td><a href="#content-unwrap">unwrap</a></td></tr>
<tr><td><a href="#content-diffkeysusing">diffKeysUsing</a></td><td><a href="#content-keyby">keyBy</a></td><td><a href="#content-select">select</a></td><td><a href="#content-value">value</a></td></tr>
<tr><td><a href="#content-diffusing">diffUsing</a></td><td><a href="#content-keys">keys</a></td><td><a href="#content-shift">shift</a></td><td><a href="#content-values">values</a></td></tr>
<tr><td><a href="#content-doesntcontain">doesntContain</a></td><td><a href="#content-last">last</a></td><td><a href="#content-shuffle">shuffle</a></td><td><a href="#content-when">when</a></td></tr>
<tr><td><a href="#content-doesntcontainstrict">doesntContainStrict</a></td><td><a href="#content-make">make</a></td><td><a href="#content-skip">skip</a></td><td><a href="#content-whenempty">whenEmpty</a></td></tr>
<tr><td><a href="#content-dot">dot</a></td><td><a href="#content-map">map</a></td><td><a href="#content-skipuntil">skipUntil</a></td><td><a href="#content-whennotempty">whenNotEmpty</a></td></tr>
<tr><td><a href="#content-duplicates">duplicates</a></td><td><a href="#content-mapinto">mapInto</a></td><td><a href="#content-skipwhile">skipWhile</a></td><td><a href="#content-where">where</a></td></tr>
<tr><td><a href="#content-duplicatesstrict">duplicatesStrict</a></td><td><a href="#content-mapspread">mapSpread</a></td><td><a href="#content-slice">slice</a></td><td><a href="#content-wherebetween">whereBetween</a></td></tr>
<tr><td><a href="#content-each">each</a></td><td><a href="#content-maptodictionary">mapToDictionary</a></td><td><a href="#content-sliding">sliding</a></td><td><a href="#content-wherein">whereIn</a></td></tr>
<tr><td><a href="#content-eachspread">eachSpread</a></td><td><a href="#content-maptogroups">mapToGroups</a></td><td><a href="#content-sole">sole</a></td><td><a href="#content-whereinstrict">whereInStrict</a></td></tr>
<tr><td><a href="#content-ensure">ensure</a></td><td><a href="#content-mapwithkeys">mapWithKeys</a></td><td><a href="#content-some">some</a></td><td><a href="#content-whereinstanceof">whereInstanceOf</a></td></tr>
<tr><td><a href="#content-every">every</a></td><td><a href="#content-max">max</a></td><td><a href="#content-sort">sort</a></td><td><a href="#content-wherenotbetween">whereNotBetween</a></td></tr>
<tr><td><a href="#content-except">except</a></td><td><a href="#content-median">median</a></td><td><a href="#content-sortby">sortBy</a></td><td><a href="#content-wherenotin">whereNotIn</a></td></tr>
<tr><td><a href="#content-filter">filter</a></td><td><a href="#content-merge">merge</a></td><td><a href="#content-sortbydesc">sortByDesc</a></td><td><a href="#content-wherenotinstrict">whereNotInStrict</a></td></tr>
<tr><td><a href="#content-first">first</a></td><td><a href="#content-mergerecursive">mergeRecursive</a></td><td><a href="#content-sortdesc">sortDesc</a></td><td><a href="#content-wherenotnull">whereNotNull</a></td></tr>
<tr><td><a href="#content-firstorfail">firstOrFail</a></td><td><a href="#content-min">min</a></td><td><a href="#content-sortkeys">sortKeys</a></td><td><a href="#content-wherenull">whereNull</a></td></tr>
<tr><td><a href="#content-firstwhere">firstWhere</a></td><td><a href="#content-mode">mode</a></td><td><a href="#content-sortkeysdesc">sortKeysDesc</a></td><td><a href="#content-wherestrict">whereStrict</a></td></tr>
<tr><td><a href="#content-flatmap">flatMap</a></td><td><a href="#content-multiply">multiply</a></td><td><a href="#content-sortkeysusing">sortKeysUsing</a></td><td><a href="#content-wrap">wrap</a></td></tr>
<tr><td><a href="#content-flatten">flatten</a></td><td><a href="#content-nth">nth</a></td><td><a href="#content-splice">splice</a></td><td><a href="#content-zip">zip</a></td></tr>
<tr><td><a href="#content-flip">flip</a></td><td><a href="#content-only">only</a></td><td><a href="#content-split">split</a></td><td></td></tr>
</tbody>
</table>

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
