<?php

use function Spatie\Piper\Arr\only;

it('returns only the requested keys', function () {
    expect(['a' => 1, 'b' => 2] |> only(['a']))->toBe(['a' => 1]);
});
