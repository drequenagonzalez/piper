<?php

use function Spatie\Piper\Arr\chunkWhile;

it('chunks while the callback accepts the current value', function () {
    expect(str_split('AABB') |> chunkWhile(fn (string $value, int $key, array $chunk): bool => $value === end($chunk)))->toBe([
        [0 => 'A', 1 => 'A'],
        [2 => 'B', 3 => 'B'],
    ]);
});
