<?php

use function Spatie\Piper\Arr\chunk;
use function Spatie\Piper\Arr\chunkWhile;
use function Spatie\Piper\Arr\collapse;
use function Spatie\Piper\Arr\collapseWithKeys;
use function Spatie\Piper\Arr\combine;
use function Spatie\Piper\Arr\crossJoin;
use function Spatie\Piper\Arr\dot;
use function Spatie\Piper\Arr\flatMap;
use function Spatie\Piper\Arr\flatten;
use function Spatie\Piper\Arr\flip;
use function Spatie\Piper\Arr\keys;
use function Spatie\Piper\Arr\mapSpread;
use function Spatie\Piper\Arr\mapToDictionary;
use function Spatie\Piper\Arr\mapToGroups;
use function Spatie\Piper\Arr\mapWithKeys;
use function Spatie\Piper\Arr\partition;
use function Spatie\Piper\Arr\sliding;
use function Spatie\Piper\Arr\split;
use function Spatie\Piper\Arr\splitIn;
use function Spatie\Piper\Arr\undot;
use function Spatie\Piper\Arr\zip;

it('chunks collapses and flattens arrays', function () {
    expect([1, 2, 3, 4, 5] |> chunk(2))->toBe([[1, 2], [3, 4], [5]]);
    expect(str_split('AABB') |> chunkWhile(fn (string $value, int $key, array $chunk): bool => $value === end($chunk)))->toBe([
        [0 => 'A', 1 => 'A'],
        [2 => 'B', 3 => 'B'],
    ]);
    expect([[1, 2], [3, 4]] |> collapse())->toBe([1, 2, 3, 4]);
    expect([['a' => 1], ['b' => 2]] |> collapseWithKeys())->toBe(['a' => 1, 'b' => 2]);
    expect([1, [2, [3]]] |> flatten())->toBe([1, 2, 3]);
});

it('maps with key reshaping helpers', function () {
    $items = [
        ['name' => 'Taylor', 'department' => 'Engineering'],
        ['name' => 'Abigail', 'department' => 'Engineering'],
        ['name' => 'Jess', 'department' => 'Docs'],
    ];

    expect($items |> mapWithKeys(fn (array $item): array => [$item['name'] => $item['department']]))->toBe([
        'Taylor' => 'Engineering',
        'Abigail' => 'Engineering',
        'Jess' => 'Docs',
    ]);

    expect($items |> mapToGroups(fn (array $item): array => [$item['department'] => $item['name']]))->toBe([
        'Engineering' => ['Taylor', 'Abigail'],
        'Docs' => ['Jess'],
    ]);

    expect($items |> mapToDictionary(fn (array $item): array => [$item['department'] => $item['name']]))->toBe([
        'Engineering' => ['Taylor', 'Abigail'],
        'Docs' => ['Jess'],
    ]);
});

it('handles structural helpers', function () {
    expect(['a', 'b'] |> combine([1, 2]))->toBe(['a' => 1, 'b' => 2]);
    expect(['a' => 1, 'b' => 2] |> keys())->toBe(['a', 'b']);
    expect(['a' => 1, 'b' => 2] |> flip())->toBe([1 => 'a', 2 => 'b']);
    expect(['user' => ['name' => 'Taylor']] |> dot())->toBe(['user.name' => 'Taylor']);
    expect(['user.name' => 'Taylor'] |> undot())->toBe(['user' => ['name' => 'Taylor']]);
    expect([1, 2] |> zip(['a', 'b']))->toBe([[1, 'a'], [2, 'b']]);
    expect([1, 2] |> crossJoin(['a', 'b']))->toBe([[1, 'a'], [1, 'b'], [2, 'a'], [2, 'b']]);
});

it('partitions spreads windows and splits', function () {
    expect([[1, 2], [3, 4]] |> mapSpread(fn (int $a, int $b): int => $a + $b))->toBe([3, 7]);
    expect([1, 2, 3, 4] |> partition(fn (int $value): bool => $value % 2 === 0))->toBe([[1 => 2, 3 => 4], [0 => 1, 2 => 3]]);
    expect([1, 2, 3, 4] |> sliding(3))->toBe([[1, 2, 3], [2, 3, 4]]);
    expect([1, 2, 3, 4, 5] |> split(2))->toBe([[1, 2, 3], [4, 5]]);
    expect([1, 2, 3, 4, 5] |> splitIn(2))->toBe([[1, 2, 3], [4, 5]]);
});

it('flat maps arrays', function () {
    expect([1, 2, 3] |> flatMap(fn (int $value): array => [$value, $value * 10]))->toBe([1, 10, 2, 20, 3, 30]);
});
