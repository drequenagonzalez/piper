<?php

use function Spatie\Piper\Arr\shift;

it('extracts the first value', function () {
    expect([1, 2, 3] |> shift())->toBe(1);
});

it('extracts multiple values from the start', function () {
    expect([1, 2, 3] |> shift(2))->toBe([1, 2]);
});
