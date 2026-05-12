<?php

use function Spatie\Piper\Arr\min;

it('returns the minimum value', function () {
    expect([3, 1, 2] |> min())->toBe(1);
});

it('returns the minimum value for a key', function () {
    expect([
        ['score' => 10],
        ['score' => 40],
        ['score' => 20],
    ] |> min('score'))->toBe(10);
});
