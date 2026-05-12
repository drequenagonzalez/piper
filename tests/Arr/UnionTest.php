<?php

use function Spatie\Piper\Arr\union;

it('unions arrays without overwriting existing keys', function () {
    expect(['a' => 1] |> union(['a' => 2, 'b' => 3]))->toBe(['a' => 1, 'b' => 3]);
});
