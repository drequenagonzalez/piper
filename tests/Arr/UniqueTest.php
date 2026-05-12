<?php

use function Spatie\Piper\Arr\unique;

it('returns unique values while preserving their original keys', function () {
    expect(['a', 'b', 'a'] |> unique())->toBe([0 => 'a', 1 => 'b']);
});
