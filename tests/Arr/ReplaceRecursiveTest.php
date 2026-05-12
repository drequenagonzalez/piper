<?php

use function Spatie\Piper\Arr\replaceRecursive;

it('replaces matching keys recursively', function () {
    expect(['a' => ['x' => 1]] |> replaceRecursive(['a' => ['x' => 2]]))->toBe(['a' => ['x' => 2]]);
});
