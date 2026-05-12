<?php

use function Spatie\Piper\Arr\median;

it('returns the median value', function () {
    expect([1, 1, 2, 4] |> median())->toBe(1.5);
});
