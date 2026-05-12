<?php

use function Spatie\Piper\Arr\search;

it('returns the key for a matching callback', function () {
    expect(['a' => 1, 'b' => 2, 'c' => 3] |> search(fn (int $value): bool => $value === 3))->toBe('c');
});
