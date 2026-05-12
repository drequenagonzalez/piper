<?php

use function Spatie\Piper\Arr\mergeRecursive;

it('merges arrays recursively', function () {
    expect(['a' => ['x']] |> mergeRecursive(['a' => ['y']]))->toBe(['a' => ['x', 'y']]);
});
