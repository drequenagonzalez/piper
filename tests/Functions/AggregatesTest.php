<?php

use function Spatie\Piper\average;
use function Spatie\Piper\avg;
use function Spatie\Piper\countBy;
use function Spatie\Piper\max;
use function Spatie\Piper\median;
use function Spatie\Piper\min;
use function Spatie\Piper\mode;
use function Spatie\Piper\percentage;
use function Spatie\Piper\reduce;
use function Spatie\Piper\reduceSpread;
use function Spatie\Piper\sum;

it('calculates numeric aggregates', function () {
    $items = [
        ['score' => 10],
        ['score' => 20],
        ['score' => 40],
    ];

    expect($items |> avg('score'))->toBe(70 / 3);
    expect($items |> average('score'))->toBe(70 / 3);
    expect($items |> sum('score'))->toBe(70);
    expect($items |> min('score'))->toBe(10);
    expect($items |> max('score'))->toBe(40);
});

it('calculates median mode percentage and counts', function () {
    expect([1, 1, 2, 4] |> median())->toBe(1.5);
    expect([1, 1, 2, 2, 3] |> mode())->toBe([1, 2]);
    expect([1, 2, 3, 4] |> percentage(fn (int $value): bool => $value > 2))->toBe(50.0);
    expect(['a', 'b', 'a'] |> countBy())->toBe(['a' => 2, 'b' => 1]);
});

it('reduces values', function () {
    expect([1, 2, 3] |> reduce(fn (int $carry, int $value): int => $carry + $value, 0))->toBe(6);

    [$sum, $count] = [1, 2, 3]
        |> reduceSpread(fn (int $sum, int $count, int $value): array => [$sum + $value, $count + 1], 0, 0);

    expect([$sum, $count])->toBe([6, 3]);
});
