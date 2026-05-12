<?php

use function Spatie\Piper\Arr\uniqueStrict;

it('returns unique values using strict comparison', function () {
    expect([1, '1', 1] |> uniqueStrict())->toBe([0 => 1, 1 => '1']);
});
