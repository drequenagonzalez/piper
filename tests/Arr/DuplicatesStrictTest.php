<?php

use function Spatie\Piper\Arr\duplicatesStrict;

it('returns duplicate values using strict comparison', function () {
    expect([1, '1', 1] |> duplicatesStrict())->toBe([2 => 1]);
});
