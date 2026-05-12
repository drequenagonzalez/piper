<?php

use function Spatie\Piper\Arr\average;

it('calculates the average of values', function () {
    expect([1, 3, 5] |> average())->toBe(3);
});

it('calculates the average using a key', function () {
    expect([
        ['score' => 10],
        ['score' => 20],
        ['score' => 40],
    ] |> average('score'))->toBe(70 / 3);
});
