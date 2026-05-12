<?php

use function Spatie\Piper\Arr\sliding;

it('returns sliding windows of values', function () {
    expect([1, 2, 3, 4] |> sliding(3))->toBe([[1, 2, 3], [2, 3, 4]]);
});
