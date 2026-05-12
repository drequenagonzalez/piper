<?php

use function Spatie\Piper\Arr\duplicates;

it('returns duplicate values after their first occurrence', function () {
    expect(['a', 'b', 'a'] |> duplicates())->toBe([2 => 'a']);
});
