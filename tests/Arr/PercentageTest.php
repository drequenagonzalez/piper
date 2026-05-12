<?php

use function Spatie\Piper\Arr\percentage;

it('returns the percentage of values matching a callback', function () {
    expect([1, 2, 3, 4] |> percentage(fn (int $value): bool => $value > 2))->toBe(50.0);
});
