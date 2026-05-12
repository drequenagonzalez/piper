<?php

use function Spatie\Piper\Arr\replace;

it('replaces matching keys with another array', function () {
    expect(['a' => 1] |> replace(['a' => 2]))->toBe(['a' => 2]);
});
