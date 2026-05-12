<?php

use function Spatie\Piper\Arr\sum;

it('sums values', function () {
    expect([1, 2, 3] |> sum())->toBe(6);
});

it('sums values by a key', function () {
    expect([
        ['score' => 10],
        ['score' => 20],
        ['score' => 40],
    ] |> sum('score'))->toBe(70);
});
