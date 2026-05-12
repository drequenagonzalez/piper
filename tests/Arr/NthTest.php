<?php

use function Spatie\Piper\Arr\nth;

it('returns every nth value', function () {
    expect([1, 2, 3, 4, 5] |> nth(2))->toBe([1, 3, 5]);
});
