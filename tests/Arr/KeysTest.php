<?php

use function Spatie\Piper\Arr\keys;

it('returns the array keys', function () {
    expect(['a' => 1, 'b' => 2] |> keys())->toBe(['a', 'b']);
});
