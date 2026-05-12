<?php

use function Spatie\Piper\Arr\partition;

it('partitions values by a callback', function () {
    expect([1, 2, 3, 4] |> partition(fn (int $value): bool => $value % 2 === 0))->toBe([
        [1 => 2, 3 => 4],
        [0 => 1, 2 => 3],
    ]);
});
