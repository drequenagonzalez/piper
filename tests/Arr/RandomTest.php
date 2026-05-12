<?php

use function Spatie\Piper\Arr\random;

it('returns one random value from the array', function () {
    expect([1] |> random())->toBe(1);
});

it('returns the requested number of random values', function () {
    $values = [1, 2, 3] |> random(2);

    expect($values)->toHaveCount(2);
    expect(array_diff($values, [1, 2, 3]))->toBe([]);
});
