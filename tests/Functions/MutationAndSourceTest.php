<?php

use function Spatie\Piper\Arr\concat;
use function Spatie\Piper\Arr\except;
use function Spatie\Piper\Arr\forget;
use function Spatie\Piper\Arr\forPage;
use function Spatie\Piper\Arr\fromJson;
use function Spatie\Piper\Arr\join;
use function Spatie\Piper\Arr\make;
use function Spatie\Piper\Arr\multiply;
use function Spatie\Piper\Arr\only;
use function Spatie\Piper\Arr\pad;
use function Spatie\Piper\Arr\pop;
use function Spatie\Piper\Arr\prepend;
use function Spatie\Piper\Arr\pull;
use function Spatie\Piper\Arr\push;
use function Spatie\Piper\Arr\put;
use function Spatie\Piper\Arr\range;
use function Spatie\Piper\Arr\shift;
use function Spatie\Piper\Arr\slice;
use function Spatie\Piper\Arr\splice;
use function Spatie\Piper\Arr\take;
use function Spatie\Piper\Arr\takeUntil;
use function Spatie\Piper\Arr\takeWhile;
use function Spatie\Piper\Arr\times;
use function Spatie\Piper\Arr\toArray;
use function Spatie\Piper\Arr\toJson;
use function Spatie\Piper\Arr\toPrettyJson;
use function Spatie\Piper\Arr\transform;
use function Spatie\Piper\Arr\unless;
use function Spatie\Piper\Arr\unlessEmpty;
use function Spatie\Piper\Arr\unlessNotEmpty;
use function Spatie\Piper\Arr\when;
use function Spatie\Piper\Arr\whenEmpty;
use function Spatie\Piper\Arr\whenNotEmpty;
use function Spatie\Piper\Arr\wrap;

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
