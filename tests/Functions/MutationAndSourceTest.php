<?php

use function Spatie\Piper\concat;
use function Spatie\Piper\except;
use function Spatie\Piper\forget;
use function Spatie\Piper\forPage;
use function Spatie\Piper\fromJson;
use function Spatie\Piper\join;
use function Spatie\Piper\make;
use function Spatie\Piper\multiply;
use function Spatie\Piper\only;
use function Spatie\Piper\pad;
use function Spatie\Piper\pop;
use function Spatie\Piper\prepend;
use function Spatie\Piper\pull;
use function Spatie\Piper\push;
use function Spatie\Piper\put;
use function Spatie\Piper\range;
use function Spatie\Piper\shift;
use function Spatie\Piper\slice;
use function Spatie\Piper\splice;
use function Spatie\Piper\take;
use function Spatie\Piper\takeUntil;
use function Spatie\Piper\takeWhile;
use function Spatie\Piper\times;
use function Spatie\Piper\toArray;
use function Spatie\Piper\toJson;
use function Spatie\Piper\toPrettyJson;
use function Spatie\Piper\transform;
use function Spatie\Piper\unless;
use function Spatie\Piper\unlessEmpty;
use function Spatie\Piper\unlessNotEmpty;
use function Spatie\Piper\when;
use function Spatie\Piper\whenEmpty;
use function Spatie\Piper\whenNotEmpty;
use function Spatie\Piper\wrap;

it('creates source arrays directly', function () {
    expect(range(1, 3))->toBe([1, 2, 3]);
    expect(times(3, fn (int $number): int => $number * 2))->toBe([2, 4, 6]);
    expect(fromJson('{"name":"Taylor"}'))->toBe(['name' => 'Taylor']);
    expect(make(null))->toBe([]);
    expect(wrap('Taylor'))->toBe(['Taylor']);
});

it('returns immutable changed copies for mutation-like methods', function () {
    $items = ['a' => 1, 'b' => 2];

    expect($items |> push(3))->toBe(['a' => 1, 'b' => 2, 3]);
    expect($items |> put('c', 3))->toBe(['a' => 1, 'b' => 2, 'c' => 3]);
    expect($items |> prepend(0))->toBe([0, 'a' => 1, 'b' => 2]);
    expect($items |> forget('a'))->toBe(['b' => 2]);
    expect($items |> except(['b']))->toBe(['a' => 1]);
    expect($items)->toBe(['a' => 1, 'b' => 2]);
});

it('returns extracted values for extractor ports', function () {
    expect([1, 2, 3] |> pop())->toBe(3);
    expect([1, 2, 3] |> pop(2))->toBe([3, 2]);
    expect([1, 2, 3] |> shift())->toBe(1);
    expect([1, 2, 3] |> shift(2))->toBe([1, 2]);
    expect(['name' => 'Taylor'] |> pull('name'))->toBe('Taylor');
    expect([1, 2, 3, 4] |> splice(1, 2))->toBe([2, 3]);
});

it('handles slicing taking and pagination', function () {
    expect([1, 2, 3, 4] |> slice(1, 2))->toBe([1 => 2, 2 => 3]);
    expect([1, 2, 3, 4] |> take(2))->toBe([1, 2]);
    expect([1, 2, 3, 4] |> take(-2))->toBe([2 => 3, 3 => 4]);
    expect([1, 2, 3, 4] |> takeUntil(3))->toBe([1, 2]);
    expect([1, 2, 3, 4] |> takeWhile(fn (int $value): bool => $value < 3))->toBe([1, 2]);
    expect([1, 2, 3, 4] |> forPage(2, 2))->toBe([2 => 3, 3 => 4]);
});

it('handles string json and conditional helpers', function () {
    expect(['a', 'b', 'c'] |> join(', ', ' and '))->toBe('a, b and c');
    expect([1, 2] |> concat([3, 4]))->toBe([1, 2, 3, 4]);
    expect([1, 2] |> multiply(2))->toBe([1, 2, 1, 2]);
    expect([1, 2] |> pad(4, 0))->toBe([1, 2, 0, 0]);
    expect([1, 2] |> only([0]))->toBe([0 => 1]);
    expect([1, 2] |> transform(fn (int $value): int => $value * 10))->toBe([10, 20]);
    expect([1, 2] |> toArray())->toBe([1, 2]);
    expect(['name' => 'Taylor'] |> toJson())->toBe('{"name":"Taylor"}');
    expect(['name' => 'Taylor'] |> toPrettyJson())->toContain("\n");

    expect([1] |> when(true, fn (array $items): array => [...$items, 2]))->toBe([1, 2]);
    expect([] |> whenEmpty(fn (array $items): array => ['empty']))->toBe(['empty']);
    expect([1] |> whenNotEmpty(fn (array $items): array => [...$items, 2]))->toBe([1, 2]);
    expect([1] |> unless(false, fn (array $items): array => [...$items, 2]))->toBe([1, 2]);
    expect([1] |> unlessEmpty(fn (array $items): array => [...$items, 2]))->toBe([1, 2]);
    expect([] |> unlessNotEmpty(fn (array $items): array => ['empty']))->toBe(['empty']);
});
