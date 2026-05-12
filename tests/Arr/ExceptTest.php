<?php

use function Spatie\Piper\Arr\except;

it('returns all keys except the requested keys', function () {
    expect(['a' => 1, 'b' => 2] |> except(['b']))->toBe(['a' => 1]);
});
