<?php

use function Spatie\Piper\Arr\diff;
use function Spatie\Piper\Arr\diffAssoc;
use function Spatie\Piper\Arr\diffKeys;
use function Spatie\Piper\Arr\duplicates;
use function Spatie\Piper\Arr\intersect;
use function Spatie\Piper\Arr\intersectAssoc;
use function Spatie\Piper\Arr\intersectByKeys;
use function Spatie\Piper\Arr\merge;
use function Spatie\Piper\Arr\mergeRecursive;
use function Spatie\Piper\Arr\nth;
use function Spatie\Piper\Arr\replace;
use function Spatie\Piper\Arr\replaceRecursive;
use function Spatie\Piper\Arr\reverse;
use function Spatie\Piper\Arr\sort;
use function Spatie\Piper\Arr\sortBy;
use function Spatie\Piper\Arr\sortByDesc;
use function Spatie\Piper\Arr\sortDesc;
use function Spatie\Piper\Arr\sortKeys;
use function Spatie\Piper\Arr\sortKeysDesc;
use function Spatie\Piper\Arr\union;
use function Spatie\Piper\Arr\unique;
use function Spatie\Piper\Arr\values;

it('sorts values and keys', function () {
    expect(['b' => 2, 'a' => 1] |> sortKeys())->toBe(['a' => 1, 'b' => 2]);
    expect(['b' => 2, 'a' => 1] |> sortKeysDesc())->toBe(['b' => 2, 'a' => 1]);
    expect([3, 1, 2] |> sort() |> values())->toBe([1, 2, 3]);
    expect([3, 1, 2] |> sortDesc() |> values())->toBe([3, 2, 1]);

    $items = [
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ];

    expect($items |> sortBy('score') |> values())->toBe([
        ['name' => 'Jess', 'score' => 91],
        ['name' => 'Taylor', 'score' => 98],
    ]);

    expect($items |> sortByDesc('score') |> values())->toBe([
        ['name' => 'Taylor', 'score' => 98],
        ['name' => 'Jess', 'score' => 91],
    ]);
});

it('handles unique duplicate and reverse helpers', function () {
    expect(['a', 'b', 'a'] |> unique())->toBe([0 => 'a', 1 => 'b']);
    expect(['a', 'b', 'a'] |> duplicates())->toBe([2 => 'a']);
    expect([1, 2, 3] |> reverse())->toBe([2 => 3, 1 => 2, 0 => 1]);
    expect([1, 2, 3, 4, 5] |> nth(2))->toBe([1, 3, 5]);
});

it('handles set operations and merging', function () {
    expect(['a', 'b', 'c'] |> diff(['b']))->toBe([0 => 'a', 2 => 'c']);
    expect(['a' => 1, 'b' => 2] |> diffAssoc(['a' => 1]))->toBe(['b' => 2]);
    expect(['a' => 1, 'b' => 2] |> diffKeys(['a' => 9]))->toBe(['b' => 2]);
    expect(['a', 'b'] |> intersect(['b', 'c']))->toBe([1 => 'b']);
    expect(['a' => 1, 'b' => 2] |> intersectAssoc(['a' => 1]))->toBe(['a' => 1]);
    expect(['a' => 1, 'b' => 2] |> intersectByKeys(['b' => 9]))->toBe(['b' => 2]);
    expect(['a'] |> merge(['b']))->toBe(['a', 'b']);
    expect(['a' => ['x']] |> mergeRecursive(['a' => ['y']]))->toBe(['a' => ['x', 'y']]);
    expect(['a' => 1] |> union(['a' => 2, 'b' => 3]))->toBe(['a' => 1, 'b' => 3]);
    expect(['a' => 1] |> replace(['a' => 2]))->toBe(['a' => 2]);
    expect(['a' => ['x' => 1]] |> replaceRecursive(['a' => ['x' => 2]]))->toBe(['a' => ['x' => 2]]);
});
