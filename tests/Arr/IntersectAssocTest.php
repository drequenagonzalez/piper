<?php

use function Spatie\Piper\Arr\intersectAssoc;

it('returns key value pairs present in another array', function () {
    expect(['a' => 1, 'b' => 2] |> intersectAssoc(['a' => 1]))->toBe(['a' => 1]);
});
