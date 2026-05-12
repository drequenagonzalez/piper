<?php

use function Spatie\Piper\Arr\intersectByKeys;

it('returns keys present in another array', function () {
    expect(['a' => 1, 'b' => 2] |> intersectByKeys(['b' => 9]))->toBe(['b' => 2]);
});
