<?php

use function Spatie\Piper\Arr\pop;

it('extracts the last value', function () {
    expect([1, 2, 3] |> pop())->toBe(3);
});

it('extracts multiple values from the end', function () {
    expect([1, 2, 3] |> pop(2))->toBe([3, 2]);
});
