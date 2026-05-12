<?php

use function Spatie\Piper\Arr\zip;

it('zips values with another array', function () {
    expect([1, 2] |> zip(['a', 'b']))->toBe([[1, 'a'], [2, 'b']]);
});
