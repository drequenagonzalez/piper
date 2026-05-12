<?php

use function Spatie\Piper\Arr\max;

it('returns the maximum value', function () {
    expect([1, 3, 2] |> max())->toBe(3);
});

it('returns the maximum value for a key', function () {
    expect([
        ['score' => 10],
        ['score' => 40],
        ['score' => 20],
    ] |> max('score'))->toBe(40);
});
