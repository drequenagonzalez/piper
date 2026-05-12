<?php

use function Spatie\Piper\Arr\filter;

it('filters values with a callback', function () {
    expect([1, 2, 3, 4] |> filter(fn (int $value): bool => $value > 2))->toBe([2 => 3, 3 => 4]);
});

it('removes falsey values without a callback', function () {
    expect([0, 1, false, 2, null, 3] |> filter())->toBe([1 => 1, 3 => 2, 5 => 3]);
});
