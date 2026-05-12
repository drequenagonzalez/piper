<?php

use function Spatie\Piper\Arr\slice;

it('returns a slice while preserving keys', function () {
    expect([1, 2, 3, 4] |> slice(1, 2))->toBe([1 => 2, 2 => 3]);
});
